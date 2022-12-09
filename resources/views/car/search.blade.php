@extends('main')
@section('content')
<div class="container ">
        <div class='row searchBox mx-auto'>
            <form class="formulario row">
                <label for='searchCar'>Search your car:</label>
                <input type="search" class="searchBar" placeholder="Search Car" name='searchCar' />
                <button type='submit' class =searchButon><i class='searchIcon fa fa-search'></i></button>
            </form>   
        </div>  
  
        <div class ='row'>
           
           <table class="table table-striped table-dark">
               <thead>
                   <tr>
                       <th scope="col" class='tLCorner'> User Name </th>
                       <th scope="col" class='cell'> email</th>
                       <th scope="col" class='cell'> Plate </th>
                       <th scope="col" class='cell'> Brand </th>
                       <th scope="col" class='tRCorner cell'> Action</th>
                   </tr>
               </thead>
               <tbody>
               @foreach ( $users as $user)
                   <tr>
                       <td class='cell'> {{ $user->name }}</td>
                       <td class='cell'> {{ $user->email}}</td>
                       <td class='darkCell limitCell cell'>  
                            @if (!empty($usuario->cars))
                                @foreach ($user->cars as $car )
                                <span class='plate'>{{ $car->plate}}</span>   
                                @endforeach 
                            @endif
                        </td>
                        <td class='darkCell'>  
                            @if (!empty($usuario->cars))
                                @foreach ($user->cars as $car )
                                <span class='brand'>{{ $car->plate}}</span>   
                                @endforeach  
                            @endif
                        </td>
                        <td class='darkCell'>
                            <!--Delete User Buton-->
                           <form action = "#" method = 'post'>
                           @csrf
                           @method ('DELETE')
                               <input type="submit" class="crudBtn" value="Delete User">
                           </form>

                           <!--Delete Car Button-->
                           <form action = "#" method = 'post'>
                           @csrf
                           @method ('DELETE')
                               <input type="submit" class="crudBtn" value="Delete Car">
                           </form>

                       </td>
                   </tr>
               @endforeach
               </tbody>
           </table>
       </div>
</div>
@endsection