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
        $role1=Role::create(['name' =>'admin']);
        $role2=Role::create(['name' =>'invitado']);
        $role3=Role::create(['name' =>'premium']);

        Permission::create(['name'=>'adminPermission'])->syncRoles($role1);
        Permission::create(['name'=>'userPermission'])->syncRoles($role2,$role3);
        Permission::create(['name'=>'userPremium'])->syncRoles($role3,$role1);


    }
}
