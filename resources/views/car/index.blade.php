@extends('main')
@section('content')
<script>       
</script>
<div class='container  w-80'>
    <h1>New Car</h1>
    <form action='/car' method='post'> 
    @csrf
        <label for="plate">Plate<small> (required)</small>:</label><br>
        <input class="lightRounded" type="text" name="plate" placeholder="Max 7 characters" required><br>
        @error('plate')
            <small class="smallError">{{$message}}</small>
        @enderror
        <br><label for="brand">Brand:</label><br>
        <input class="lightRounded" type="text" name="brand" placeholder="min3, max15 characters"><br>
        @error('brand')
            <small class="smallError">{{$message}}</small>
        @enderror
        <br><label for="model">Model:</label><br>
        <input class="lightRounded" type="text" name="model" placeholder="min3, max15 characters"><br>
        @error('model')
            <small class="smallError">{{$message}}</small>
        @enderror
        <br><input type="submit" class = 'greyBlueBtn' value="+ Add Car"> 
        @if (session('message'))
            <div class='alert alert-success'>{{ session('message') }}</div>
        @endif
    </form>
</div>
@endsection