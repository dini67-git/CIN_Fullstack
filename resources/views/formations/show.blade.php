@extends('base')

@section('title', $formation->titre)

@section('content')
<div class="container mt-3">
    <!-- Section Image -->
    <div class="card shadow-sm rounded mb-2">
        @if ($formation->image)
            <!-- Ajout des attributs width et height pour redimensionner l'image -->
            <img src="{{ asset('storage/' . $formation->image) }}" alt="{{ $formation->titre }}" width="100%" height="400">
        @else
            <div class="no-image text-center py-5">Pas d'image disponible</div>
        @endif
    </div>

    <!-- Section Titre et Détails -->
    <div class="card shadow-sm rounded p-4 mb-2">
        <h1 class="text-center text-primary">{{ $formation->titre }}</h1>
        <p class="text-muted text-center">{{ \Carbon\Carbon::parse($formation->date_debut)->format('d/m/Y') }} - {{ \Carbon\Carbon::parse($formation->date_fin)->format('d/m/Y') }}</p>
        <p class="text-center"><strong>Prix :</strong> {{ number_format($formation->prix, 2) }} €</p>
    </div>

    <!-- Section Description -->
    <div class="card shadow-sm rounded p-4 mb-2">
        <h2>Description</h2>
        <p>{{ $formation->description }}</p>
    </div>

    <!-- Section Actions -->
    <div class="card shadow-sm rounded p-4 text-center">
        <a href="{{ route('formations.inscription.create', $formation) }}" class="btn btn-success btn-lg mx-2">S'inscrire</a>
        <button class="btn btn-info btn-lg mx-2">Envoyer un mail</button>
    </div>

    <!-- Bouton Retour -->
    <div class="text-center mt-3">
        <a href="{{ route('formations.index') }}" class="btn btn-secondary">Retour à la liste des formations</a>
    </div>
</div>
@endsection
