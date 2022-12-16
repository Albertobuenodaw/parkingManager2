@extends('main')
@section('content')
<script>       
</script>
<div class='container  w-80'>
    <h1>New Car</h1>
    <form action='/car' method='post'> 
    @csrf
        <label for="plate">Plate:</label><br>
        <input class="lightRounded" type="text" name="plate" placeholder="Plate here" required><br>
        @error('plate')
            <small>{{$message}}</small>
        @enderror
        <br><label for="brand">Brand:</label><br>
        <input class="lightRounded" type="text" name="brand" placeholder="Brand here"><br>
        @error('brand')
            <small>{{$message}}</small>
        @enderror
        <br><label for="model">Model:</label><br>
        <input class="lightRounded" type="text" name="model" placeholder="Model here"><br>
        @error('model')
            <small>{{$message}}</small>
        @enderror
        <br><input type="submit" class = 'greyBlueBtn' value="+ Add Car"> 
        @if (session('message'))
            <div class='alert alert-success'>{{ session('message') }}</div>
        @endif
    </form>
</div>
@endsection