<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidadorReg;
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

        return view('Empresas/formReg', ['rubros' => $rubros]);
    }

    public function limpiarTexto($cadena){
        return $cadena;
    }

    public function registrar(ValidadorReg $request){
        try {
            DB::beginTransaction();
            $empresa = new Empresa();
            $empresa -> nombre = $request -> nombreE;
            $empresa -> web = $request -> web;
            $empresa -> clave = $request -> clave;
            $empresa -> claveBusqueda = $this -> limpiarTexto($request -> clave);
            $empresa -> email = $request -> email;
            $empresa -> descripcion = $request -> descripcion;
            if (Input::hasFile('logo')) {
                $file = Input::file('logo');
                $file -> move(public_path().'/img/', $request -> nombre.$file->getClientOriginalName());
                $empresa -> logo = $request -> nombre.$file->getClientOriginalName();
            }else{
                $empresa -> logo = "default_img.png";
            }
            $empresa -> rubro_id = $request -> rubro_id;
            $empresa -> save();

            $nombre = $request -> nombreT;
            $direccion = $request -> direccionT;
            $departamento = $request ->departamentoT;
            $telefono = $request ->telefonoT;
            $longitud = $request ->longitudT;
            $latitud = $request ->latitudT;
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
        $ubicaciones = DB::table('ubicacion')
            -> where('empresa_id','=',$id)
            -> paginate(1);

        return view('Empresas/verEmpresa',['empresa' => $empresa, 'ubicaciones' => $ubicaciones]);
    }

    public function vistaEditar($id){
        $empresa= Empresa::findOrFail($id);
        $ubicaciones = DB::table('ubicacion')
            -> where('empresa_id','=',$id)
            -> paginate(1);
        $rubros= Rubro::all();
        $dptos = ['La Paz', 'Cochabamba','Santa Cruz','Oruro','Potosi','Sucre','Tarija','Pando','Beni'];

        return view('Empresas/formEdit',['rubros'=>$rubros,'empresa'=> $empresa,'ubicaciones'=>$ubicaciones, 'dptos' => $dptos]);
    }

    public function editar($id, Request $request){
        $empresa = Empresa::findOrFail($id);
        $empresa -> nombre = $request -> nombreE;
        $empresa -> web = $request -> web;
        $empresa -> clave = $request -> clave;
        $empresa -> claveBusqueda = $this -> limpiarTexto($request -> clave);
        $empresa -> email = $request -> email;
        $empresa -> descripcion = $request -> descripcion;
        if (Input::hasFile('logo')) {
            $file = Input::file('logo');
            $file -> move(public_path().'/img/', $file->getClientOriginalName());
            $empresa -> logo = $file->getClientOriginalName();
        }
        $empresa -> rubro_id = $request -> rubro_id;
        $empresa -> update();

        return redirect('empresa/'.$id);
    }

    public function eliminar($id){
        $empresa = Empresa::findOrFail($id);
        $empresa -> ubicaciones() -> delete();
        $empresa -> delete();

        return redirect('/');
    }

}
