<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
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
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name' =>'DTI']);
        $role3 = Role::create(['name' =>'Asuntos Internos']);
        $role4 = Role::create(['name' =>'SSOMA']);

        Permission::create(['name' => 'Modulo SSOMA'])->syncRoles([$role1, $role4]);
        Permission::create(['name' => 'Modulo Asuntos Internos'])->syncRoles([$role1, $role3]);
        Permission::create(['name' => 'Modulo Incidencias'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'Modulo Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'Modulo Subcategorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'Modulo Prioridad'])->syncRoles([$role1]);
        Permission::create(['name' => 'Modulo Empleados'])->syncRoles([$role1]);
        Permission::create(['name' => 'Modulo Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'Modulo Areas'])->syncRoles([$role1]);
        Permission::create(['name' => 'Modulo Usuarios'])->syncRoles([$role1]);
    }
}
