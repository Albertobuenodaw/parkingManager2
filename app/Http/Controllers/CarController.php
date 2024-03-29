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
        
        $request->validate([
            /*'plate'=>'required|max:7|regex:/[0-9]{4}[A-Z]{3}/',*/
            'plate'=>'required|max:7|',
            'brand'=>'required|min:3|max:15',
            'model'=>'required|min:1|max:15'
        ]);


        $plate = $request->get('plate');
        $brand = $request->get('brand');
        $model = $request->get('model');
        $car  = Car::create(['plate' => $plate, 'brand' => $brand, 'model' => $model]);
        $car->save();

        return redirect()->route('car-index')->with('message','Success!');
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
                //$car->save();
            
                
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
    
           $users = User::all();

        return redirect()->route('togetherIndex')->with('message','Success!')->with('users',$users);
    }

    public function asign(){
        return view ('car.asign')->with('cars', Car::all())->with('users', User::all());
    }

    public function searchIndex(){
        return view ('car.search')->with('cars', Car::all())->with('users', User::all());;
    }
    public function search(Request $request){
        $search = $request->input('search');
        $date = $request->input('date');
        $userId = $request->input('user');

        $cars = Car::where('id', '>', 0);
        
        if(isset($date)) {
            $cars->whereDate('created_at', '=', $date);
        }        
        if(isset($userId)) {
            $cars->where('idUsuario', $userId);
        }
        if(isset($search)) {
            $cars->where(function($query) use ($search){
                $query->where('plate', 'LIKE', "%$search%")
                    ->orWhere('brand', 'LIKE', "%$search%")
                    ->orWhere('model', 'LIKE', "%$search%");
            });
        }

        $cars = $cars->get();
        $users = User::all();

        return view('car.search')->with(['cars' => $cars])->with(['users' => $users]);

    }
}
