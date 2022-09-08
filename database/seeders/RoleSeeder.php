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

        // Permission::create(['name' => 'Modulo SSOMA'])->syncRoles([$role1, $role4]);
        // Permission::create(['name' => 'Modulo Asuntos Internos'])->syncRoles([$role1, $role3]);
        // Permission::create(['name' => 'Modulo Incidencias'])->syncRoles([$role1, $role2]);
        // Permission::create(['name' => 'Modulo Categorias'])->syncRoles([$role1]);
        // Permission::create(['name' => 'Modulo Subcategorias'])->syncRoles([$role1]);
        // Permission::create(['name' => 'Modulo Prioridad'])->syncRoles([$role1]);
        // Permission::create(['name' => 'Modulo Empleados'])->syncRoles([$role1]);
        // Permission::create(['name' => 'Modulo Roles'])->syncRoles([$role1]);
        // Permission::create(['name' => 'Modulo Areas'])->syncRoles([$role1]);
        // Permission::create(['name' => 'Modulo Usuarios'])->syncRoles([$role1]);


        Permission::create(['name' => 'area.index','description'=>'Ver Listado de Areas'])->syncRoles([$role1]);
        Permission::create(['name' => 'area.create','description'=>'Crear Areas'])->syncRoles([$role1]);
        Permission::create(['name' => 'area.edit','description'=>'Editar Areas'])->syncRoles([$role1]);
        Permission::create(['name' => 'area.destroy','description'=>'ELiminar Areas'])->syncRoles([$role1]);


        Permission::create(['name' => 'category.index','description'=>'Ver Listado de Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'category.create','description'=>'Crear Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'category.edit','description'=>'Editar Categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'category.destroy','description'=>'ELiminar Categorias'])->syncRoles([$role1]);

        Permission::create(['name' => 'priority.index','description'=>'Ver Listado de Prioridades'])->syncRoles([$role1]);
        Permission::create(['name' => 'priority.create','description'=>'Crear Prioridades'])->syncRoles([$role1]);
        Permission::create(['name' => 'priority.edit','description'=>'Editar Prioridades'])->syncRoles([$role1]);
        Permission::create(['name' => 'priority.destroy','description'=>'ELiminar Prioridades'])->syncRoles([$role1]);

        Permission::create(['name' => 'subcategory.index','description'=>'Ver Listado de subcategorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'subcategory.create','description'=>'Crear subcategorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'subcategory.edit','description'=>'Editar subcategorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'subcategory.destroy','description'=>'Eliminar subcategorias'])->syncRoles([$role1]);

        Permission::create(['name' => 'employee.index','description'=>'Ver Listado de Empleados'])->syncRoles([$role1]);
        Permission::create(['name' => 'employee.create','description'=>'Crear Empleados'])->syncRoles([$role1]);
        Permission::create(['name' => 'employee.edit','description'=>'Editar Empleados'])->syncRoles([$role1]);
        Permission::create(['name' => 'employee.destroy','description'=>'Eliminar Empleados'])->syncRoles([$role1]);


        Permission::create(['name' => 'incidence.index','description'=>'Ver Listado de Incidentes'])->syncRoles([$role1]);
        Permission::create(['name' => 'incidence.show','description'=>'Ver Incidente'])->syncRoles([$role1]);
        Permission::create(['name' => 'incidence.create','description'=>'Crear Incidente'])->syncRoles([$role1]);
        Permission::create(['name' => 'incidence.edit','description'=>'Editar Incidente'])->syncRoles([$role1]);
        Permission::create(['name' => 'incidence.destroy','description'=>'Eliminar Incidente'])->syncRoles([$role1]);



        Permission::create(['name' => 'incidence.getIncidentes','description'=>'Ver incidentes en Asuntos Internos Empleados'])->syncRoles([$role1]);

        Permission::create(['name' => 'incidence.addObservarionInterno','description'=>'Agregar Observación de Asuntos Internos'])->syncRoles([$role1]);

        Permission::create(['name' => 'incidence.getIncidentesssoma','description'=>'Ver Incientes en SSOMA'])->syncRoles([$role1]);
        Permission::create(['name' => 'incidence.addObservationFile','description'=>'Agregar Observación de Sssoma'])->syncRoles([$role1]);


        Permission::create(['name' => 'users.index','description'=>'Ver Listado de Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.create','description'=>'Crear Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.edit','description'=>'Editar Usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.destroy','description'=>'Eliminar Usuarios'])->syncRoles([$role1]);

        Permission::create(['name' => 'roles.index','description'=>'Ver Listado de Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.create','description'=>'Crear Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.edit','description'=>'Editar Roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.destroy','description'=>'Eliminar Roles'])->syncRoles([$role1]);
    

        Permission::create(['name' => 'report.index','description'=>'Ver Reportes'])->syncRoles([$role1]);

    }
}
