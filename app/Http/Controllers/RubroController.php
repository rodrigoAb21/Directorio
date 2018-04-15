<?php

namespace App\Http\Controllers;

use App\Modelos\Rubro;
use Illuminate\Http\Request;

class RubroController extends Controller
{
    public function verRubros(){
        $rubros = Rubro::all();

        return view('Rubros.verRubros', ['rubros' => $rubros]);
    }
}
