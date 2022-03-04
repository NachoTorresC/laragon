<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = User::create([
            'name'=>'Nacho',
            'email'=> 'vyd15559@educastur.es',
            'email_verified_at'=>now(),
            'password'=>Hash::make('password')
        ]);
        $usuario->assignRole('admin');
        User::factory(9)->create();
    }
}
