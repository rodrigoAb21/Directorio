<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Rubro extends Model
{
    protected $table = 'rubro';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'nombre'
    ];

    public function empresas(){
        return $this -> hasMany('App\Modelos\Empresa');
    }
}
