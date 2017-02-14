<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('numtel');
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->string('foto');
            $table->string('fb');
            $table->string('twitter');
            $table->integer('tipo');
            $table->integer('paquete');
            $table->string('ciudad');
            $table->boolean('contacto');
            $table->integer('status');
            $table->boolean('autopago');
            $table->integer('fechacorte');
            $table->string('idStripe');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
