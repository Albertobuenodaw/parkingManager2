@extends('main')
@section('content')
    <div class='container  w-80'>
    <h1>New Car</h1>
        <form action='/car' method='post'> 
        @csrf
            <label for="plate">Plate:</label><br>
            <input class="lightRounded" type="text" name="plate" placeholder="Plate here" required><br>
            <label for="brand">Brand:</label><br>
            <input class="lightRounded" type="text" name="brand" placeholder="Brand here"><br>
            <label for="model">Model:</label><br>
            <input class="lightRounded" type="text" name="model" placeholder="Model here"><br>
            <label for='user'>Choose user if you want to add an existing one.</label>
            <select name="user" class="col-md-5 form-select" >
                <option selected disabled="true">--select User</option>
                @foreach ($users as $user )
                <option value="{{$user->id}}">{{$user->name}}</option>
                @endforeach
            </select>
            <input type="submit" class = 'greyBlueBtn' value="+ Add Car"> 
            @if (session('message'))
                <div class='alert alert-success'>{{ session('message') }}</div>
            @endif
        </form>
</div>
@endsection