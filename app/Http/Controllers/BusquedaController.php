<?php

namespace App\Http\Controllers;

use App\Modelos\Busqueda;
use App\Modelos\Empresa;
use App\Modelos\Pal_ing;
use App\Modelos\Rubro;
use App\Modelos\Ubicacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusquedaController extends Controller
{
    public function listarPorRubro($id){
        $empresas = DB::table('empresa')
            ->where('rubro_id','=',$id)
            ->paginate(5);

        $rubro = Rubro::findOrFail($id);

        $ubicaciones = DB::table('ubicacion')
            ->select('empresa.id', 'ubicacion.nombre', 'ubicacion.longitud', 'ubicacion.latitud')
            ->join('empresa','ubicacion.empresa_id','=','empresa.id')
            ->where('empresa.rubro_id','=',$id)
            ->get();
        return view('Busqueda.resultado',['empresas' => $empresas, 'busqueda' => "l rubro: ".$rubro -> nombre, 'ubicaciones' => $ubicaciones]);
    }

    public function buscar(Request $request){
        $elementos = $this->limpiar($request -> busqueda);

        foreach ($elementos as $elemento){
            $ingresada = new Busqueda();
            $ingresada -> pal_ingresada = $elemento;
            $ingresada -> save();
        }

        /*
         SELECT pal_empresa.empresa_id, COUNT(*) as coincidencias
        FROM pal_empresa
        INNER JOIN busqueda ON pal_empresa.clave = busqueda.palabra
        GROUP BY pal_empresa.empresa_id
        ORDER BY coincidencias desc;
         *
         * */
         $empresas = DB::table('pal_empresa')
            ->join('empresa','pal_empresa.id_empresa','empresa.id')
            ->join('busqueda','pal_empresa.palabra','=','busqueda.pal_ingresada')
            ->select(DB::raw('empresa.id, COUNT(*) as cant, empresa.nombre, empresa.web, empresa.email, empresa.logo'))
            ->groupBy('empresa.id')
            ->orderBy('cant','desc')
            ->paginate(10);

         DB::table('busqueda')->delete();

        $ubicaciones = DB::table('ubicacion')
            ->where('ubicacion.Empresa_id','=','18')
            ->get();

        return view('Busqueda.resultado',['empresas' => $empresas, 'busqueda' => " la busqueda: ".$request -> busqueda, 'ubicaciones' => $ubicaciones]);

    }

    public function limpiar($texto){
        $cadena = "";
        $arreglo = array();
        for ($i = 0; $i < strlen($texto); $i++) {
            if ($texto[$i] != " "){
                $cadena = $cadena . $texto[$i];

            }else{
                $arreglo[] = $cadena;

                $cadena = "";
            }
        }
        $arreglo[] = $cadena;
        return $arreglo;
    }

}
