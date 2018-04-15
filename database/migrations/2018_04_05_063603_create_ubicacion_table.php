<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUbicacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubicacion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('telefono') -> nullable();
            $table->string('departamento');
            $table->string('direccion');
            $table->string('latitud');
            $table->string('longitud');
            $table->integer('empresa_id') -> unsigned();

            $table -> foreign('empresa_id') -> references('id') -> on('empresa');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ubicacion');
    }
}
