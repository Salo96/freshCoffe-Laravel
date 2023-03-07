<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return[
            'email.required' => "el email es obligatorio", 
            'email.email' => "el email no es valido",
            'email.exists' => "la cuenta no existe",  
            'password' => "el password es obligatorio", 
        ];
    }
}
