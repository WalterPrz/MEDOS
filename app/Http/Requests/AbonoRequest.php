<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbonoRequest extends FormRequest
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

            'credito_id'=>'required',
            'cantidadAbonada'=>'required|min:0.01|max:999|numeric',
            'fechaAbono'=>'max:10'
        ];
    }
    public function messages()
    {
        return [
            'credito_id.*'=>'Debe seleccionar un proveedor',
            'cantidadAbonada.*'=>'Ingrese una cantidad de dinero valida',
            'fechaCreacion.*'=>'Ingrese una fecha valida'
        ];
    }
}
