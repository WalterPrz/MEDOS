<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetalleVentaRequest extends FormRequest
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

    /**cantidad_venta
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'cantidad_venta'=>'required|integer|min:1|max:10000',
        ];
    }
    public function messages()
    {
        return [

            'cantidad_venta.*'=>'El campo  cantidad es requerido',
        ];
    }
}
