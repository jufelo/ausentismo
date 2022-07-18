<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeStoreRequest extends FormRequest
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
            'name' => 'required',
            'ti' => 'required',
            'identification' => 'required',
            'salary' => 'required',
            'position' => 'required',
            'work_area' => 'required',
            'eps' => 'required',
            'arl' => 'required',
            'afp' => 'required',
        ];
    }

    public function messages()
   {
        return
        [
            'name.required' => 'Debe ingresar un nombre',
            'ti.required' => 'Debe selecionar el tipo de identificación',
            'identification.required' => 'Debe ingresar un número de identificación',
            'salary.required' => 'Debe ingresar el salario',
            'position.required' => 'Debe ingresar el cargo',
            'work_area.required' => 'Debe ingresar el área de trabajo',
            'eps.required' => 'Debe ingresar la Eps',
            'arl.required' => 'Debe ingresar la Arl',
            'afp.required' => 'Debe ingresar la Afp',
        ];
   } 
}
