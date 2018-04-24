<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $table = 'ubicacion';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
        'longitud',
        'latitud',
        'departamento',
        'empresa_id',
    ];

    public function empresa(){
        return $this -> belongsTo('App\Modelos\Empresa');
    }
}
