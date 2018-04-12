<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidadorReg extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'web' => 'required|max:255',
            'clave' => 'required|max:255',
            'email' => 'required|max:255',
            'logo' => 'required|image|mimes:jpg,jpeg,bmp,png',
            'rubro_id' => 'required|numeric',
            'nombreT' => 'required|array|min:1',
            'nombreT.*' => 'required',
            'direccionT' => 'required|array|min:1',
            'direccionT.*' => 'required',
            'departamentoT' => 'required|array|min:1',
            'departamentoT.*' => 'required',
            'telefonoT' => 'required|array|min:1',
            'telefonoT.*' => 'numeric|min:6',
            'longitudT' => 'required|array|min:1',
            'longitudT.*' => 'required',
            'latitudT' => 'required|array|min:1',
            'latitudT.*' => 'required',
        ];
    }
}
