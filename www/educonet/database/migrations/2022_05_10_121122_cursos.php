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
            $table->String('Imagen');
            $table->String('descargable');
            $table->foreignId('id_profesores')
                  ->constrained('profesores')
                  ->cascadeOnUpdate();
            $table->timestamps();
        });

        DB::table("cursos")
        ->insert([
            'nombre'=> 'CURSO AVANZADO INFANTIL ABN',
            'categoria' =>'Curso',
            'descripcion'=>'Ampliar los conocimientos de la numeración ABN iniciada en Infantil.Iniciar y sentar las bases del algoritmo de cálculo.Motivar al profesorado en nuevas metodologías que mejoren los resultados académicos',
            'id_profesores'=>'1',
            'Imagen'=>'17.png',
            'descargable'=>'Cursoavanzado.pdf'
        ]);
        DB::table("cursos")
        ->insert([
            'nombre'=> 'ACOMPAÑANDO EMOCIONES',
            'categoria' =>'Taller',
            'descripcion'=>'¿Qué son las emociones? ¿Y los sentimientos? ¿Qué pasa en nuestro cerebro cuando una emoción se activa? ¿Qué tienen que ver con el aprendizaje? ¿Podemos controlar nuestras emociones? ¿Qué pasa cuando una emoción nos invade? En este curso abordaremos estas y otras muchas cuestiones que tienen que ver con las emociones y cómo acompañar a nuestras niñas y niños en el conocimiento y regulación de las mismas.',
            'id_profesores'=>'2',
            'Imagen'=>'20.png',
            'descargable'=>'Acompañandoemociones.pdf'
        ]);
        DB::table("cursos")
        ->insert([
            'nombre'=> 'PRINCIPIOS MONTESSORI Y AMBIENTE PREPARADO',
            'categoria' =>'Curso',
            'descripcion'=>'En este curso podrás adquirir una visión global de lo que es Montessori, conociendo los principios básicos de la filosofía Montessori, aprenderás a indentificar los obstáculos que entorpecen el desarrollo y el aprendizaje de tus hijos',
            'id_profesores'=>'1',
            'Imagen'=>'21.png',
            'descargable'=>'principiosmontessori.pdf'
        ]);
        DB::table("cursos")
        ->insert([
            'nombre'=> 'EL JUEGO CON MINIMUNDOS',
            'categoria' =>'Curso',
            'descripcion'=>'El juego de los Mini Mundos es un tipo de juego imaginativo y de roles que invita y provoca a los niños a ser creativos y espontáneos en un contexto de juego dramático-representativo, de la misma manera que lo hacen muchas otras actividades de la vida cotidiana.',
            'id_profesores'=>'2',
            'Imagen'=>'22.png',
            'descargable'=>'Minimundos.pdf'
        ]);
        DB::table("cursos")
        ->insert([
            'nombre'=> 'JUGAR CON LOS CUENTOS',
            'categoria' =>'Masterclass',
            'descripcion'=>'En esta masterclass te ayudaremos a mejorar la relación con tus hijos, alumnos a través de los juegos.',
            'id_profesores'=>'1',
            'Imagen'=>'23.png',
            'descargable'=>'Jugarcuentos.pdf'
        ]);
     
        DB::table("cursos")
        ->insert([
            'nombre'=> 'SIGNOS PARA BEBÉS',
            'categoria' =>'Curso',
            'descripcion'=>'Aprende a saber lo que le pasa por la cabeza a los más pequeños',
            'id_profesores'=>'2',
            'Imagen'=>'24.png',
            'descargable'=>'Signosbebes.pdf'
        ]);
        DB::table("cursos")
        ->insert([
            'nombre'=> 'ORGANIZACIÓN Y ORDEN EN LOS ESPACIOS INFANTILES',
            'categoria' =>'Taller',
            'descripcion'=>'En este taller enseñaremos a organizar los espacios infantiles, de manera que se conviera en algo sencillo y divertido.',
            'id_profesores'=>'2',
            'Imagen'=>'25.png',
            'descargable'=>'Organizacion.pdf'
        ]);
        DB::table("cursos")
        ->insert([
            'nombre'=> 'AUTOESTIMA INFANTIL',
            'categoria' =>'Curso',
            'descripcion'=>'Entenderás qué es la autoestima y como se construye, aprenderás a ayudar a desarrolar al alumnado todas las habilidades de las personas con buena autoestima.',
            'id_profesores'=>'2',
            'Imagen'=>'26.png',
            'descargable'=>'Autoestima.pdf'
        ]);
        DB::table("cursos")
        ->insert([
            'nombre'=> 'INTRODUCCIÓN A LA EDUCACIÓN EN POSITIVO',
            'categoria' =>'Curso',
            'descripcion'=>'¿Qué son las emociones? ¿Y los sentimientos? ¿Qué pasa en nuestro cerebro cuando una emoción se activa? ¿Qué tienen que ver con el aprendizaje? ¿Podemos controlar nuestras emociones? ¿Qué pasa cuando una emoción nos invade? En este curso abordaremos estas y otras muchas cuestiones que tienen que ver con las emociones y cómo acompañar a nuestras niñas y niños en el conocimiento y regulación de las mismas.',
            'id_profesores'=>'2',
            'Imagen'=>'27.png',
            'descargable'=>'Educapos.pdf'
        ]);
        DB::table("cursos")
        ->insert([
            'nombre'=> 'ACOMPAÑAR EL CONTROL DE ESFÍNTERES',
            'categoria' =>'Curso',
            'descripcion'=>'En este curso conoceremos los aspectos más relevantes del acompañamiento al control de esfínteres desde el respeto a los ritmos particulares y las herramientas prácticas que nos faciliten apoyar tan importante proceso de niños y niñas.',
            'id_profesores'=>'3',
            'Imagen'=>'28.png',
            'descargable'=>'Controles.pdf'
        ]);
       
        DB::table("cursos")
        ->insert([
            'nombre'=> 'GESTIÓN DE RABIETAS',
            'categoria' =>'Curso',
            'descripcion'=>'Conoceremos los principios de la disciplina positiva, veremos las bases para entender el comportamiento de los niños y niñas.',
            'id_profesores'=>'4',
            'Imagen'=>'29.png',
            'descargable'=>'gestionRabietas.pdf'
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
