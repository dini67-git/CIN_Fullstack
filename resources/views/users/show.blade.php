@extends('baseadm')

@section('title', 'Profil Utilisateur')

@section('content')

<div class="container mt-4">
    <h2>Profil de {{ $user->firstname }} {{ $user->lastname }}</h2>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Informations Personnelles</h5>
            <p><strong>Nom :</strong> {{ $user->firstname }}</p>
            <p><strong>Prénom :</strong> {{ $user->lastname }}</p>
            <p><strong>Sexe :</strong> {{ $user->sexe }}</p>
            <p><strong>Date de naissance :</strong> {{ \Carbon\Carbon::parse($user->birthday)->format('d/m/Y') }}</p>
            <p><strong>Téléphone :</strong> {{ $user->telephone }}</p>
            <p><strong>Email :</strong> {{ $user->email }}</p>
            <p><strong>Filière :</strong> {{ $user->filiere }}</p>
            <p><strong>Rôle :</strong> {{ ucfirst($user->role) }}</p>

            <h5 class="mt-4">Actions</h5>

            <!-- Si l'utilisateur connecté est le même que celui affiché -->
            @if(Auth::id() === $user->id)
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Modifier mes informations</a>
            @endif

            <!-- Si l'utilisateur connecté est un administrateur -->
            @if(Auth::user()->isAdmin())
                <!-- Modifier un autre utilisateur -->
                @if(Auth::id() !== $user->id)
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">Modifier</a>

                    <!-- Supprimer un utilisateur (sauf soi-même) -->
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</button>
                    </form>
                @endif
            @endif

            <!-- Retour à la liste des utilisateurs -->
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Retour à la liste</a>
        </div>
    </div>
</div>

@endsection
