<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonaGuardarRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nombre'=>'required|max:25',
            'apellidos'=>'required|max:50',
            'fechanacimiento'=>'required|date',
            'genero'=>'required|max:20',
            'pais_id'=>'required',
            'ciudad_id'=>'required',
            'zona_id'=>'required',
            
        ];
    }
}
