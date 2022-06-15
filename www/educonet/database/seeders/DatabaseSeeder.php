<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {


        // Aquí genero un usuario el cual será el administrador de la página

        $this->call(RoleSeeder::class);
        \App\Models\User::create([
            'name' => 'Nacho',
            'email' => 'nachotorres_c@hotmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('pa$$word'), // contraseña del administrador
            'remember_token' => 'Ka18aprTpW7QFVtyuufd9n8aUvdbldx9XR7V8jM4SI2uEEyxLjetB02uRzDV'
            ])->assignRole('Admin');

            \App\Models\User::create([
                'name' => 'Cristina',
                'email' => 'cris@premium.com',
                'email_verified_at' => now(),
                'password' => Hash::make('usuarioPremium'), // contraseña del usuario premium
                'remember_token' => 'Ka18aprTpW7QFVtyuufd9n8aUvdbldx9XR7V8jM4SI2uEEyxLjetB02uRzDV'
                ])->assignRole('premium');


            // generación de 28 usuarios 
         \App\Models\User::factory(28)->create();
        $this->seedRelationRolesUser();

        
    }
    

    public function seedRelationRolesUser()
    {
        $users = \App\Models\User::all();

        //Asigno a todos los users menos al admin el rol de guest
        foreach ($users as $user) {
            if ($user!=\App\Models\User::find(1) && $user!=\App\Models\User::find(2))  {
                $user->assignRole('invitado');
            }
        }
    }
}
