@extends('base')

@section('title', 'Login')

@section('content')
<div class="container" style="place-items: center;">
    <div class="login col-lg-4 mt-5">
        <i class="bi bi-person-circle" style="font-size: 4rem; color:cornflowerblue"></i>
        <h2>Connexion</h2>
        <form id="loginForm">
            <div class="form-group">
                <label for="email">Adresse email</label>
                <input type="email" class="form-control" id="email" placeholder="Entrez votre email" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" placeholder="Entrez votre mot de passe" required>
            </div>
            <button type="submit" class="btn btn-primary m-3">Se connecter</button>
        </form>
    </div>
    <div class=" d-flex m-3">
        <span>Si vous n'avez pas de compte, veuillez s'inscrire ici s'il vous plait !
            <i class="bi bi-forward-fill" style="font-size: 1rem; color: black;"></i>
            <a href=" {{ route('signin')}}" class="login-button">S'inscrire</a>
        </span>
    </div>
</div>
@endsection
