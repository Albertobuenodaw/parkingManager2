@extends('main')
@section('content')
    <div class='container  w-80'>
    <h1>New User</h1>
        <form action='/user' method='post'> 
        @csrf
            <label for="nombre">Name:</label><br>
            <input class="lightRounded" type="text" name="name" placeholder="Name here" required value={{old('name')}}><br>
            <label for="apellido">Last Name:</label><br>
            <input class="lightRounded" type="text" name="lastName" placeholder="Last Name here" value={{old('lastName')}}><br>
            <label for="email">Email:</label><br>
            <input class="lightRounded" type="email" name="email" placeholder="Email here" value={{old('email')}}><br>
            <input type="submit" class = 'greyBlueBtn' value="+ Añadir Usuario"> 
            @if (session('message'))
                <div class='alert alert-success'>Usuario creado correctamente</div>
            @endif
        </form>
</div>
@endsection