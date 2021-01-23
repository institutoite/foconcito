<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageGuardarRequest extends FormRequest
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
            'imagen' => 'required|array|max:10', // solo que tenga required tipo de mimes
            'titulo'=>'required|string|max:100',
            'descripcion'=>'required|max:500',
            'costo'=>'required|numeric',
        ];
    }
}
