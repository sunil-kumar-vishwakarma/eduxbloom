<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Role;
// use App\Models\Permission;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class RolePermissionController extends Controller
{

    public function index()
    {
        $roles = Role::with('permissions')->get();
    //   $roles = Role::all();
        return view('roles_permission.index', compact('roles'));
    }

    public function create()
    {
        // $permissions = Permission::all()->groupBy('module');

        // return view('roles_permission.create', compact('permissions'));
        $permissions = Permission::all()->groupBy('module');
        return view('roles_permission.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'array'
        ]);

        $role = Role::create(['name' => $request->name,'guard_name'=>'web']);
        $role->permissions()->attach($request->permissions);

        return redirect()->route('roles_permission.index')->with('success', 'Role created successfully!');
    }

   


 

    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all()->groupBy('module');
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        return view('roles_permission.edit', compact('role', 'permissions', 'rolePermissions'));
    }


    // public function update(Request $request, $id)
    // {
    //     $role = Role::find($id);

    //     $request->validate([
    //         'name' => 'required|unique:roles,name,' . $role->id,
    //         'permissions' => 'required|array',
    //     ]);

    //     $role->update(['name' => $request->name]);
    //     $role->syncPermissions($request->permissions);

    //     return redirect()->route('roles_permission.index')->with('success', 'Role updated successfully.');
    // }
// public function update(Request $request, $id)
// {
//     $role = Role::findOrFail($id);

//     $request->validate([
//         'name' => 'required|unique:roles,name,' . $role->id,
//         // permissions can be nullable to avoid validation failure when none selected
//         'permissions' => 'nullable|array',
//     ]);

//     $role->update(['name' => $request->name]);

//     // ✅ Only sync if permission input exists, avoid wiping everything
//     if ($request->filled('permissions')) {
//         $permissions = Permission::findMany($request->permissions);
//         $role->syncPermissions($permissions);
//     }

//     return redirect()->route('roles_permission.index')->with('success', 'Role updated successfully.');
// }

public function update(Request $request, $id)
{
    $role = Role::findOrFail($id);

    $request->validate([
        'name' => 'required|unique:roles,name,' . $role->id,
        'permissions' => 'nullable|array',
    ]);

    $role->update(['name' => $request->name]);

    if ($request->filled('permissions')) {
        // ✅ Convert permission IDs to model collection before syncing
        $permissions = Permission::whereIn('id', $request->permissions)->get();
        $role->syncPermissions($permissions);
    }

    return redirect()->route('roles_permission.index')->with('success', 'Role updated successfully.');
}

public function destroy(Role $role)
{
    $role->delete();
    return back()->with('success', 'Role deleted.');
}
   
}
