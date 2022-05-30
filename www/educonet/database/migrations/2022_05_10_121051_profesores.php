<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Profesores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profesores', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('correo')->unique();
            $table->integer('telefono')->unique();
            $table->timestamps();
     
            
        });

        DB::table("profesores")
        ->insert([
            'nombre'=> 'Cristina',
            'apellido' =>'Rionda ',
            'correo'=>'cristina_rionda@educastur.es',
            'telefono'=>'679456789'
        ]);
        DB::table("profesores")
        ->insert([
            'nombre'=> 'David',
            'apellido' =>'garrincha ',
            'correo'=>'davidGrarrin@educastur.es',
            'telefono'=>'693258147'
        ]);
        DB::table("profesores")
        ->insert([
            'nombre'=> 'Felipe',
            'apellido' =>'da lima ',
            'correo'=>'felipao@educastur.es',
            'telefono'=>'654321789'
        ]);
        DB::table("profesores")
        ->insert([
            'nombre'=> 'Jaime',
            'apellido' =>'Marquez ',
            'correo'=>'JMarquez@educastur.es',
            'telefono'=>'687352147'
        ]);
        DB::table("profesores")
        ->insert([
            'nombre'=> 'Alex',
            'apellido' =>'Criville ',
            'correo'=>'ACrivi@educastur.es',
            'telefono'=>'623658741'
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profesores');
    }
}
