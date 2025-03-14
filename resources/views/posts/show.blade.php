@extends('base')

@section('title', '$post->title')

@section('content')
<div class="container-fluid mt-5 bg-white">
    <h1 class="mb-4 text-center text-dark bg-info p-2">{{ $post->title }}</h1>
    <div class="">
        <img class="img-fluid img-responsive" src="{{ asset('storage/'.$post->picture) }}" alt="Image de couverture" style="max-width: 100vw;">

        <div class="mt-3">{{ $post->content }}</div>
    </div>
    <p class="mt-5"><a class="btn btn-secondary" href="{{ route('blog.index') }}" title="Retourner aux articles">Retourner aux posts</a></p>

</div>
@endsection
