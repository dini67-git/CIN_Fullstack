@extends('baseadm')

@section('titre', 'Editer une formation')

@section('content')

<div class="col-md-12">
    <div class="page-header-toolbar d-flex flex-column">
        <div class="sort-wrapper">
            <!-- Lien pour créer un nouvel article : "posts.create" -->
            <a class="btn btn-primary toolbar-item" href="{{ route('formations.create') }}" title="Créer une formation"> New </a>
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

        <div>
            <h1>{{ isset($formation) ? 'Modifier la Formation' : 'Créer une Nouvelle Formation' }}</h1>

            <!-- Formulaire -->
            <form action="{{ isset($formation) ? route('formations.update', $formation) : route('formations.store') }}"
                method="POST"
                enctype="multipart/form-data">
                @csrf
                @if (isset($formation))
                @method('PUT') <!-- Méthode PUT pour la mise à jour -->
                @endif

                <div class="mb-3">
                    <label for="titre" class="form-label">Titre :</label>
                    <input type="text" name="titre" id="titre" class="form-control" required
                        value="{{ old('titre', $formation->titre ?? '') }}">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description :</label>
                    <textarea name="description" id="description" class="form-control" rows="4" required>{{ old('description', $formation->description ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="prix" class="form-label">Prix (€) :</label>
                    <input type="number" name="prix" id="prix" class="form-control" step="0.01" required
                        value="{{ old('prix', $formation->prix ?? '') }}">
                </div>

                <div class="mb-3">
                    <label for="date_debut" class="form-label">Date de Début :</label>
                    <input type="date" name="date_debut" id="date_debut" class="form-control" required
                        value="{{ old('date_debut', $formation->date_debut ?? '') }}">
                </div>

                <div class="mb-3">
                    <label for="date_fin" class="form-label">Date de Fin :</label>
                    <input type="date" name="date_fin" id="date_fin" class="form-control" required
                        value="{{ old('date_fin', $formation->date_fin ?? '') }}">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image :</label>
                    <input type="file" name="image" id="image" class="form-control">
                    @if (isset($formation) && $formation->image)
                    <small>Image actuelle :</small>
                    <img src="{{ asset('storage/' . $formation->image) }}" alt="{{ $formation->titre }}" style="width: 100px; height: auto;">
                    @endif
                </div>

                <!-- Bouton d'envoi -->
                <button type="submit" class="btn btn-success">{{ isset($formation) ? 'Mettre à Jour' : 'Valider' }}</button>
            </form>

        </div>


</div>

@endsection
