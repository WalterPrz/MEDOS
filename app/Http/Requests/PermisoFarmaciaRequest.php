<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PermisoFarmaciaRequest extends FormRequest
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
            'nombrePermisoFarm'=>'required|max:80',
            'monto'=>'required|min:0.01|max:5000|numeric',
        ];
    }
    public function messages()
    {
        return [

            'nombrePermisoFarm.*'=>'El campo nombre de permiso es requerido, máximo 80 caracteres.',
            'monto.*'=>'El campo monto es requerido. Sólo se pueden valores númericos',
        ];
    }
}
