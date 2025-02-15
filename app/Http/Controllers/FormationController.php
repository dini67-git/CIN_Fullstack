<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Formation;
use App\Models\Inscription;
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
        $this->authorize('create',arguments: Formation::class );
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
    public function update(Request $request, string $id)
    {
        // Récupérer l'inscription à modifier
    $inscription = Inscription::findOrFail($id);

    // Vérifier les autorisations
    $this->authorize('update', $inscription);

    // Valider les données envoyées par le formulaire
    $validatedData = $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'telephone' => 'required|string|max:15',
        'formation_id' => 'required|exists:formations,id', // Vérifie que la formation existe
    ]);

    // Récupérer la formation associée (nouvelle ou existante)
    $formation = Formation::findOrFail($validatedData['formation_id']);

    // Vérifier si l'utilisateur est un membre existant par email
    $membre = User::where('email', $validatedData['email'])->first();

    // Calculer le montant en fonction du statut de membre
    $montant = ($membre) ? ($formation->prix * 0.6) : $formation->prix;

    // Mettre à jour les informations de l'inscription
    $inscription->update([
        'nom' => $validatedData['nom'],
        'prenom' => $validatedData['prenom'],
        'email' => $validatedData['email'],
        'telephone' => $validatedData['telephone'],
        'formation_id' => $validatedData['formation_id'], // Mettre à jour si la formation a changé
        'montant' => $montant, // Recalculer le montant
    ]);

    // Rediriger avec un message de succès
    return redirect()->route('inscriptions.index')->with('success', "Inscription mise à jour avec succès !");
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
