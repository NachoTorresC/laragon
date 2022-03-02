<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1=Role::create(['name'=>'administrador']);
        $role1=Role::create(['name'=>'invitado']);
        $role1=Role::create(['name'=>'usuario']);
    }
}
