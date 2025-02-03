<?php

namespace App\Http\Controllers;

use App\Http\Requests\SigninRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function getlogin(){
        return view('users.login');
    }

    public function getsignin(){
        return view('signin');
    }

    public function register(SigninRequest $request)
    {
        // Les données sont déjà validées à ce stade
        $validatedData = $request->validated();
        $validatedData['password'] = bcrypt($validatedData['password']);
        // Créer l'utilisateur
        User::create($validatedData);

        return redirect()->route('login')->with('success', 'Inscription réussie, veuillez vous connecter !');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Les informations fournies ne correspondent pas.',
        ]);
    }

}
