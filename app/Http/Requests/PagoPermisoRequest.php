<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PagoPermisoRequest extends FormRequest
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
            'idPermisoFarmacia'=>'required',
            'fechaPago'=>'required',
        ];
    }
    public function messages()
    {
        return [

            'idPermisoFarmacia.*'=>'La seleccion de permiso a pagar es requerido',
            'fechaPago.*'=>'El campo de fecha de pago es requerido',
        ];
    }
}
