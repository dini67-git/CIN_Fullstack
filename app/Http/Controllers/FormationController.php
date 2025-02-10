<?php

namespace App\Http\Controllers;

use App\Models\Formation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('index',Formation::class,);
        //
        $formations = Formation::all();
        return view('formations.index', compact('formations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Formation::class);
        return view('formations.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->authorize('create',Formation::class );
        //
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'prix' => 'required|numeric|min:0',
            'date_debut' => 'required|date',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'image' => 'required|image|max:1024'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/formations', 'public');
        } else {
            $imagePath = null; // Pas d'image fournie.
        }

        Formation::create([
            'titre' => $request->titre,
            'description' => $request->description,
            'prix' => $request->prix,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'image' => $imagePath,
        ]);

        return redirect()->route('formations.index')->with('success', "Formation créée avec succès !");
    }

    /**
     * Display the specified resource.
     */
    public function show(Formation $formation)
    {
        //
        return view('formations.show', compact('formation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Formation $formation)
    {
        $this->authorize('update', $formation);
        //
        return view('formations.edit', compact('formation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Formation $formation)
    {
        $this->authorize('update', $formation);
        // 1. La validation des données
        $rules = [
            'titre' => 'bail|required|string|max:255',
            'description' => 'bail|required|string',
            'prix' => 'bail|required|numeric',
            'date_debut' => 'bail|required|date',
            'date_fin' => 'bail|required|date|after_or_equal:date_debut', // Assurez-vous que la date de fin est après la date de début
        ];

        // Si une nouvelle image est envoyée
        if ($request->hasFile('image')) {
            // On ajoute la règle de validation pour "image"
            $rules['image'] = 'required|image|max:1024'; // Image facultative
        }

        // Validation des données selon les règles définies
        $this->validate($request, $rules);

        // 2. Gestion de l'image si une nouvelle image est fournie
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($formation->image) {
                Storage::delete('public/' . $formation->image);
            }

            // Enregistrer la nouvelle image
            $chemin_image = $request->image->store('formations', 'public');
        }

        // 3. Mise à jour des informations de la formation
        $formation->update([
            'titre' => $request->titre,
            'description' => $request->description,
            'prix' => $request->prix,
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'image' => isset($chemin_image) ? $chemin_image : $formation->image, // Utiliser l'image mise à jour ou garder l'existante
        ]);

        // 4. Redirection vers la liste des formations ou vers la formation mise à jour avec un message de succès
        return redirect(route('formations.index'))->with('success', 'Formation mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Formation $formation)
    {
        $this->authorize('delete', $formation);
        //
        if ($formation->image) {
            Storage::delete('public/' . $formation->image);
        }

        $formation->delete();

        return redirect(route('formations.index'))->with('success', 'Formation supprimée avec succès.');
    }
}
