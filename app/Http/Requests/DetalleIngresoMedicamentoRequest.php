<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetalleIngresoMedicamentoRequest extends FormRequest
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
            'medicamento'=>'required|exists:medicamentos,id',
            'cantidadIngreso'=>'required|min:1|max:10000|integer',
            'precioCompra'=>'required|min:0.01|max:10000|numeric',
            'descuentoIngreso'=>'required|min:1|max:100|integer',
            'fechaVenc'=>'required|',
            'precioCompraUnidad'=>'required|min:0.01|max:1000|numeric',
            'precioVentaUnidad'=>'required|min:0.01|max:1000|numeric',
            
        ];
    }
    public function messages()
    {
        return [
            'medicamento.*'=>'Campo requerido',
            'cantidadIngreso.*'=>'Campo requerido, tipo entero, maximo 10000',
            'precioCompra.*'=>'campo requerido, minimo 0.01, máximo 10,000',
            'descuentoIngreso.*'=>'campo requerido',
            'fechaVenc.*'=>'campo requerido',
            'precioCompraUnidad.*'=>'Campo requerido, máximo $1000',
            'precioVentaUnidad.*'=>'Campo requerido, máximo $1000',
            
        ];
    }
}
