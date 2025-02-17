@extends('baseadm')

@section('title', 'Users')

@section('content')

<div class="col-md-12">
    <div class="page-header-toolbar">
        <div class="sort-wrapper">
            <a href="{{ route('users.create') }}" class="btn btn-primary toolbar-item">Nouvel Utilisateur</a>
            <div class="dropdown ml-lg-auto ml-3 toolbar-item">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownexport" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Exporter</button>
                <div class="dropdown-menu" aria-labelledby="dropdownexport">
                    <a class="dropdown-item" href="#">Exporter en PDF</a>
                    <a class="dropdown-item" href="#">Exporter en DOCX</a>
                    <a class="dropdown-item" href="#">Exporter en CDR</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12 my-3 stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Membres Approuvés</h4>
            <p class="card-description">Liste des utilisateurs approuvés.</p>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Sexe</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->firstname }}</td>
                            <td>{{ $user->lastname }}</td>
                            <td>{{ $user->sexe }}</td>
                            <td>{{ $user->telephone }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary btn-sm">Voir</a>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success btn-sm">Modifier</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($users->isEmpty())
            <div class="alert alert-warning mt-3">Aucun membre approuvé trouvé.</div>
            @endif
        </div>
    </div>
</div>

<div class="col-lg-12 my-3 stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">En Attente d'Approbation</h4>
            <p class="card-description">Liste des utilisateurs en attente d'approbation.</p>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Sexe</th>
                            <th>Téléphone</th>
                            <th>Email</th>
                            <th>Rôle</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($attentes as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->firstname }}</td>
                            <td>{{ $user->lastname }}</td>
                            <td>{{ $user->sexe }}</td>
                            <td>{{ $user->telephone }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary btn-sm">Voir</a>
                                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-success btn-sm">Modifier</a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</button>

                                </form>
                                <form action="{{ route('users.approuver', $user) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('GET')
                                    <button type="submit" class="btn btn-success btn-sm">Approuver</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($attentes->isEmpty())
            <div class="alert alert-warning mt-3">Aucun utilisateur en attente d'approbation.</div>
            @endif
        </div>
    </div>
</div>

@endsection
