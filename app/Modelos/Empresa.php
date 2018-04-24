<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'descripcion',
        'web',
        'clave',
        'email',
        'logo',
        'rubro_id',
    ];

    public function rubro(){
        return $this -> belongsTo('App\Modelos\Rubro');
    }

    public function ubicaciones(){
        return $this -> hasMany('App\Modelos\Ubicacion');
    }

    public function palEmpresas(){
        return $this -> hasMany('App\Modelos\Pal_empresa');
    }

    public function scope_getEmpresasPorRubro($query, $idRubro){
        return  $query -> where('rubro_id', '=', $idRubro) -> paginate(5);
    }
}
