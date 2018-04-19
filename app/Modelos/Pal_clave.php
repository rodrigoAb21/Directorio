<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Pal_clave extends Model
{
    protected $primaryKey = 'id';

    protected $table = 'pal_clave';

    public $timestamps = false;

    protected $fillable = [
        'palabra',
    ];

    public function palEmpresas(){
        return $this -> hasMany('App\Modelos\Pal_empresa');
    }
}
