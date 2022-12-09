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

        return redirect()->route('car-index');
    }

    public function togetherIndex (){
        return view('car.together')->with('cars', Car::all())->with('users', User::all());
    }

    public function together(Request $request){
        
          
            if($request->user!== 0){
                $car = new Car;
                $car->plate = $request->get('plate');
                $car->brand = $request->get('brand');
                $car->model = $request->get('model');
                $car->save();
            
                
                $user = new User;
                $user->name = $request->get('name');
                $user->lastName = $request->get('lastName');
                $user->email = $request->get('email');
                $user->save();
                $user->cars()->save($car);
                
            
            }else{
                $car = new Car;
                $car->plate = $request->get('plate');
                $car->brand = $request->get('brand');
                $car->model = $request->get('model');
                $car->save();
                
                $user = User::findOrFail($request->get('user'));//pilla el id del select
                $car->user()->save($user);
            }
    
           

        return redirect()->route('together-index')->with('message','Success!');;
    }

    public function asign(){
        return view ('car.asign')->with('cars', Car::all())->with('users', User::all());
    }

    public function searchIndex(){
        return view ('car.search')->with('cars', Car::all())->with('users', User::all());;
    }
    public function search(){
        return redirect()->route('car-search');

    }
}
