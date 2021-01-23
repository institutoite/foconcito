<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageActualizarRequest extends FormRequest
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
            //'imagen' => 'image|max:5000',
            'imagen' => 'array|max:10',
            'titulo'=>'required|string|max:100',
            'descripcion'=>'required|max:500',
            'costo'=>'required|numeric',
        ];
    }
}
