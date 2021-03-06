<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaGuardarRequest extends FormRequest
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
            'empresa'=>'required|string|max:100|unique:empresas,empresa',
            'direccion'=>'required|string|max:200',
            'detalle'=>'required|max:5000',
            
            'logo'=>'mimes:jpeg,bmp,jpg,png',
            'pais_id'=>'required|numeric',
            'ciudad_id'=>'required|numeric',
            'zona_id'=>'required|numeric',
            'orden_id'=>'required|numeric'
        ];
    }
}
