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
        \App\Models\User::create([
            'name' => 'Nacho',
            'email' => 'Admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => 'T4Tqmq8biq'

        ]);

        \App\Models\User::factory(9)->create();
        \App\Models\Project::factory(10)->create();

            \App\Models\Role::create([
            'name' => 'Admin',
            'display_name' => 'Administrador',
            'description' => null
        ]);
        \App\Models\Role::create([
            'name' => 'Mod',
            'display_name' => 'Moderador',
            'description' => null
        ]);
        \App\Models\Role::create([
            'name' => 'Ge',
            'display_name' => 'Guest',
            'description' => null
        ]);  

        $this->asignarRoles();
    }

    public function asignarRoles(){

        \App\Models\User::find(1)->roles()->sync(1);
        $users = \App\Models\User::all();

        foreach ($users as $user){
            if($user!= \App\Models\User::find(1)){
                $user->roles()->sync(3);
            }
        }
    }

}
