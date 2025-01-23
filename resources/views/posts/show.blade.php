@extends('base')

@section('title', '$post->title')

@section('content')
<div class="container mt-5 w-50">
    <h1 class="mb-4">{{ $post->title }}</h1>
    <div class="w-50">
        <img src="{{ asset('storage/'.$post->picture) }}" alt="Image de couverture" style="max-width: 100vw;">

        <div class="mt-3">{{ $post->content }}</div>
    </div>
    <p class="mt-5"><a href="{{ route('posts.index') }}" title="Retourner aux articles">Retourner aux posts</a></p>

</div>
@endsection
