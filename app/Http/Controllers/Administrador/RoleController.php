<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        return view('administrador.roles.index',compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('administrador.roles.create',compact('permissions'));
    }


    public function store(Request $request)
    {
        $rol = Role::create(['name' => strtoupper($request->name)]);
        $rol->permissions()->sync($request->permissions);
        Alert::toast('Rol guardado correctamente','success');
        return redirect()->route('administrador.roles.index');
    }


    /* public function show(Role $role)
    {

    } */


    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('administrador.roles.edit',compact('role','permissions'));
    }


    public function update(Request $request, Role $role)
    {
        $role1 = Role::find($role->id);
        $role1->name = strtoupper($request->name);
        $role1->save();

        /* $role2 = $role->update([
            'name' => strtoupper($request->name)
        ]); */

        $role->permissions()->sync($request->permissions);
        Alert::toast('Rol editado correctamente','success');
        return redirect()->route('administrador.roles.index');
    }


    public function destroy(Role $role)
    {
        $role->delete();
        Alert::toast('Rol eliminado correctamente','success');
        return redirect()->route('administrador.roles.index');
    }
}
