<?php

namespace App\Http\Controllers;

use App\Modelos\Ubicacion;
use Illuminate\Http\Request;

class UbicacionController extends Controller
{
    public function registrar($id,Request $request){
        $ubicacion = new Ubicacion();
        $ubicacion -> nombre = $request -> nombres;
        $ubicacion -> telefono = $request -> telefono;
        $ubicacion -> direccion = $request -> direccion;
        $ubicacion -> departamento = $request -> departamento;
        $ubicacion -> latitud = $request -> latitud;
        $ubicacion -> longitud = $request -> longitud;
        $ubicacion -> empresa_id = $id;
        $ubicacion -> save();
        return redirect('empresa/editar/'.$id);
    }

    public function editar($id, Request $request){
        $ubicacion = Ubicacion::findOrFail($id);
        $ubicacion -> nombre = $request -> nombre2;
        $ubicacion -> telefono = $request -> telefono2;
        $ubicacion -> direccion = $request -> direccion2;
        $ubicacion -> departamento = $request -> departamento2;
        $ubicacion -> latitud = $request -> latitud2;
        $ubicacion -> longitud = $request -> longitud2;
        $ubicacion -> update();

        return redirect('empresa/editar/'.$ubicacion -> empresa_id);
    }
}
