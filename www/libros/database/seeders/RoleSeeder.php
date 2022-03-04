<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1=Role::create(['name'=>'admin']);
        $role2=Role::create(['name'=>'invitado']);
        $role3=Role::create(['name'=>'usuario']);
        Permission::create(['name'=>'admin'])->assignRole($role1);
        Permission::create(['name'=>'admin.list_user'])->assignRole($role1);;
        Permission::create(['name'=>'admin.list_libros'])->syncRoles([$role1,$role2,$role3]);
    }
}
