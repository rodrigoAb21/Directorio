<?php

namespace App\Http\Controllers;

use App\Modelos\Ubicacion;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    public function registrar($id,Request $request){
        $ubicacion= new Ubicacion();
        $ubicacion->nombre=$request->nombres;
        $ubicacion->telefono=$request->telefono;
        $ubicacion->direccion=$request->direccion;
        $ubicacion->departamento=$request->departamento;
        $ubicacion->latitud=$request->latitud;
        $ubicacion->longitud=$request->longitud;
        $ubicacion->empresa_id=$id;
        $ubicacion->save();
        return redirect('empresa/editar/'.$id);
    }

    public function editar($id, Request $request){

    }
}
