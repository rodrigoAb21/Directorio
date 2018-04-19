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
            'nombreE' => 'required|max:255',
            'descripcion' => 'required|max:255',
            'web' => 'nullable|max:255',
            'clave' => 'required|max:255',
            'email' => 'nullable|max:255',
            'logo' => 'nullable|image|mimes:jpg,jpeg,bmp,png',
            'rubro_id' => 'required|numeric',
            'nombreT' => 'required|array|min:1',
            'nombreT.*' => 'required',
            'direccionT' => 'required|array|min:1',
            'direccionT.*' => 'required',
            'departamentoT' => 'required|array|min:1',
            'departamentoT.*' => 'required',
            'telefonoT' => 'nullable|array|min:1',
            'telefonoT.*' => 'nullable|digits_between:7,8',
            'longitudT' => 'required|array|min:1',
            'longitudT.*' => 'required',
            'latitudT' => 'required|array|min:1',
            'latitudT.*' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nombreE.required' => 'Ingrese el nombre de la empresa.',
            'descripcion.required' => 'Ingrese la descripcion de la empresa.',
            'clave.required' => 'Ingrese las palabras clave para la busqueda',
            'rubro_id.required' => 'Seleccione un rubro correcto.',
            'nombreT.*.required' => 'Ingrese el nombre de las ubicaciones',
            'direccionT.*.required' => 'Ingrese la direccion de las ubicaciones.',
            'departamentoT.*.required' => 'Debe seleccionar un departamento.',
            'longitudT.*.required' => 'Asegurese de utilizar el mapa',
            'latitudT.*.required' => 'Asegurese de utilizar el mapa',
        ];
    }
}
