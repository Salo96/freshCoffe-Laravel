<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as pass;

class RegistroRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email'], //busca la table de users y encuentra el campo email que sea unico
            'password' => [
                'required',
                'confirmed',
                pass::min(8)->letters()->symbols()->numbers(),// se requiere minimo 8 letras 1 symbolo, numero
                
            ]
        ];
    }
    public function messages(){
        return[
            'name' => 'El nombre es obligatorio',
            'email.required' => 'El correo es obligatorio',
            'email.email' => 'El correo no es valido',
            'email.unique' => 'El usuario ya existe',
            'password.confirmed' => 'Las credenciales introducidas no concuerda',
            'password' => 'el pass debe contener al menos 8 letras, un simbolo y un numero'
        ];
    }
}
