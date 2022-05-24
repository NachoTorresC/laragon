<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecursosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
         ['nombre'=> 'dinosaurios',
            'autor' =>'Rionda ',
            'categoria'=>'lectoescritura',
            'descripcion'=>'trabajo con dinosaurios',
            'id_profesores'=>'1'
        ],
        ['nombre'=> 'rrtr',
        'autor' =>'Rionrtrtrda ',
        'categoria'=>'movimisfdsfentos',
        'descripcion'=>'trabajo con sfsdf',
        'id_profesores'=>'3'
    ],
        ['nombre'=> 'dinoafafsaurios',
        'autor' =>'Riondafafa ',
        'categoria'=>'movimientafafos',
        'descripcion'=>'trabajo con dinosauriafafos',
        'id_profesores'=>'2'
],
        ['nombre'=> 'dins',
        'autor' =>'adsad ',
        'categoria'=>'asdas',
        'descripcion'=>'adsasd con dinosaurios',
        'id_profesores'=>'4'
],

    
        ];


        db::table('recursos')->insert($data);
    
    }
}


