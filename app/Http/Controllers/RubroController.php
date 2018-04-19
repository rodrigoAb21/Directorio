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

    public function index(){
        $rubros=Rubro::all();
        $iconos=['plus','bed','cut','taxi'];

        return view('Rubros.gestRubros',['rubros'=>$rubros,'iconos'=>$iconos]);
    }


    public function registrar(Request $request){
        $rubro =new Rubro();
        $rubro->nombre= $request->nombre;
        $rubro->icono=$request->icono;
        $rubro->save();

        return redirect('rubros');
    }

    public function eliminar($id){
        $rubro= Rubro::findOrFail($id);
        $rubro->delete();

        return redirect('rubros');
    }

    public function editar(Request $request, $id){
        $rubro= Rubro::findOrFail($id);
        $rubro->nombre=$request->nombre;
        $rubro->icono=$request->icono;
        $rubro->update();
        return redirect('rubros');
    }
}
