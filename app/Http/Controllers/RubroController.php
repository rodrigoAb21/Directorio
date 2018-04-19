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
        return view('Rubros.gestRubros',['rubros'=>$rubros]);
    }


    public function registrar(Request $request){
        $rubro =new Rubro();
        $rubro->nombre= $request->nombre;
        $rubro->icono=$request->icono;
        $rubro->save();

        return redirect('rubros');
    }

    public function eliminar($id){
        $empresas = DB::table('empresa')
            -> join('rubro','rubro.id','=','empresa.rubro_id')
            -> where('rubro','=',$id)
            -> get('empresa.id');
        $empresas -> ubicaciones() -> delete();
        $empresas -> delete();
        $rubro= Rubro::findOrFail($id);
        $rubro->delete();

        return redirect('gestRubros');
    }

    public function editar(Request $request, $id){
        $rubro= Rubro::findOrFail($id);
        $rubro->nombre=$request->nombre;
        $rubro->icono=$request->icono;
        $rubro->update();
        return redirect('gestRubros');
    }
}
