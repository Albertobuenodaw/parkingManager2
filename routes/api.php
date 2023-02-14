<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Car;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('users', function() {
   return User::with('cars')->orderBy('lastname', 'asc')->get();
});


Route::get('users/{id}', function($id) {
    return User::find($id);
});

Route::get('cars', function() {
    return Car::orderBy('created_at', 'desc')->limit(10)->get();
});