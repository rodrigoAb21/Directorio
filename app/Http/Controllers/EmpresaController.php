<?php

namespace App\Http\Controllers;

use App\Modelos\Empresa;
use App\Modelos\Rubro;
use App\Modelos\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class EmpresaController extends Controller
{
    public function vistaCrear(){
        $rubros = Rubro::all();
        return view('formulario', ['rubros' => $rubros]);
    }

    public function registrar(Request $request){
        try {
            DB::beginTransaction();
            $empresa = new Empresa();
            $empresa -> nombre = $request -> nombre;
            $empresa -> web = $request -> web;
            $empresa -> clave = $request -> clave;
            $empresa -> email = $request -> email;
            $empresa -> descripcion = $request -> descripcion;

            if (Input::hasFile('logo')) {
                $file = Input::file('logo');
                $file -> move(public_path().'/img/', $file->getClientOriginalName());
                $empresa -> logo = $file->getClientOriginalName();
            }

            $empresa -> rubro_id = $request -> rubro_id;
            $empresa -> save();

            $nombre = $request ->get('nombreT');
            $direccion = $request -> get('direccionT');
            $departamento = $request -> get('departamentoT');
            $telefono = $request -> get('telefonoT');
            $longitud = $request -> get('longitudT');
            $latitud = $request -> get('latitudT');
            $cont = 0;

            while ($cont < count($nombre)) {
                $ubicacion = new Ubicacion();
                $ubicacion -> empresa_id = $empresa -> id;
                $ubicacion -> nombre = $nombre[$cont];
                $ubicacion -> direccion = $direccion[$cont];
                $ubicacion -> departamento = $departamento[$cont];
                $ubicacion -> telefono = $telefono[$cont];
                $ubicacion -> longitud = $longitud[$cont];
                $ubicacion -> latitud = $latitud[$cont];
                $ubicacion -> save();
                $cont = $cont + 1;
            }

            DB::commit();
        } catch (Exception $e) {

            DB::rollback();

        }

        return  redirect('empresa/'.$empresa -> id);
    }

    public function verEmpresa($id){
        $empresa = Empresa::findOrFail($id);
        $ubicaciones = DB::table('ubicacion') -> where('empresa_id','=',$id)->get();
        return view('verEmpresa',['empresa' => $empresa, 'ubicaciones' => $ubicaciones]);
    }
}
