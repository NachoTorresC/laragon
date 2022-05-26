<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => 'Ka18aprTpW7QFVtyuufd9n8aUvdbldx9XR7V8jM4SI2uEEyxLjetB02uRzDV'
            ])->assignRole('Admin');


            // generación de 29 usuarios 
         \App\Models\User::factory(29)->create();
        $this->seedRelationRolesUser();

        
    }
    

    public function seedRelationRolesUser()
    {
        $users = \App\Models\User::all();

        //Asigno a todos los users menos al admin el rol de guest
        foreach ($users as $user) {
            if ($user!=\App\Models\User::find(1)) {
                $user->assignRole('invitado');
            }
        }
    }
}
