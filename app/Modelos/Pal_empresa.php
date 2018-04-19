<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Pal_empresa extends Model
{
    protected $primaryKey = ['id_empresa','id_pal'];

    protected $table = 'pal_empresa';

    public $timestamps = false;

    protected $fillable = [
        'id_empresa',
        'id_pal'
    ];

    public function palabra(){
        return $this -> belongsTo('App\Modelos\Pal_clave');
    }
    public function empresa(){
        return $this -> belongsTo('App\Modelos\Empresa');
    }


}
