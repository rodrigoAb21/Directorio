<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidadorUbi;
use App\Modelos\Rubro;
use App\Modelos\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UbicacionController extends Controller
{
    public function registrar($id,ValidadorUbi $request){
        $ubicacion = new Ubicacion();
        $ubicacion -> nombre = $request -> nombreU;
        $ubicacion -> telefono = $request -> telefono;
        $ubicacion -> direccion = $request -> direccion;
        $ubicacion -> departamento = $request -> departamento;
        $ubicacion -> latitud = $request -> latitud;
        $ubicacion -> longitud = $request -> longitud;
        $ubicacion -> empresa_id = $id;
        $ubicacion -> save();
        return redirect('empresa/editar/'.$id);
    }

    public function editar($id, ValidadorUbi $request){
        $ubicacion = Ubicacion::findOrFail($id);
        $ubicacion -> nombre = $request -> nombreU;
        $ubicacion -> telefono = $request -> telefono;
        $ubicacion -> direccion = $request -> direccion;
        $ubicacion -> departamento = $request -> departamento;
        $ubicacion -> latitud = $request -> latitud;
        $ubicacion -> longitud = $request -> longitud;
        $ubicacion -> update();

        return redirect('empresa/editar/'.$ubicacion -> empresa_id);
    }

    public function eliminar($id){
        $ubicacion=Ubicacion::findOrFail($id);
        $ubicacion->delete();

        return redirect('empresa/editar/'.$ubicacion->empresa_id);
    }











}
