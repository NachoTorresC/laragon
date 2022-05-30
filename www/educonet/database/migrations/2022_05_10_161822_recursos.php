<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Recursos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recursos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('autor');
            $table->string('categoria');
            $table->text('descripcion');
            $table->foreignId('id_profesores')
                  ->constrained('profesores')
                  ->cascadeOnUpdate();
           
            $table->timestamps(); 
        });


        DB::table("recursos")
        ->insert([
            'nombre'=> 'Marcasitios modelo arcoíris.',
            'autor' =>'Cristina Rionda ',
            'categoria'=>'Asamblea',
            'descripcion'=>'Conjunto de 12 modelos diferentes de arcoíris para marcar los lugares en los que sentarse en la zona de asamblea.',
            'id_profesores'=>'1'
        ]);

        DB::table("recursos")
        ->insert([
            'nombre'=> 'Plantilla horario.',
            'autor' =>'Felipe ',
            'categoria'=>'Asamblea',
            'descripcion'=>'Plantilla de horario semanal (de lunes a viernes) distribuida en 5 sesiones diarias y descanso intermedio. Incluye columna para las horas.',
            'id_profesores'=>'3'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'Tarjetas de cumpleaños.',
            'autor' =>'David ',
            'categoria'=>'Asamblea',
            'descripcion'=>'Tarjetas de los meses del año en las que añadir las fotos del alumnado según su mes de nacimiento.',
            'id_profesores'=>'2'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'Carteles de rutinas del aula.',
            'autor' =>'Jaime ',
            'categoria'=>'Asamblea',
            'descripcion'=>'18 carteles con distintas rutinas y momentos habituales del aula para estructurar la jornada. En letra mayúscula y con imagen asociada.',
            'id_profesores'=>'4'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'Marcasitios modelo arcoíris.',
            'autor' =>'Cristina Rionda ',
            'categoria'=>'Asamblea',
            'descripcion'=>'Conjunto de 12 modelos diferentes de arcoíris para marcar los lugares en los que sentarse en la zona de asamblea.',
            'id_profesores'=>'1'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'Marcasitios modelo arcoíris.',
            'autor' =>'Cristina Rionda ',
            'categoria'=>'Asamblea',
            'descripcion'=>'Conjunto de 12 modelos diferentes de arcoíris para marcar los lugares en los que sentarse en la zona de asamblea.',
            'id_profesores'=>'1'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'Marcasitios modelo arcoíris.',
            'autor' =>'Cristina Rionda ',
            'categoria'=>'Asamblea',
            'descripcion'=>'Conjunto de 12 modelos diferentes de arcoíris para marcar los lugares en los que sentarse en la zona de asamblea.',
            'id_profesores'=>'1'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'Marcasitios modelo arcoíris.',
            'autor' =>'Cristina Rionda ',
            'categoria'=>'Asamblea',
            'descripcion'=>'Conjunto de 12 modelos diferentes de arcoíris para marcar los lugares en los que sentarse en la zona de asamblea.',
            'id_profesores'=>'1'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'Marcasitios modelo arcoíris.',
            'autor' =>'Cristina Rionda ',
            'categoria'=>'Asamblea',
            'descripcion'=>'Conjunto de 12 modelos diferentes de arcoíris para marcar los lugares en los que sentarse en la zona de asamblea.',
            'id_profesores'=>'1'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'Marcasitios modelo arcoíris.',
            'autor' =>'Cristina Rionda ',
            'categoria'=>'Asamblea',
            'descripcion'=>'Conjunto de 12 modelos diferentes de arcoíris para marcar los lugares en los que sentarse en la zona de asamblea.',
            'id_profesores'=>'1'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'Marcasitios modelo arcoíris.',
            'autor' =>'Cristina Rionda ',
            'categoria'=>'Asamblea',
            'descripcion'=>'Conjunto de 12 modelos diferentes de arcoíris para marcar los lugares en los que sentarse en la zona de asamblea.',
            'id_profesores'=>'1'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'Marcasitios modelo arcoíris.',
            'autor' =>'Cristina Rionda ',
            'categoria'=>'Asamblea',
            'descripcion'=>'Conjunto de 12 modelos diferentes de arcoíris para marcar los lugares en los que sentarse en la zona de asamblea.',
            'id_profesores'=>'1'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'Marcasitios modelo arcoíris.',
            'autor' =>'Cristina Rionda ',
            'categoria'=>'Asamblea',
            'descripcion'=>'Conjunto de 12 modelos diferentes de arcoíris para marcar los lugares en los que sentarse en la zona de asamblea.',
            'id_profesores'=>'1'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'Marcasitios modelo arcoíris.',
            'autor' =>'Cristina Rionda ',
            'categoria'=>'Asamblea',
            'descripcion'=>'Conjunto de 12 modelos diferentes de arcoíris para marcar los lugares en los que sentarse en la zona de asamblea.',
            'id_profesores'=>'1'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'Marcasitios modelo arcoíris.',
            'autor' =>'Cristina Rionda ',
            'categoria'=>'Asamblea',
            'descripcion'=>'Conjunto de 12 modelos diferentes de arcoíris para marcar los lugares en los que sentarse en la zona de asamblea.',
            'id_profesores'=>'1'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'Marcasitios modelo arcoíris.',
            'autor' =>'Cristina Rionda ',
            'categoria'=>'Asamblea',
            'descripcion'=>'Conjunto de 12 modelos diferentes de arcoíris para marcar los lugares en los que sentarse en la zona de asamblea.',
            'id_profesores'=>'1'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'Marcasitios modelo arcoíris.',
            'autor' =>'Cristina Rionda ',
            'categoria'=>'Asamblea',
            'descripcion'=>'Conjunto de 12 modelos diferentes de arcoíris para marcar los lugares en los que sentarse en la zona de asamblea.',
            'id_profesores'=>'1'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'Marcasitios modelo arcoíris.',
            'autor' =>'Cristina Rionda ',
            'categoria'=>'Asamblea',
            'descripcion'=>'Conjunto de 12 modelos diferentes de arcoíris para marcar los lugares en los que sentarse en la zona de asamblea.',
            'id_profesores'=>'1'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'Marcasitios modelo arcoíris.',
            'autor' =>'Cristina Rionda ',
            'categoria'=>'Asamblea',
            'descripcion'=>'Conjunto de 12 modelos diferentes de arcoíris para marcar los lugares en los que sentarse en la zona de asamblea.',
            'id_profesores'=>'1'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'Marcasitios modelo arcoíris.',
            'autor' =>'Cristina Rionda ',
            'categoria'=>'Asamblea',
            'descripcion'=>'Conjunto de 12 modelos diferentes de arcoíris para marcar los lugares en los que sentarse en la zona de asamblea.',
            'id_profesores'=>'1'
        ]);


    }




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recursos');
    }
}
