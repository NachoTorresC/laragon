<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('tematica');
            $table->string('sinopsis');
            $table->string('autor');
            $table->string('portada');
            $table->timestamps();
        });

        DB::table("libros")
        ->insert([
        "titulo" => "El codigo da Vinci",
        "tematica"=>"misterio/conspiración",
        "sinopsis"=>"La mayor conspiración de los últimos 2000 años está a punto de ser desvelada. Robert Langdon recibe una llamada en mitad de la noche",
        "autor"=>"Dan Brown",
        "portada"=>"null"
    ]);
        DB::table("libros")
        ->insert([
        "titulo" => "La sangre de los inocentes",
        "tematica"=>"narrativa histórica",
        "sinopsis"=>"Una vertiginosa aventura que nos transporta a lugares como Jerusalén, Granada, Roma o Estambul, y que indaga en las causas del fanatismo religioso y la intolerancia a lo largo de los siglos.",
        "autor"=>"Julia Navarro",
        "portada"=>"null"
    ]);
         DB::table("libros")
        ->insert([
         "titulo" => "Los pilares de la tierra",
         "tematica"=>"novela histórica",
         "sinopsis"=>" El amor y la muerte se entrecruzan vibrantemente en este magistral tapiz cuyo centro es la construcción de una catedral gótica. La historia se inicia con el ahorcamiento público de un inocente y finaliza con la humillación de un rey.",
         "autor"=>"Ken Follet",
         "portada"=>"null"
]);
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
