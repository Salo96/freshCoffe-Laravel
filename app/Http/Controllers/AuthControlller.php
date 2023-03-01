<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroRequest;
use App\Models\User;
use Illuminate\Http\Request;

class AuthControlller extends Controller
{
    public function register(RegistroRequest $request){
        //valiudar registro
        $data = $request->validate();

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);


        return[
            'token' => $user->createToken('token')->plainTextToken,
            'user' => $user
            
           
        ];

    }

    public function login(Request $r){

    }

    public function logout(Request $r){

    }
}
