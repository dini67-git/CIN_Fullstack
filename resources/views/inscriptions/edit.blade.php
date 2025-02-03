@extends('baseadm')

@section('title', 'Modifier l\'Inscription')

@section('content')

<div class="col-md-12">
    <div>
        <h4 class="card-title">Modifier l'Inscription</h4>

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Formulaire d'édition -->
        <form method="POST" action="{{ route('inscription.update', $inscription->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" class="form-control" value="{{ old('nom', $inscription->nom) }}" required>
            </div>

            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" id="prenom" class="form-control" value="{{ old('prenom', $inscription->prenom) }}" required>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $inscription->email) }}" required>
            </div>

            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" name="telephone" id="telephone" class="form-control" value="{{ old('telephone', $inscription->telephone) }}" required>
            </div>

            <!-- Ajoutez d'autres champs si nécessaire -->

            <button type="submit" class="btn btn-primary">Mettre à jour</button>
            <a href="{{ route('inscription.index') }}" class="btn btn-secondary">Annuler</a> <!-- Lien pour annuler -->
        </form>
    </div>
</div>

@endsection
