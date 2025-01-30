@extends('layouts.app')

@section('content')
<h1>Inscription à la formation : {{ $formation->titre }}</h1>

<form action="{{ route('inscriptions.store', $formation) }}" method="POST">
    @csrf

    <div>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required>
    </div>
    
    <div>
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" required>
    </div>

    <div>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>
    </div>

    <div>
        <label for="telephone">Numéro de téléphone :</label>
        <input type="text" name="telephone" id="telephone" required>
    </div>

    <button type="submit">S'inscrire</button>
</form>
@endsection
