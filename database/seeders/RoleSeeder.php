<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // Crear Rol
        $role1 = Role::create(['name'=>'Admin']);
        $role2 = Role::create(['name'=>'User']);

        //Permisos para el rol
        Permission::create(['name'=>'administrador.user.index','description'=>'mostrar usuario'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'administrador.user.create','description'=>'crear usuario'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'administrador.user.edit','description'=>'editar usuario'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'administrador.user.destroy','description'=>'eliminar usuario'])->syncRoles([$role1, $role2]);

        Permission::create(['name'=>'administrador.employee.index','description'=>'mostrar empleado'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'administrador.employee.create','description'=>'crear empleado'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'administrador.employee.edit','description'=>'editar empleado'])->syncRoles([$role1, $role2]);
        Permission::create(['name'=>'administrador.employee.destroy','description'=>'eliminar empleado'])->syncRoles([$role1, $role2]);
        
    }
}
