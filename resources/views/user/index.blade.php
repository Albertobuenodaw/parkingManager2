@extends('main')
@section('content')
    <div class='container  w-80'>
    <h1>New User</h1>
        <form action='/user' method='post'> 
        @csrf
            <label for="nombre">Name:</label><br>
            <input class="lightRounded" type="texto" name="name" placeholder="Name here" required><br>
            <label for="apellido">Last Name:</label><br>
            <input class="lightRounded" type="texto" name="lastName" placeholder="Last Name here"><br>
            <label for="email">Email:</label><br>
            <input class="lightRounded" type="email" name="email" placeholder="Email here"><br>
            <input type="submit" class = 'greyBlueBtn' value="+ Añadir Usuario"> 
            @if (session('message'))
                <div class='alert alert-success'>{{ session('message') }}</div>
            @endif
        </form>
</div>
@endsection