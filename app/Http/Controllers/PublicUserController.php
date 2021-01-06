<?php

namespace App\Http\Controllers;

use App\Http\Controllers\LinksController;
use Illuminate\Http\Request;

class PublicUserController extends Controller
{
    public function __invoke($username){
        $user = LinksController::getByUsername($username);
        return view('pages.public.user.index',  ['user' => $user]);
    }
}
