@extends('base')

@section('title', 'Inscription')

@section('content')

<div class="container mt-5 bg-white">
    <h1 class="p-3 text-center text-info bg-dark" >Inscrivez-vous à {{ $formation->titre }}</h1> <!-- Assurez-vous que c'est bien $formation->titre -->

    @if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="form-control d-flex flex-grow-1 flex-column w-50" action="{{ route('formations.inscription.store', $formation) }}" method="POST">
        @csrf

        <input type="hidden" name="admin_inscription" value="{{ Auth::check() && Auth::user()->isAdmin() ? '1' : '0' }}">

        <label  for="nom">Nom :</label>
        <input class="" type="text" name="nom" id="nom" required>

        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" required>

        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>

        <label for="telephone">Téléphone :</label>
        <input type="text" name="telephone" id="telephone" required>

        <button class="btn btn-primary mt-3" type="submit">S'inscrire</button>
    </form>

    <!-- Bouton Retour -->
    <div class="mt-3">
        <a class="btn btn-secondary m-2" href="{{ route('formations.show', $formation) }}">Retour à la formation</a>
    </div>
</div>

@endsection
