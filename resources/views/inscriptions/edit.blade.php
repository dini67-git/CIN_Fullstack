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
        <form action="{{ route('inscription.update', $inscription->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Champs pour nom, prénom, email, téléphone -->
            <input type="text" name="nom" value="{{ old('nom', $inscription->nom) }}" required>
            <input type="text" name="prenom" value="{{ old('prenom', $inscription->prenom) }}" required>
            <input type="email" name="email" value="{{ old('email', $inscription->email) }}" required>
            <input type="text" name="telephone" value="{{ old('telephone', $inscription->telephone) }}" required>

            <!-- Sélection de la formation -->
            <select name="formation_id" required>
                @foreach ($formations as $formation)
                <option value="{{ $formation->id }}" {{ $inscription->formation_id == $formation->id ? 'selected' : '' }}>
                    {{ $formation->titre }}
                </option>
                @endforeach
            </select>

            <button type="submit">Mettre à jour</button>
        </form>

    </div>
</div>

@endsection
