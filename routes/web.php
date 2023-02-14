<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main');
});

Route::controller(UserController::class)->group(function(){
    Route::get('/user' , [UserController::class,'index'])->name('user-index');
    Route::post('/user',[UserController::class,'store'])->name('user-store');
});



Route::controller(CarController::class)->group(function(){
    Route::get('/car' , [CarController::class,'index'])->name('car-index');
    Route::post('/car' , [CarController::class,'store'])->name('car-store');
    Route::get('/car/asign', [CarController::class,'asign'])->name('car-asign');
    Route::get('/car/search', [CarController::class,'searchIndex'])->name('car-search-index');
    Route::post('car/search',[CarController::class,'search'])->name('car-search');
    //TOGHETHER
    Route::get('/car/user' , [CarController::class,'togetherIndex'])->name('togetherIndex');
    Route::post('/car/user' , [CarController::class,'together'])->name('together');
});
