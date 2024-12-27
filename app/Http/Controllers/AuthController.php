<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function getlogin(){
        return view('login');
    }

    public function getsignin(){
        return view('signin');
    }
}
