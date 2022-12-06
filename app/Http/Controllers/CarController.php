<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(){
        
        return view('car.index')->with('cars', Car::all())->with('users', User::all());
    }

    public function store(Request $request){
        $car = new Car;
        $car->plate = $request->plate;
        $car->brand = $request->brand;
        $car->model = $request->model;

        $car->save();

        return redirect('car.index');
    }

    public function asign(){
        return view ('car.asign')->with('cars', Car::all())->with('users', User::all());
    }

    public function search(){
        return view ('car.search');
    }
}
