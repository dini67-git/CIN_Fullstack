<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Formation;
use App\Models\Inscription;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Formation $formation)
    {
        //
        return view('inscriptions.create', compact('formation'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Formation $formation)
    {
        //
         $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:15',
         ]);

         // Vérification si l'utilisateur est un membre existant par email et téléphone.
        $membre = User::where('email', $request->email)
        ->where('firstname', $request->nom)
        ->where('lastname', $request->prenom)
        ->first();

        // Calcul du montant payé (60% pour membres, sinon 100%).
        $montant = ($membre) ? ($formation->prix * 0.6) : $formation->prix;

        // Enregistrement de l'inscription avec statut 'pending'.
        Inscription::create([
            'formation_id' => $formation->id,
            'nom' => ($membre) ? $membre->firstname : $request->nom, // Utilisez le nom du membre s'il existe.
            'prenom' => ($membre) ? $membre->lastname : $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            'montant' => $montant,
            'status' => 'pending',
        ]);

        return redirect()->route('formations.show', $formation)->with('success', "Inscription réussie !");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
