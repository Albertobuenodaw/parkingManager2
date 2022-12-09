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
        $car->plate = $request->get('plate');
        $car->brand = $request->get('brand');
        $car->model = $request->get('model');
        $car->save();

        return redirect()->route('car-store');
    }

    public function togetherIndex (){
        return view('car.together')->with('cars', Car::all())->with('users', User::all());
    }

    public function together(Request $request){
        
            $car = new Car;
            $car->plate = $request->get('plate');
            $car->brand = $request->get('brand');
            $car->model = $request->get('model');
            $car->save();
            
            if($request->user!== 0){
                $user = new User;
                $user->name = $request->get('name');
                $user->lastName = $request->get('lastName');
                $user->email = $request->get('email');
                $user->save();
                
                $car->update([]);
            
            }else{
                $user = User::findOrFail($request->get('user'));//pilla el id del select
                $car->save($user);
            }
            
           

        return redirect()->route('car-store');
    }

    public function asign(){
        return view ('car.asign')->with('cars', Car::all())->with('users', User::all());
    }

    public function search(){
        return view ('car.search');
    }
}
