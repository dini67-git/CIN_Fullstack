@extends('baseadm')

@section('title', 'Tous les articles')

@section('content')

<div class="col-md-12">
    <div>
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

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tous les articles</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th> Titre </th>
                                <th colspan="2"> Opérations </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- On parcourt la collection de Post -->
                            @foreach ($posts as $post)
                            <tr>
                                <td class="py-1">
                                    <!-- Lien pour afficher un Post : "posts.show" -->
                                    <a href="{{ route('posts.show', $post) }}" title="Lire l'article">{{ $post->title }}</a>
                                </td>
                                <td>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </td>
                                <td> </td>
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
                                        <input type="submit" value="Supprimer">
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

@endsection
