<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleController extends Controller
{
    public function index()
    {
        $users = User::all();
        $roles = Role::all();
        return view('roles.index', compact('users', 'roles',));
    }

    public function show(){
        $roles = Role::all();
        $permissions = Permission::all();
        return view('roles.assign', compact('roles', 'permissions'));
    }
    public function assignRole(Request $request)
    {
        $user = User::find($request->user_id);
        $user->syncRoles($request->role);
        return redirect()->back()->with('message', 'Role assigned successfully!');
    }

    public function assignPermission(Request $request)
    {
        $role = Role::find($request->role_id);
        $role->syncPermissions($request->permissions);
        return redirect()->back()->with('message', 'Permissions assigned successfully!');
    }
}

