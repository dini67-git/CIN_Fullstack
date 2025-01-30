<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function gettraining(){
        return view('training');
    }

    public function index()
    {
        // Récupérer tous les posts triés par date de création
        $formations = Formation::orderBy('created_at', 'desc')->get();

        // Retourner la vue avec les posts
        return view('training', compact('formations'));
    }
}
