<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function getblog(){
        return view('blog');
    }

    public function index()
    {
        // Récupérer tous les posts triés par date de création
        $posts = Post::orderBy('created_at', 'desc')->get();

        // Retourner la vue avec les posts
        return view('blog', compact('posts'));
    }
}
