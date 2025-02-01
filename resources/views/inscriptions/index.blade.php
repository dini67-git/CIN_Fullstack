@extends('baseadm')

@section('title', 'Liste des Inscriptions')

@section('content')

<div class="col-md-12">
    <div>
        <div class="sort-wrapper">
            <!-- Lien pour créer un nouvel article : "posts.create" -->
            <a class="btn btn-primary toolbar-item" href="{{ route('inscription.create') }}" title="Faire une inscription"> New </a>
            <div class="dropdown ml-lg-auto ml-3 toolbar-item">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownexport" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</button>
                <div class="dropdown-menu" aria-labelledby="dropdownexport">
                    <a class="dropdown-item" href="#">Export as PDF</a>
                    <a class="dropdown-item" href="#">Export as DOCX</a>
                    <a class="dropdown-item" href="#">Export as CDR</a>
                </div>
            </div>
        </div>

        </br>
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Liste des Inscriptions par Formation</h4>

                    <!-- Formulaire de recherche -->
                    <form method="GET" action="{{ route('inscription.index') }}">
                        <div class="input-group mb-3">
                            <input type="text" name="search" class="form-control" placeholder="Rechercher par nom, prénom ou email" value="{{ request()->input('search') }}">
                            <button class="btn btn-primary" type="submit">Rechercher</button>
                        </div>
                    </form>

                    @foreach ($formations as $formation)
                    <h5>{{ $formation->titre }}</h5> <!-- Titre de la formation -->
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                                <th>Montant</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($formation->inscriptions->isEmpty())
                            <!-- Si aucune inscription pour cette formation -->
                            <tr>
                                <td colspan="7">Aucune inscription pour cette formation.</td>
                            </tr>
                            @else
                            @foreach ($formation->inscriptions as $inscription)
                            <!-- Afficher chaque inscription -->
                            <tr>
                                <td>{{ $inscription->id }}</td>
                                <td>{{ $inscription->nom }}</td>
                                <td>{{ $inscription->prenom }}</td>
                                <td>{{ $inscription->email }}</td>
                                <td>{{ $inscription->telephone }}</td>
                                <td>{{ number_format($inscription->montant, 2) }} €</td> <!-- Formatage du montant -->
                                <td>{{ $inscription->status }}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>

                    <!-- Séparation entre les formations -->
                    <hr />
                    @endforeach

                    <!-- Pagination des formations -->
                    {{ $formations->links() }}
                </div>

            </div>
        </div>

    </div>
</div>

@endsection
