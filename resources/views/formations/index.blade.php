@extends('baseadm')

@section('title', 'Toutes les formations')

@section('content')

<div class="col-md-12">
    <div>
        <div class="sort-wrapper">
            <!-- Lien pour créer un nouvel article : "posts.create" -->
            <a class="btn btn-primary toolbar-item" href="{{ route('formations.create') }}" title="Créer un article"> New </a>
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

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Toutes les formations</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Titre</th>
                                    <th>Prix</th>
                                    <th>Date de Début</th>
                                    <th>Date de Fin</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($formations as $formation)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $formation->titre }}</td>
                                    <td>{{ number_format($formation->prix, 2) }} €</td>
                                    <td>{{ $formation->date_debut }}</td>
                                    <td>{{ $formation->date_fin }}</td>
                                    <td>
                                        <a href="{{ route('formations.show', parameters: $formation) }}" class="btn btn-primary btn-sm">Voir</a>
                                        <a href="{{ route('formations.edit', $formation) }}" class="btn btn-success btn-sm">Modifier</a>

                                        <!-- Formulaire de suppression -->
                                        <form action="{{ route('formations.destroy', $formation) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette formation ?')">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
