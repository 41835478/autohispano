<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('carros', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('condicion');
            $table->integer('idModelo')->unsigned();
            $table->double('anio');
            $table->integer('idTipo')->unsigned();
            $table->double('millaje');
            $table->string('tipoCombustible');
            $table->string('transmision');
            $table->string('manejo');
            $table->string('colorExterior');
            $table->string('colorInterior');
            $table->date('fechaRegistro');
            $table->string('vin');
            $table->integer('estado');
            $table->integer('idUser')->unsigned();
            $table->string('comentarios');
            $table->double('precio');
            $table->integer('contadorImagenes');
            $table->timestamps();

            $table->foreign('idModelo')->references('id')->on('modelos');
            $table->foreign('idTipo')->references('id')->on('tipos');
            $table->foreign('idUser')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
