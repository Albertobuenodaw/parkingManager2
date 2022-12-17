@extends('main')
@section('content')
    <div class='container  w-80'>
    <h1>New User</h1>
        <form action='/user' method='post'> 
        @csrf
            <label for="nombre">Name<small>(required)</small>:</label><br>
            <input class="lightRounded" type="text" name="name" placeholder="Name here" value={{old('name')}}><br>
            @error('name')
                <small class='.smallError'>{{$message}}</small>
            @enderror
            <br><label for="apellido">Last Name:</label><br>
            <input class="lightRounded" type="text" name="lastName" placeholder="Last Name here" value={{old('lastName')}}><br>
            <br><label for="email">Email:</label><br>
            <input class="lightRounded" type="email" name="email" placeholder="Email here" value={{old('email')}}><br>
            <br><input type="submit" class = 'greyBlueBtn' value="+ Añadir Usuario"> 
            @if (session('message'))
                <div class='alert alert-success'>Usuario creado correctamente</div>
            @endif
        </form>
</div>
@endsection