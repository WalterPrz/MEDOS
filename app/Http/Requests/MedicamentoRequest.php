<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicamentoRequest extends FormRequest
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
            'nombre_comercial'=>'required',
            'categoria_id'=>'required',
            'presentacion'=>'required|max:25',
            'componentes'=>'required|max:50',
            'precio_venta'=>'required|min:0.01|max:999|numeric',
        ];
    }
    public function messages()
    {
        return [
            'nombre_comercial.*'=>'Debe de escribir un nombre',
            'categoria_id.*'=>'Debe de poseer una categoria',
            'presentacion.*'=>'Debe de escribir una presentancion para el medicamento',
            'componentes.*'=>'Ingrese los componentes del medicamento',
            'precio_venta.*'=>'Ingrese una cantidad de dinero valida'
        ];
    }
}
