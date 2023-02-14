@extends('main')
@section('content')
<div class="container ">
        <div class='row searchBox mx-auto'>
            <form class="formulario row" action='{{route('car-search')}}' method='post'>
            @csrf
                    <input type="date" class="searchBar" name="date" placeholder="Select a date...">
                    <button disabled class =searchButon><i class='searchIcon fa fa-calendar'></i></button>
                    <select name="user" class="searchBar">
                        <option disabled selected value="0">Select a user</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                    <button disabled class =searchButon><i class='searchIcon fa fa-user' ></i></button>
                
                <input type="search" class="searchBar" placeholder="Search Car" name='searchCar' />
                <button type='submit' class =searchButon><i class='searchIcon fa fa-search'></i></button>
            </form>   
        </div>  
  
        <div class ='row'>   
           <table class="table table-striped table-dark">
               @if($cars->isNotEmpty())
                    <thead>
                        <tr>
                            <th scope="col" class='tLCorner'> User Name </th>
                            <th scope="col" class='cell'> Plate </th>
                            <th scope="col" class='cell'> Brand </th>
                            <th scope="col" class='tRCorner'> Model </th>
                        </tr>
                    </thead>
                @endif
                @forelse($cars as $car)
                    <tbody>
                        <tr>
                            <td>{{ $car->user->name ?? ""}}</td>
                            <td>{{ $car->plate }}</td>
                            <td>{{ $car->brand }}</td>
                            <td>{{ $car->model }}</td>
                            
                        </tr>
                    </tbody>
                    @empty
                        <tr><td class="red">No results found</td><td></td></tr>
                @endforelse
              
           </table>
       </div>
</div>
@endsection