<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Busqueda extends Model
{
    protected $table = 'busqueda';

    protected $fillable = [
        'pal_ingresada'
    ];

    public $timestamps = false;
}
