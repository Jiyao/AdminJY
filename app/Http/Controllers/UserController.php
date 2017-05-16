<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class UserController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::with('roles')->paginate(10);
        return view('user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($request->input('role_id'));
        Flashy::success('新增成功!', \URL::route('user.index'));
        activity()->causedBy(\Auth::user())->log('新增账户成功');
        return \Redirect::route('user.index');
    }
}
