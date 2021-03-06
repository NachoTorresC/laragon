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
            $table->String('Imagen');
            $table->String('descargable');
            $table->foreignId('id_profesores')
                  ->constrained('profesores')
                  ->cascadeOnUpdate();

           
            $table->timestamps(); 
        });


        DB::table("recursos")
        ->insert([
            'nombre'=> 'Marcasitios modelo arcoíris.',
            'autor' =>'Cristina  ',
            'categoria'=>'Asamblea',
            'descripcion'=>'Conjunto de 12 modelos diferentes de arcoíris para marcar los lugares en los que sentarse en la zona de asamblea.',
            'id_profesores'=>'1',
            'descargable'=>'Marcasitiosmodeloarcoiris.pdf',
            'Imagen'=>'Marcasitios.png'
        ]);

        DB::table("recursos")
        ->insert([
            'nombre'=> 'Plantilla horario.',
            'autor' =>'Felipe ',
            'categoria'=>'Asamblea',
            'descripcion'=>'Plantilla de horario semanal (de lunes a viernes) distribuida en 5 sesiones diarias y descanso intermedio. Incluye columna para las horas.',
            'id_profesores'=>'3',
            'descargable'=>'Horario.pdf',
            'Imagen'=>'Horario.png'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'Tarjetas de cumpleaños.',
            'autor' =>'Nico ',
            'categoria'=>'Asamblea',
            'descripcion'=>'Tarjetas de los meses del año en las que añadir las fotos del alumnado según su mes de nacimiento.',
            'id_profesores'=>'2',
            'descargable'=>'Tarjetasdecumpleaños.pdf',
            'Imagen'=>'TarjetasCumpleaños.png'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'Carteles de rutinas del aula.',
            'autor' =>'Jaime ',
            'categoria'=>'Asamblea',
            'descripcion'=>'18 carteles con distintas rutinas y momentos habituales del aula para estructurar la jornada. En letra mayúscula y con imagen asociada.',
            'id_profesores'=>'4',
            'descargable'=>'Rutinas.pdf',
            'Imagen'=>'Rutinas.png'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> ' Etiquetas para cajoneras.',
            'autor' =>'Cristina  ',
            'categoria'=>'Asamblea',
            'descripcion'=>'Etiquetas en mayúscula, minúscula e imagen real de materiales y juguetes habituales.',
            'id_profesores'=>'1',
            'descargable'=>'Etiquetasdecajoneras.pdf',
            'Imagen'=>'EtiquetasCajoneras.png'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'Cada muñeco con su sombrero.',
            'autor' =>'Cristina  ',
            'categoria'=>'Lógico-matemática',
            'descripcion'=>'Imprimible para trabajar la asociación por colores y grafía-cantidad desde el 1 hasta el 10, añadiendo tantos botones como nos indique su sombrero.',
            'id_profesores'=>'1',
            'descargable'=>'Muñecosdenieve.pdf',
            'Imagen'=>'MuñecoNieve.png'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'Dino-series.',
            'autor' =>'Adela',
            'categoria'=>'Proyectos (dinosaurios)',
            'descripcion'=>'Imprimible con temática de dinosaurios para trabajar vocabulario y nociones de seriación. Incluye series de dos y tres elementos simples, y patrones combinados.',
            'id_profesores'=>'1',
            'descargable'=>'Seriesdinosaurios.pdf',
            'Imagen'=>'DINO-SERIES.png'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'La ruleta del cuerpo humano',
            'autor' =>'Mateo ',
            'categoria'=>'Proyectos (cuerpo humano)',
            'descripcion'=>'Conjunto de 50 imágenes para trabajar vocabulario relativo al cuerpo humano (partes externas, articulaciones, huesos, músculos, órganos, material médico…). .',
            'id_profesores'=>'1',
            'descargable'=>'Partesdelcuerpo.pdf',
            'Imagen'=>'Ruleta.png'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'El bingo del cuerpo humano.',
            'autor' =>'Laura ',
            'categoria'=>'Proyectos (cuerpo humano)',
            'descripcion'=>'25 cartones de bingo y sus correspondientes imágenes a modo de bolas con vocabulario relativo al cuerpo humano (partes externas, articulaciones, huesos, músculos, órganos, material médico…).',
            'id_profesores'=>'1',
            'descargable'=>'Bingo.pdf',
            'Imagen'=>'Bingo.png'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'Dino-receta.',
            'autor' =>'Cristina ',
            'categoria'=>'Proyectos (dinosaurios)',
            'descripcion'=>'Cartel con los ingredientes necesarios y pasos a seguir para construir tu propio diplodocus saludable. ¡Para comérselo!',
            'id_profesores'=>'1',
            'descargable'=>'Dinoreceta.pdf',
            'Imagen'=>'Dinoreceta.png'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'La huevera de las vocales.',
            'autor' =>'Cristina ',
            'categoria'=>'Lenguajes',
            'descripcion'=>'Un recurso para iniciarse en la conciencia fonológica con los sonidos de las vocales a través de la clasificación de las imágenes presentes en los huevos en su correspondiente huevera.',
            'id_profesores'=>'1',
            'descargable'=>'HUEVERADEVOCALES.pdf',
            'Imagen'=>'HueveraVocales.png'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'Palabras desordenadas.',
            'autor' =>'Laura ',
            'categoria'=>'Lenguajes',
            'descripcion'=>'Conjunto de 12 tarjetas con letras desordenadas para formar las palabras. Diferentes niveles de dificultad (directas, inversas y trabadas).',
            'id_profesores'=>'1',
            'descargable'=>'Ordenapalabras.pdf',
            'Imagen'=>'Ordenapalabras.png'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> 'Laberintos de otoño.',
            'autor' =>'Cristina  ',
            'categoria'=>'Lenguajes',
            'descripcion'=>'Distintos patrones grafomotores bajo la temática del otoño que pueden imprimirse en distintos tamaños o proyectarse a gran escala en PDI.',
            'id_profesores'=>'1',
            'descargable'=>'Laberinto.pdf',
            'Imagen'=>'Laberinto.png'
        ]);
        DB::table("recursos")
        ->insert([
            'nombre'=> '¡A la compra!',
            'autor' =>'Andrea ',
            'categoria'=>'Asamblea',
            'descripcion'=>'Con esta lista de la compra podrás trabajar la atención y el conteo de frutas y verduras (hasta el 10). Incluye dos niveles de dificultad: acompañamiento de imágenes para prelectores y palabra escrita.',
            'id_profesores'=>'1',
            'descargable'=>'Alacompra.pdf',
            'Imagen'=>'Alacompra.png'

        ]);
      
        DB::table("recursos")
        ->insert([
            'nombre'=> 'Mi casa.',
            'autor' =>'María ',
            'categoria'=>'Lenguajes',
            'descripcion'=>'Libro imprimible con una habitación diferente en cada página, e imágenes de objetos cotidianos para clasificar según la estancia en la que estén.',
            'id_profesores'=>'1',
            'descargable'=>'Lacasa.pdf',
            'Imagen'=>'Lacasa.png'
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
