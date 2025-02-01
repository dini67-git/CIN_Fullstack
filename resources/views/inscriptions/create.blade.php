@extends('base')

@section('title', 'Inscription')

@section('content')

<div class="container mt-5">
    <h1>Inscrivez-vous à {{ $formation->titre }}</h1> <!-- Assurez-vous que c'est bien $formation->titre -->

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('formations.inscription.store', $formation) }}" method="POST">
        @csrf
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required>

        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" required>

        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>

        <label for="telephone">Téléphone :</label>
        <input type="text" name="telephone" id="telephone" required>

        <button type="submit">S'inscrire</button>
    </form>

    <!-- Bouton Retour -->
    <div class="mt-3">
        <a href="{{ route('formations.show', $formation) }}">Retour à la formation</a>
    </div>
</div>

@endsection
