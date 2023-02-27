<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password as pass;

class RegistroRequest extends FormRequest
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

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
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
}
