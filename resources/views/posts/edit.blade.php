@extends('baseadm')

@section('title', 'Créer un post')

@section('content')

<div class="col-md-12">
    <div class="page-header-toolbar">
        <div class="sort-wrapper">
            <!-- Lien pour créer un nouvel article : "posts.create" -->
            <a class="btn btn-primary toolbar-item" href="{{ route('posts.create') }}" title="Créer un article"> New </a>
            <div class="dropdown ml-lg-auto ml-3 toolbar-item">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownexport" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export</button>
                <div class="dropdown-menu" aria-labelledby="dropdownexport">
                    <a class="dropdown-item" href="#">Export as PDF</a>
                    <a class="dropdown-item" href="#">Export as DOCX</a>
                    <a class="dropdown-item" href="#">Export as CDR</a>
                </div>
            </div>
        </div>

        <h1>Créer un post</h1>

        <!-- Le formulaire est géré par la route "posts.store" -->
        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">

            <!-- Le token CSRF -->
            @csrf

            <p>
                <label for="title">Titre</label><br />
                <input type="text" name="title" value="{{ old('title') }}" id="title" placeholder="Le titre du post">

                <!-- Le message d'erreur pour "title" -->
                @error("title")
            <div>{{ $message }}</div>
            @enderror
            </p>
            <p>
                <label for="picture">Couverture</label><br />
                <input type="file" name="picture" id="picture">

                <!-- Le message d'erreur pour "picture" -->
                @error("picture")
            <div>{{ $message }}</div>
            @enderror
            </p>
            <p>
                <label for="content">Contenu</label><br />
                <textarea name="content" id="content" lang="fr" rows="10" cols="50" placeholder="Le contenu du post">{{ old('content') }}</textarea>

                <!-- Le message d'erreur pour "content" -->
                @error("content")
            <div>{{ $message }}</div>
            @enderror
            </p>

            <input type="submit" name="valider" value="Valider">

        </form>


    </div>
</div>

@endsection
