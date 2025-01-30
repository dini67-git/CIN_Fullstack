@extends('baseadm')

@section('title', 'Editer un post')

@section('content')

<div class="col-md-12">
    <div class="page-header-toolbar d-flex flex-column">
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

        </br>

        <div>
            <h1>Editer un post</h1>

            <!-- Si nous avons un Post $post -->
            @if (isset($post))

            <!-- Le formulaire est géré par la route "posts.update" -->
            <form method="POST" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">

                <!-- <input type="hidden" name="_method" value="PUT"> -->
                @method('PUT')

                @else

                <!-- Le formulaire est géré par la route "posts.store" -->
                <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">

                    @endif

                    <!-- Le token CSRF -->
                    @csrf

                    <p>
                        <label for="title">Titre</label><br />

                        <!-- S'il y a un $post->title, on complète la valeur de l'input -->
                        <input type="text" name="title" value="{{ isset($post->title) ? $post->title : old('title') }}" id="title" placeholder="Le titre du post">

                        <!-- Le message d'erreur pour "title" -->
                        @error("title")
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </p>

                    <!-- S'il y a une image $post->picture, on l'affiche -->
                    @if(isset($post->picture))
                    <p>
                        <span>Couverture actuelle</span><br />
                        <img src="{{ asset('storage/'.$post->picture) }}" alt="image de couverture actuelle" style="max-height: 200px;">
                    </p>
                    @endif

                    <p>
                        <label for="picture">Couverture</label><br />
                        <input type="file" name="picture" id="picture">

                        <!-- Le message d'erreur pour "picture" -->
                        @error("picture")
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </p>
                    <p>
                        <label for="content">Contenu</label><br />

                        <!-- S'il y a un $post->content, on complète la valeur du textarea -->
                        <textarea name="content" id="content" lang="fr" rows="10" cols="50" placeholder="Le contenu du post">{{ isset($post->content) ? $post->content : old('content') }}</textarea>

                        <!-- Le message d'erreur pour "content" -->
                        @error("content")
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    </p>

                    <input type="submit" name="valider" value="Valider">

                </form>
            </form>
        </div>
    </div>
</div>

@endsection
