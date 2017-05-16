<?php

namespace App\Http\Controllers;

use MercurySeries\Flashy\Flashy;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function logout()
    {
        \Auth::logout();
        Flashy::success('退出系统!');
        return \Redirect::route('login');
    }
}
