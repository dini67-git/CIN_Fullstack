@extends('base')

@section('title', 'Accueil')

@section('content')
<div class="row home-block1 mt-2">
    <div class="image-container">
      <img src="{{ asset('storage/images/techn.jpg') }}" alt="img techn" class="img-fluid img-responsive" style="opacity: 0.8; max-height: 400px; width: 100%;">
      <div class="text-overlay">
        <h1 class="m-3">Club les Intéllos du Numérique</h1>
        <p class="scrolling-text">Informatique, le chemin du monde nouveau.</p>
      </div>
    </div>
</div>

<div id="carousel" class="carousel slide mt-3">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner d-flex" style="max-height: 400px;">
    <div class="carousel-item active">
      <img src="{{ asset('storage/images/devps.jpg') }}" class="d-block w-100" alt="..." style="height: 350px;">
      <div class="carousel-caption d-block d-md-block" data-bs-interval="10000">
        <h5>Formations</h5>
        <p>Découvrez nos offres de formations.</p>
        <button class="btn">Consultez</button>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('storage/images/cin1.jpg') }}" class="d-block w-100" alt="..."style="height: 350px;">
      <div class="carousel-caption d-block d-md-block">
        <h5>Second slide label</h5>
        <p>Some representative placeholder content for the second slide.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="{{ asset('storage/images/arti.jpg') }}" class="d-block w-100" alt="..." style="height: 350px;">
      <div class="carousel-caption d-block d-md-block">
        <h5>Third slide label</h5>
        <p>Some representative placeholder content for the third slide.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="home-block3 row p-3 mt-2">
  <h2>Dernières nouvelles et Evènements</h2>
  <div class="col p-3 m-2 card">
      <h3 class="b">Evènement 1</h3>
      <div class="card-body">
        <p>Détails de l'évènement</p>
        <a href="#">Lire plus</a>
      </div>
  </div>
  <div class="col p-3 m-2 card">
    <h3>Evènement 2</h3>
    <div class="card-body">
      <p>Détails de l'évènement</p>
      <a href="#">Lire plus</a>
    </div>
  </div>
  <div class="col p-3 m-2 card">
    <h3>Evènement 3</h3>
    <div class="card-body">
      <p>Détails de l'évènement</p>
      <a href="#">Lire plus</a>
    </div>
  </div>
  <div class="col p-3 m-2 card">
    <h3>Evènement 4</h3>
    <div class="card-body">
      <p>Détails de l'évènement</p>
      <a href="#">Lire plus</a>
    </div>
  </div>
@endsection
