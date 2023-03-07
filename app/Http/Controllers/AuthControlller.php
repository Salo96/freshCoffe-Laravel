<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegistroRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthControlller extends Controller
{
    public function register(RegistroRequest $r){
        //validar registro desde registroRequest
        $data = $r->validated();

        //crear usuario
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        //retornar una respuesta
        return[
            'token' => $user->createToken('token')->plainTextToken,
            'user' => $user
  
        ];

    }

    public function login(LoginRequest $r){

        //validar login desde LoginRequest
        $data = $r->validated();

        //revisar el pass
        if(!Auth::attempt($data)){
            return response([
                'errors' => ['El email o el password son incorrecto']
            ], 422);//se coloca 422 que es un error y lo que envia desde el front esta mal, sino se pone el 422 por default es 200 que esta todo ok
        }

        //autenticar usuario
        $user = Auth::user();
        return[
            'token' => $user->createToken('token')->plainTextToken,
            'user' => $user
        ];

    }

    public function logout(Request $r){
        //return "logout ...";

        //obtengo el usuario autenticado
        $user = $r->user();
        //elimino el token de la base de datos
        $user->currentAccessToken()->delete();

        return[
            'user' => null
        ];

    }
}
