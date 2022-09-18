<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitaRequest extends FormRequest
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
            'especialidad' => 'required|max:30',
            'paciente' => 'required|max:100',
            'fecha_cita' => 'required',
            'hora_cita' => 'required|max:191',
            'descripcion' => 'between:8,255',
        ];
    }
    public function messages()
    {
        return [
            'especialidad.*' => 'Campo requerido, máximo 30 caracteres',
            'paciente.*' => 'Campo requerido, máximo 100 caracteres',
            'fecha_cita.*' => 'Campo requerido',
            'hora_cita.*' => 'Campo requerido',
        ];
    }
}