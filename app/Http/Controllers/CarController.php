<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index(){
        
        return view('car.index')->with('cars', Car::all());
    }

    public function store(Request $request){
        $car = new Car;
        $car->plate = $request->plate;
        $car->brand = $request->brand;
        $car->model = $request->model;

        $car->save();

        return redirect('car.index');
    }
}
