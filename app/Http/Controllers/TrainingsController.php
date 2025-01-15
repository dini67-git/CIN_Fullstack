<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TrainingsController extends Controller
{
    public function gettrainings(){
        return view('dash.trainings');
    }
}
