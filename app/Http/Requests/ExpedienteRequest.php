<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExpedienteRequest extends FormRequest
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
            'nombrePaciente'=>'required|max:100',
            'edadPaciente'=>'required|min:1|max:200|integer',
            'genero'=>'required|max:10',
            'telefonoPaciente'=>'required|max:10',
            'alergias'=>'required|max:255'
        ];
    }
    public function messages()
    {
        return [
            'nombrePaciente.*'=>'Ingrese un nombre de no mas de 100 caracteres',
            'edadPaciente.*'=>'Ingrese una edad menor a 200',
            'genero.*'=>'Ingrese un genero valido',
            'telefonoPaciente.*'=>'Ingrese un relefono valido',
            'alergias.*'=>'No es posible ingresar mas de 255 caracteres en el campo de alergias'
        ];
    }
}
