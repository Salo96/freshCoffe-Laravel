<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegistroRequest;
use Illuminate\Http\Request;

class AuthControlller extends Controller
{
    public function register(RegistroRequest $r){
        //valiudar registro
        $data = $r->validate();

    }

    public function login(Request $r){

    }

    public function logout(Request $r){

    }
}
