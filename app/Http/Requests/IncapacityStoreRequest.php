<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IncapacityStoreRequest extends FormRequest
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
            'start_date' => 'required',
            'end_date' => 'required',
            'clasification' => 'required',
        ];
    }
    public function messages()
   {
        return
        [
            'end_date.required' => 'Debe ingresar la fecha inicial de la incapacidad',
            'end_date.required' => 'Debe ingresar la fecha de finalización de la incapacidad',
            'clasification.required' => 'Debe ingresar el tipo de clasificación',
        ];
   } 
}
