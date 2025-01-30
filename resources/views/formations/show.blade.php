@extends('base')

@section('title', '$formation->title')

@section('content')
<div class="container">
    <h1>Détails de la Formation : {{ $formation->titre }}</h1>

    <!-- Détails de la formation -->
    @if ($formation->image)
        <p><strong>Image :</strong></p>
        <img src="{{ asset('storage/' . $formation->image) }}" alt="{{ $formation->titre }}" style="width: 300px; height: auto;">
    @else
        Pas d'image disponible.
    @endif

    <p><strong>Prix :</strong> {{ number_format($formation->prix, 2) }} €</p>
    <p><strong>Date de Début :</strong> {{ $formation->date_debut }}</p>
    <p><strong>Date de Fin :</strong> {{ $formation->date_fin }}</p>
    <p><strong>Description :</strong> {{ $formation->description }}</p>




    <!-- Retour -->
    <a href="{{ route('formations.index') }}" class="btn btn-secondary mt-3">Retour à la Liste des Formations</a>
</div>
@endsection
