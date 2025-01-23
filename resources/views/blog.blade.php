@extends('base')

@section('title', 'Blog')

@section('content')
<div class="container mt-4 d-flex flex-row">

    <div class="col-l-7">
        <h1 class="my-4">Tous les Articles</h1>
        @if($posts->count())
        <div class="list-group">
            @foreach($posts as $post)
            <div class="m-2">
                <a href="{{ route('posts.show', $post) }}" class="list-group-item list-group-item-action">
                    <h5 class="mb-1">{{ $post->title }}</h5>
                    <img src="{{ asset('storage/' .$post->picture) }}" alt="Image de couverture">
                    <p class="mb-1">{{ Str::limit($post->content, 100) }}</p>
                    <small>Publié le {{ $post->created_at->format('d/m/Y') }}</small>
                </a>
            </div>
            @endforeach
        </div>
        @else
        <p>Aucun article trouvé.</p>
        @endif
    </div>

    <div>
        <div>
            <h2>Événements Passés</h2>
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
