@extends('main')
@section('content')
<div class="container ">
        <div class=' searchBox'>
            <form class="formulario row">
                <label for='searchCar'>Search your car:</label>
                <input type="search" class="searchBar" placeholder="Search Car" name='searchCar' />
                <button type='submit' class =searchButon><i class='searchIcon fa fa-search'></i></button>
            </form>   
        </div>  
  
    
</div>
@endsection