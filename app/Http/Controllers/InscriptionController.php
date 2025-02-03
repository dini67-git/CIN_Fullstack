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
    public function index(Request $request)
    {

        // Récupérer le terme de recherche depuis la requête
        $searchTerm = $request->input('search');

        // Récupérer les formations avec leurs inscriptions associées
        $formations = Formation::with(['inscriptions' => function ($query) use ($searchTerm) {
            if ($searchTerm) {
                // Appliquer un filtre si un terme de recherche est fourni
                $query->where('nom', 'like', "%{$searchTerm}%")
                    ->orWhere('prenom', 'like', "%{$searchTerm}%")
                    ->orWhere('email', 'like', "%{$searchTerm}%");
            }
        }])
            ->paginate(10); // Paginer les formations (5 formations par page)

        // Retourner la vue avec les formations et le terme de recherche
        return view('inscriptions.index', compact('formations', 'searchTerm'));
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

        // Vérification si l'utilisateur est un membre existant par email.
        $membre = User::where('email', $request->email)
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
            'status' => 'Non payé',
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
        //Récuperer l'inscription par son ID
        $inscription = Inscription::findOrFail($id);

        // Retourner la vue avec l'inscription à modifier
        return view('inscriptions.edit', compact('inscription'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validation des données du formulaire
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:15',
            // Ajoutez d'autres règles de validation si nécessaire
        ]);

        // Récupérer l'inscription par son ID
        $inscription = Inscription::findOrFail($id);

        // Mettre à jour les informations de l'inscription
        $inscription->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
            // Ajoutez d'autres champs à mettre à jour si nécessaire
        ]);

        return redirect()->route('inscription.index')->with('success', "Inscription mise à jour avec succès !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $inscription = Inscription::findOrFail($id);

        $inscription->delete();

        return redirect()->route('inscription.index')->with('success', "Inscription supprimée avec succès !");
    }
}
