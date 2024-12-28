@extends('base')

@section('title', 'signin')

@section('content')
<div class="container" style="place-items: center;">
    <div class="register col-lg-4 mt-5">
        <i class="bi bi-person-circle" style="font-size: 4rem; color:cornflowerblue"></i>
        <h2>Registration</h2>
        <form id="registerForm">
            <div class="form-group">
                <label for="name">Nom</label>
                <input type="text" class="form-control" id="name" placeholder="Entrez votre nom" required>
            </div>
            <div class="form-group">
                <label for="lastName">Prénom</label>
                <input type="text" class="form-control" id="lastName" placeholder="Entrez votre prénom" required>
            </div>
            <div class="form-group">
                <label for="email">Adresse email</label>
                <input type="email" class="form-control" id="email" placeholder="Entrez votre email" required>
            </div>
            <div class="form-group">
                <label for="sector">Filière</label>
                <input type="text" class="form-control" id="sector" placeholder="Entrez votre filière" required>
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" placeholder="Entrez votre mot de passe" required>
            </div>
            <div class="form-group">
                <label for="confPassword">Confirmez votre mot de passe</label>
                <input type="password" class="form-control" id="confPassword" placeholder="Confirmez votre mot de passe" required>
            </div>
            <button type="submit" class="btn btn-primary m-3">S'inscrire</button>
        </form>
    </div>
    <div class="d-flex m-3">
        <span>Avez-vous déjà un compte ? Veuillez-vous connecter ici s'il vous plaît !</span>
        <i class="bi bi-forward-fill" style="font-size: 1rem; color: black;"></i>
        <a href=" {{ route('login')}}" class="login-button">Se connecter</a>
    </div>
</div>
@endsection
