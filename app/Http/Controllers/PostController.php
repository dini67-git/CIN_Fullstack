<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('index', Post::class);
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
        $this ->authorize('create', Post::class);
        return view('posts.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create', Post::class);
        // 1. La validation
        $this->validate($request, [
            'title' => 'bail|required|string|max:255',
            'picture' => 'bail|required|image|max:1024',
            'content' => 'bail|required',
        ]);

        // 2. On upload l'image dans "/storage/app/public/posts"
        $chemin_image = $request->picture->store('posts', 'public');

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
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        //
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);
        // 1. La validation

        // Les règles de validation pour "title" et "content"
        $rules = [
            'title' => 'bail|required|string|max:255',
            'content' => 'bail|required',
        ];

        // Si une nouvelle image est envoyéé
        if($request->has('picture')){
            // On ajoute la règle de validation pour "picture"
            $rules['picture'] = 'bail|required|image|max:1024';
        }

        $this->validate($request, $rules);

        // 2. On upload l'image dans "/storage/app/public/posts"
        if($request->has('picture')){

            // On supprime l'ancienne image
            Storage::delete('public/posts/'.$post->picture);

            $chemin_image = $request->picture->store('posts', 'public');
        }

        // 3. On met à jour les informations du Post
        $post->update([
            'title' => $request->title,
            'picture' => isset($chemin_image) ? $chemin_image : $post->picture,
            'content' => $request->content
        ]);

        // 4. On affiche le Post modifié : route('posts.show')
        return redirect(route('posts.show', $post));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        // On supprime l'image existant
        Storage::delete('public/posts/'.$post->picture);

        // on supprime les informations du $post de la table "posts"
        $post->delete();

        // Redirection route('posts.index')
        return redirect(route('posts.index'));
    }
}
