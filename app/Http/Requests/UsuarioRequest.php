<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioRequest extends FormRequest
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
            'name' => 'required|max:191',
            'email' => 'required|max:191|unique:users|email',
            'nombres' => 'required|max:191',
            'apellidos' => 'required|max:191',
            'password' => 'required|between:8,191|confirmed',
            'password_confirmation' => 'required',
            'role'=>'required|exists:roles,id'
        
        ];
    }
    public function messages()
    {
        return [
            'name.*' => 'Campo requerido, máximo 191 caracteres',
            'email.unique' =>'Ya existe un usuario con este correo.',
            'email.*' =>'Campo requerido, máximo 191 caracteres, tipo email',
           
            'nombres.*' => 'Campo requerido, máximo 191 caracteres',
            'apellidos.*' => 'Campo requerido, máximo 191 caracteres',
            'password.*' => 'Campo requerido, minimo 8 caracteres, máximo 191',
            'password_confirmation.*' => 'Campo requerido, no coincide la contraseña',
            'role.*'=>'Campo requerido.'
        ];
    }
}
