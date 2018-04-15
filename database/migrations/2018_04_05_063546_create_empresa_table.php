<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('logo') -> nullable();
            $table->string('email') -> nullable();
            $table->string('web') -> nullable();
            $table->string('clave');
            $table->string('claveBusqueda');
            $table->string('descripcion');
            $table->integer('rubro_id') -> unsigned();

            $table -> foreign('rubro_id') -> references('id') -> on('rubro');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresa');
    }
}
