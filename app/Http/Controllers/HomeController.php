<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = LinksController::getByUsername(Auth::user()->username);
        return view('home', ["user" => $user]);
    }

    public function manageLinks()
    {
        $user = LinksController::getByUsername(Auth::user()->username);
        return view('pages.private.user.manageLink', ["user" => $user]);
    }
}
