@extends('baseadm')

@section('title', 'Tous les articles')

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

        <h1 class="m-4">Tous les articles</h1>

        <!-- Le tableau pour lister les articles/posts -->
        <table border="1">
            <thead>
                <tr>
                    <th>Titre</th>
                    <th colspan="2">Opérations</th>
                </tr>
            </thead>
            <tbody>
                <!-- On parcourt la collection de Post -->
                @foreach ($posts as $post)
                <tr>
                    <td>
                        <!-- Lien pour afficher un Post : "posts.show" -->
                        <a href="{{ route('posts.show', $post) }}" title="Lire l'article">{{ $post->title }}</a>
                    </td>
                    <td>
                        <!-- Lien pour modifier un Post : "posts.edit" -->
                        <a href="{{ route('posts.edit', $post) }}" title="Modifier l'article">Modifier</a>
                    </td>
                    <td>
                        <!-- Formulaire pour supprimer un Post : "posts.destroy" -->
                        <form method="POST" action="{{ route('posts.destroy', $post) }}">
                            <!-- CSRF token -->
                            @csrf
                            <!-- <input type="hidden" name="_method" value="DELETE"> -->
                            @method("DELETE")
                            <input type="submit" value="x Supprimer">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>

@endsection
