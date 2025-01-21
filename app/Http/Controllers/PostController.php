<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //On recupère tous les Post
        $posts = Post::latest()->get();

        // On transmet les Post à la vue
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // On retourne la vue "/resources/views/posts/edit.blade.php"
        return view('posts.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. La validation
        $this->validate($request, [
            'title' => 'bail|required|string|max:255',
            'picture' => 'bail|required|image|max:1024',
            'content' => 'bail|required',
        ]);

        // 2. On upload l'image dans "/storage/app/public/posts"
        $chemin_image = $request->picture->store('posts');

        // 3. On enregistre les informations du Post
        Post::create([
            'title' => $request->title,
            'picture' => $chemin_image,
            'content' => $request->content,
        ]);

        // 4. On retourne vers tous les posts : route('posts.index')
        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
}
