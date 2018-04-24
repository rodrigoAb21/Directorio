<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Pal_empresa extends Model
{
    protected $table = 'pal_empresa';

    protected $primaryKey = ['id_empresa','palabra'];

    public $timestamps = false;

    protected $fillable = [
        'id_empresa',
        'palabra'
    ];

    public function empresa(){
        return $this -> belongsTo('App\Modelos\Empresa');
    }


}
