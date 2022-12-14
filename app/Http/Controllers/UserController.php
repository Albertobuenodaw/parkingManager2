<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function index(){
        
        return view('user.index')->with('usuarios', User::all());
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required']
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->lastName = $request->lastName;
        $user->email = $request->email;

        $user->save();

        return redirect()->route('user-index')->with('message','Success!');
    }
}
