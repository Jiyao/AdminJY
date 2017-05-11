<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
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
        return \Redirect::route('role.index');
    }
}
