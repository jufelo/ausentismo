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
            'incapacity_type_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'clasification' => 'required',
        ];
    }
    public function messages()
   {
        return
        [
            'incapacity_type_id.required' => 'Seleccione el tipo de incapacidad',
            'start_date.required' => 'Ingrese la fecha inicial',
            'end_date.required' => 'Ingrese la fecha final',
            'clasification.required' => 'Seleccione la clasificación',
        ];
   }
}
