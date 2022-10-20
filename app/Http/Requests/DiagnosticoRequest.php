<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiagnosticoRequest extends FormRequest
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
            //
            'peso'=>'required|min:0.01|max:999|numeric',
            'altura'=>'required|min:0.01|max:999|numeric',
            'descripcionDiag'=>'required|max:250',
            'receta'=>'required|max:250',
        ];
    }

        public function messages()
    {
        return [

            'peso.*'=>'El peso es requerido solo numeros y no vacio, maximo 3 digitos.',
            'altura.*'=>'La altura es requerida, solo numeros y no vacia.',
            'descripcionDiag'=>'No puede ser vacio, maximo 250 caracteres',
            'receta'=>'No puede swer vacio, maximo 250 caracteres',

        ];
    }
}
