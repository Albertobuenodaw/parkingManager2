@extends('main')
@section('content')
    <div class='container  w-80'>
        <h1>Search Car</h1>

        <div class="input-group">
        <div class="form-outline">
            <input type="search" id="searchBox" class="form-control" />
            <label class="form-label" for="searchBox">Search Car</label>
        </div>
        <button type="button" class="searchButton btn btn-primary">
            <i class="fas fa-search"></i>
        </button>
        </div>
    </div>
@endsection