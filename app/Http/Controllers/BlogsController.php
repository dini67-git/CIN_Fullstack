<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogsController extends Controller
{
    public function getblogs(){
        return view('dash.blogs');
    }
}
