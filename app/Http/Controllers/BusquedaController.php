<?php

namespace App\Http\Controllers;

use App\Modelos\Pal_ing;
use App\Modelos\Rubro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusquedaController extends Controller
{
    public function listarPorRubro($id){
        $ubicaciones = DB::table('ubicacion')
            -> join('empresa','empresa.id','=','ubicacion.empresa_id')
            -> join('rubro','rubro.id','=','empresa.rubro_id')
            -> where('rubro.id','=',$id)
            -> select('ubicacion.id', 'ubicacion.nombre', 'ubicacion.telefono', 'ubicacion.departamento', 'ubicacion.direccion', 'ubicacion.longitud', 'ubicacion.latitud')
            -> paginate(5);
        $rubro = Rubro::findOrFail($id);
        return view('Busqueda.resultado',['ubicaciones' => $ubicaciones, 'busqueda' => $rubro -> nombre]);
    }

    public function buscar(Request $request){
        $elementos = $this->limpiar($request -> busqueda);
        foreach ($elementos as $elemento){
            $ingresada = new Pal_ing();
            $ingresada -> pal_ingresada = $elemento;
            $ingresada -> save();
        }

        $resultados = DB::select('select * from ubicacion where ubicacion.empresa_id in (select empresa.id form empresa, pal_empresa where empresa.id = pal_empresa.id and pal_empresa.id_pal in(select pal_clave.id from pal_clave inner join pal_ing on pal_clave.palabra = pal_ing.pal_ingresada) group by empresa.id order by count(id_pal) desc)');

        Pal_ing::all() -> delete();

        return view('Busqueda.resultado',['ubicaciones' => $resultados, 'busqueda' => $request -> busqueda]);

    }

    public function limpiar($texto){
        $cadena = "";
        $arreglo = array();
        for ($i = 0; $i < strlen($texto); $i++) {
            if ($texto[i] != " "){
                $cadena = $cadena + $texto[i];
            }else{
                $arreglo[] = $cadena;
                $cadena = "";
            }
        }
        return $arreglo;
    }

}
