<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorRequest extends FormRequest
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
            'nombreProveedor'=>'required|max:100',
            'telefonoProveedor'=>'required|min:10000000|max:99999999|integer',
            'nombreVendedor'=>'required|max:100',
            'telefonoVendedor'=>'required|min:10000000|max:99999999|integer',
            'plazoDevolucion'=>'required|max:365|integer|min:1',
        ];
    }
    public function messages()
    {
        return [

            'nombreProveedor.*'=>'El campo nombre proveedor es requerido, máximo 100 caracteres.',
            'telefonoProveedor.*'=>'El campo telefono proveedor es requerido, solo números.',
            'nombreVendedor.*'=>'El campo nombre vendedor es requerido, máximo 100 caracteres.',
            'telefonoVendedor.*'=>'El campo telefono vendedor es requerido, solo números.',
            'plazoDevolucion.*'=>'Campo es plazo de devolucion requerido, minimo 1 y máximo 365 ',
        ];
    }
}
