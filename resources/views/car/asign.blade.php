@extends('main')

@section('content')
       
        <div class="container ">
                
                    <h1 class = 'text-center'>Asign a Car to a Usuer</h1>
               
                <form action='{{route("car-asign")}}' method='post'> 
                @csrf 
                        <div class='row selects'>
                            <select name="user" class="col-md-5 col-lg-5  form-select">
                                <option selected disabled="true">--Select User</option>
                                @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            <div class='col-md-2 col-lg-2'></div>
                            <select name="direccion" class="col-md-5 col-lg-5  form-select" >
                                <option selected disabled="true">--Select Car</option>
                                @foreach ($cars as $car )
                                <option value="{{$car->id}}">{{$car->plate}} - {{$car->brand}} {{$car->model}} </option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <input class = 'greyBlueBtn col-md-12' type=submit value="Asign">
                    </form>
            <hr>
            <div class = 'row'>
           
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col" >Plate </th>
                            <th scope="col">Brand </th>
                            <th scope="col"> Model </th>
                            <th scope="col"> Owner </th>
                            <th scope="col"> Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ( $cars as $car)
                        <tr>
                            <td> {{ $car->plate }}</td>
                            <td> {{ $car->brand}}</td>
                            <td> {{ $car->model}}</td>
                            <td>
                            @if (!empty($car->user->name))
                                {{  $car->user->name}}
                            @endif
                            </td>
                            <td>
                                <form action = "{{route('deleteCar', $car->id) }}" method = 'post'>
                                @csrf
                                @method ('DELETE')
                                    <input type="submit" class="crudBtn" value="Eliminar Usuario">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
    </div>
@endsection
