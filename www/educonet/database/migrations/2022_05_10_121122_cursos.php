<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('categoria');
            $table->text('descripcion');
            $table->foreignId('id_profesores')
                  ->constrained('profesores')
                  ->cascadeOnUpdate();
            $table->timestamps();
        });

        DB::table("cursos")
        ->insert([
            'nombre'=> 'Cristina',
            'categoria' =>'aprende a enseñar ',
            'descripcion'=>'curso orientado a interinos',
            'id_profesores'=>'1',
        ]);
        DB::table("cursos")
        ->insert([
            'nombre'=> 'Cristina',
            'categoria' =>'aprende a enseñar ',
            'descripcion'=>'curso orientado a interinos',
            'id_profesores'=>'1',
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
}
