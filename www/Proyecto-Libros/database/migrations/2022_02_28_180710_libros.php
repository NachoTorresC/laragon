<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Libros extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function(blueprint $table){
            $table->id('codigo');
            $table->id('id_temática');
            $table->id('id_usuario');
            $table->string('titulo');
            $table->timestamps(),// se almacena la hora y fecha de un nuevo registro y se actualiza la hora y fecha si se actualiza el registro
        })
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros');
    }
}
