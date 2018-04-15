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
        'claveBusqueda',
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
    
}
