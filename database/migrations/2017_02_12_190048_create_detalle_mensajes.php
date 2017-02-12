<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetalleMensajes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('detallemensajes',function (Blueprint $table){
            $table->integer('idMensaje')->unsigned();
            $table->integer('idUserSend')->unsigned();
            $table->integer('idUserReceive')->unsigned();
            $table->date('fecha');
            $table->time('hora');
            $table->integer('estado');
            $table->string('mensaje');
            $table->timestamps();
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
