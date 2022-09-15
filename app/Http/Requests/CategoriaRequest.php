<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriaRequest extends FormRequest
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
            'descripcion'=>'required|max:200',
            'nombre'=>'required|max:100',
        ];
    }
    public function messages()
    {
        return [
            'nombre.*'=>'Ingrese un nombre, de no mas de 100 caracteres',
            'descripcion.*'=>'Ingrese una descripcion, de no mas de 200 caracteres',
        ];
    }
}
