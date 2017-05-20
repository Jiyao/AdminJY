<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::paginate(10);
        return view('role.index', compact('roles', $roles));
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(Request $request)
    {
        $role = new Role();
        $role->name = $request->input('name');
        $role->display_name = $request->input('display_name');
        $role->description = $request->input('description');
        $role->save();
        Flashy::success('新增成功!', '/role');
        $user = User::find(1);
        activity()->causedBy($user)->log('新增角色成功');
        return \Redirect::route('role.index');
    }

    public function perms($id)
    {
        $role = Role::find($id);
        $perms = Permission::get();
        $rolePerms = array_column($role->perms->toArray(), 'id');
        return view('role.perms', compact('role','perms','rolePerms'));
    }

    public function savePerms(Request $request)
    {
        $role = Role::find($request->input('role_id'));
        $perms = $request->input('perms');
        $role->savePermissions($perms);
        Flashy::success('保存成功', '/');
        return \Redirect::route('role.index');
    }
}
