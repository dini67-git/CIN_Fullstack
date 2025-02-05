@extends('base')

@section('title', 'Profil Utilisateur')

@section('content')

<div class="container mt-4">
    <h2>Bienvenue, {{ $user->firstname }} {{ $user->lastname }}</h2>

    <!-- Bouton pour afficher le popover -->
    <button type="button" class="btn btn-primary" id="profilePopover" data-bs-toggle="popover" title="Profil Utilisateur" data-bs-html="true">
        Voir le Profil
    </button>

    <!-- Retour à la liste des utilisateurs -->
    <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Retour à la liste</a>
</div>

@endsection

@section('scripts')
<script>
    // Initialisation du popover
    document.addEventListener('DOMContentLoaded', function () {
        var profilePopover = document.getElementById('profilePopover');

        // Définir dynamiquement le contenu du popover
        var popoverContent = `
            <strong>Nom :</strong> {{ $user->firstname }}<br>
            <strong>Prénom :</strong> {{ $user->lastname }}<br>
            <strong>Sexe :</strong> {{ $user->sexe }}<br>
            <strong>Date de naissance :</strong> {{ \Carbon\Carbon::parse($user->birthday)->format('d/m/Y') }}<br>
            <strong>Téléphone :</strong> {{ $user->telephone }}<br>
            <strong>Email :</strong> {{ $user->email }}<br>
            <strong>Filière :</strong> {{ $user->filiere }}<br>
            <strong>Rôle :</strong> {{ ucfirst($user->role) }}<br>
            @if(Auth::id() === $user->id)
                <a href='{{ route("users.edit", $user->id) }}' class='btn btn-warning btn-sm mt-2'>Modifier mes informations</a><br>
            @endif
            @if(Auth::user()->isAdmin() && Auth::id() !== $user->id)
                <a href='{{ route("users.edit", $user->id) }}' class='btn btn-warning btn-sm mt-2'>Modifier</a><br>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm mt-2" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</button>
                </form>
            @endif
        `;

        // Initialiser le popover avec le contenu HTML
        new bootstrap.Popover(profilePopover, {
            content: popoverContent,
            html: true,
            trigger: 'click', // Affiche le popover au clic
            placement: 'right' // Positionne le popover à droite du bouton
        });
    });
</script>
@endsection
