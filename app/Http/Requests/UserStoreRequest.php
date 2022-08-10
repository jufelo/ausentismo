<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'employee' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ];
    }

    public function messages()
   {
        return
        [
            
            'email.required' => 'Debe ingresar un correo',
            'password.required' => 'Debe ingresar una contraseña'
        ];
   }
}
