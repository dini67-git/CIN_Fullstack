@extends('base')

@section('title', 'Blog')

@section('content')
<div class="container-fluid mt-4">
    <div class="row">
        <!-- Colonne principale pour les articles -->
        <div class="col-md-8">
            <h1 class="my-4 p-3 bg-primary text-white fw-bold text-center">Tous les Articles</h1>
            @if($posts->count())
                <div class="d-grid gap-4" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); max-height: 600px; overflow-y: auto;">
                    @foreach($posts as $post)
                        <div class="card p-2">
                            <a href="{{ route('posts.show', $post) }}" class="list-group-item list-group-item-action">
                                <h5 class="mb-1 text-center text-info  bg-dark p-2">{{ $post->title }}</h5>
                                <!-- Image responsive -->
                                <img src="{{ asset('storage/' . $post->picture) }}" alt="Image de couverture" class="img-fluid mb-2">
                                <p class="mb-1 mt-2">{{ Str::limit($post->content, 200) }}</p>
                                <small class="flex-end">Publié le {{ $post->created_at->format('d/m/Y') }}</small>
                            </a>
                        </div>
                    @endforeach
                </div>
            @else
                <p>Aucun article trouvé.</p>
            @endif
        </div>

        <!-- Colonne pour les événements passés -->
        <div class="col-md-4">
            <h2 class="mb-4 p-3 text-white fw-bold text-center" style="background:seagreen">Événements Passés</h2>
            <ul class="list-group">
                <li class="list-group-item">
                    <h4>Événement 1</h4>
                    <p class="date">27/09/2024</p>
                    <p>Résumé de l'événement 1...</p>
                </li>
                <li class="list-group-item">
                    <h4>Événement 2</h4>
                    <p class="date">13/08/2024</p>
                    <p>Résumé de l'événement 2...</p>
                </li>
            </ul>
        </div>
    </div>
</div>
@endsection
