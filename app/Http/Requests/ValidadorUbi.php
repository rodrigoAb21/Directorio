<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidadorUbi extends FormRequest
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
            'nombreU' => 'required|max:255',
            'telefono' => 'nullable|numeric|min:6',
            'departamento' => 'required|max:255',
            'direccion' => 'required|max:255',
            'longitud' => 'required',
            'latitud' => 'required',
        ];
    }
}
