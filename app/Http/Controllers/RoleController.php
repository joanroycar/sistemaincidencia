<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();

        return view('role.index',compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('role.create',compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'name'=>'required',
            'permissions'=> 'required'
      ]);

      $role = Role::create([
               'name'=> $request->name
      ]);

      $role->permissions()->attach($request->permissions);
       
      return redirect()->route('roles.index')->with('guardar','ok');

    }

    public function show($id)
    {
        
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('role.edit',compact('role','permissions'));
    }

    
    public function update(Request $request, Role $role)
    {
        $request->validate([

            'name'=>'required',
            'permissions'=> 'required'
      ]);

       $role->permissions()->sync($request->permissions);

       return redirect()->route('roles.index')->with('editar','ok');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with('eliminar','ok');

    }
}
