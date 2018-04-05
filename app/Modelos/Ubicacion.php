<?php

namespace App\Modelos;

use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    protected $table = 'rubro';

    protected $primaryKey = 'id';

    public $timestamps = 'false';

    protected $fillable = [
        'nombre'
    ];

    public function empresa(){
        return $this -> belongsTo('App\Modelos\Empresa');
    }
}
