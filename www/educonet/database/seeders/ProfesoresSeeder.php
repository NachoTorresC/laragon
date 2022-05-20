<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Profesores;


class ProfesoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            ['nombre'=> 'Cristina',
            'apellido' =>'Rionda ',
            'correo'=>'cristina_rionda@educastur.es',
            'telefono'=>'679456789'
        ],

            ['nombre'=> 'David',
            'apellido' =>'garrincha ',
            'correo'=>'davidGrarrin@educastur.es',
            'telefono'=>'693258147'
    ],

            ['nombre'=> 'Felipe',
            'apellido' =>'da lima ',
            'correo'=>'felipao@educastur.es',
            'telefono'=>'654321789'
],

            ['nombre'=> 'Jaime',
            'apellido' =>'Marquez ',
            'correo'=>'JMarquez@educastur.es',
            'telefono'=>'687352147'
],
            ['nombre'=> 'Alex',
            'apellido' =>'Criville ',
            'correo'=>'ACrivi@educastur.es',
            'telefono'=>'623658741'
            ]
        ];


        db::table('profesores')->insert($data);
    
    }
}
