<?php

namespace App\Http\Controllers;

use App\Modelos\Rubro;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function vistaCrear(){
        $rubros = Rubro::all();
        return view('formulario', ['rubros' => $rubros]);
    }

    public function registrar(Request $request){

    }

    public function verEmpresa($id){

    }
}
