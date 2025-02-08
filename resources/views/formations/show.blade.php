@extends('base')

@section('title', $formation->titre)

@section('content')
<div class="container mt-3">
    <!-- Section Image -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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
        <p class="text-center" style="color:orangered"><strong>Prix : {{ number_format($formation->prix, 2) }} Fcfa </strong></p>
    </div>

    <!-- Section Description -->
    <div class="card shadow-sm rounded mb-2">
        <h2 class="p-2" style="color:chocolate; background:silver; width:fit-content;">Description</h2>
        <p class="m-3">{{ $formation->description }}</p>
    </div>

    <!-- Section Actions -->
    <div class="shadow-sm rounded p-4 text-center">
        <a href="{{ route('formations.inscription.create', $formation) }}" class="btn btn-success btn-lg mx-2" >S'inscrire</a>
        <button class="btn btn-info btn-lg mx-2">Envoyer un mail</button>
    </div>

    <!-- Bouton Retour -->
    @if(Auth::user()->isAdmin())
    <div class="text-center my-3">
        <a href="{{ route('formations.index') }}" class="btn btn-secondary">Retour à la liste des formations</a>
    </div>
    @endif
</div>
@endsection
