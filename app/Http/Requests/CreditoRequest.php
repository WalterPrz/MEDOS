<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreditoRequest extends FormRequest
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
            'proveedor_id'=>'required',
            'credito'=>'required|min:0.01|max:999|numeric',
            'diaPago'=>'required|max:10',
            'plazo'=>'max:11|integer',
            'saldoPendiente'=>'required|min:0.01|max:999|numeric',
            'fechaCreacion'=>'max:10'
        ];
    }
    public function messages()
    {
        return [
            'proveedor_id.*'=>'Debe seleccionar un proveedor',
            'credito.*'=>'Ingrese un monto de credito valido',
            'diaPago.*'=>'Seleccione un dia de pago',
            'plazo.*'=>'Ingrese una cantidad de dias valida',
            'saldoPendiente.*'=>'Ingrese un monto de saldo pendiente valido',
            'fechaCreacion.*'=>'Ingrese una fecha valida'
        ];
    }
}