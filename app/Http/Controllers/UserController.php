<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Mail\ApprobationEmail;
use App\Http\Requests\SigninRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    // Middleware pour protéger certaines routes
    public function __construct()
    {

        $this->middleware('auth')->except([
            'loginForm',
            'login',
            'create', // Formulaire de création d'un élément (public)
            'store',  // Traitement de la création d'un élément (public)
        ]);

        $this->middleware('admin')->only([
            'index',   // Afficher la liste des éléments (admin)
            'edit',    // Afficher le formulaire d'édition d'un élément (admin)
            'update',  // Traiter la modification d'un élément (admin)
            'destroy'  // Supprimer un élément (admin)
        ]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::whereNotNull('approuvé')->get();
        $attentes = User::whereNull('approuvé')->get();
        return view('users.index', compact('users', 'attentes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('users.edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SigninRequest $request)
    {
        // Les données sont déjà validées à ce stade
        $validatedData = $request->validated();
        $validatedData['password'] = bcrypt($validatedData['password']);
        // Créer l'utilisateur
        User::create($validatedData);

        return redirect()->route('login')->with('success', 'Inscription réussie, veuillez vous connecter !');
    }

    public function approuver(User $user){
        try {
            $user->approuvé = now();
            $user->save();

            // Envoyer un email à l'utilisateur pour confirmer l'approbation
            Mail::to($user->email)->send(new ApprobationEmail($user));

            return redirect()->route('users.index')->with('success', 'Utilisateur approuvé et email envoyé.');

        } catch (\Exception $e) {
            // En cas d'erreur, redirigez avec un message d'erreur
            return redirect()->route('users.index')->with('error', 'Erreur lors de l\'envoi de l\'email : ' . $e->getMessage());
        }
    }

    // Affiche le formulaire de connexion
    public function loginForm()
    {
        return view('users.login'); // Vue pour la connexion
    }

    public function login(Request $request)
    {

        // Validation des données
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'remember' => 'nullable|boolean', // Validation pour "remember"
        ]);

        // Récupération des données
        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember'); // Conversion en booléen

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->intended('/')->with('success', 'Vous êtes connecté !');
        }
        return back()->withErrors([
            'email' => 'Les informations fournies ne correspondent pas.',
        ]);

        // Gestion de l'échec de l'authentification

    }

    // Gère la déconnexion de l'utilisateur
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Vous êtes déconnecté.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $user = User::findOrFail($id); // Récupère l'utilisateur par son ID ou renvoie une erreur 404 s'il n'existe pas

        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'firstname' => 'required|string|max:40',
            'lastname' => 'required|string|max:40',
            'email' => 'required|email|unique:users,email,{$user-id}',
            'password' => 'nullable|string|min:8|confirmed',
            'sexe' => 'required|in:Masculin,Feminin',
            'filiere' => 'required',
            'birthday' => 'required|date',
            'telephone' => 'required|string|min:8|max:15|unique:users,telephone',
        ]);

        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect()->route('users.index')->with('success', "L'utilisateur a été mis à jour.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();

        return redirect()->route('users.index')->with('success', "L'utilisateur a été supprimé.");
    }
}
