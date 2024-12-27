@extends('base')

@section('title', 'Formations')

@section('content')
    <div class="training">
        <div class="training-items pt-4">
          <div id="training-items" class="d-flex flex-column gap-2 trainingd-items-scrollspy text-center">
            <a class="rounded" href="#card1">Num 1</a>
            <a class="rounded" href="#card2">Num 2</a>
            <a class="rounded" href="#card3">Num 3</a>
            <a class="rounded" href="#card4">Num 4</a>
            <a class="rounded" href="#card5">Num 5</a>
          </div>
        </div>
        <div class="training-items-infos">
          <div data-bs-spy="scroll" data-bs-target="#training-items" data-bs-offset="0" data-bs-smooth-scroll="true" class="scrollspy-card" style="position: relative; height: 600px; overflow-y: scroll;" tabindex="0">
            <div id="card1" class="card">
                <div class="card-head">
                    <img src="/CLIENT/Assets/img/word1.jpg" alt="img" class="img-fluid">
                    <div class="infos">
                        <span>Prix: 5000 Fcfa</span>
                        <a href="">Inscrivez-vous</a>
                        <button class="btn">Envoyez un mail</button>
                    </div>
                </div>
                <div class="card-infos">
                    <div class="infos-head">
                        <h3>FORMATION 1</h3>
                        <time class="date">09/11/2024</time>
                        <h4>Durée: 01 Mois</h4>
                    </div>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sapiente explicabo, totam consequatur ipsum eius quam iste.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus quibusdam laudantium odit enim.</p>
                </div>
            </div>
            <div id="card2" class="card">
                <div class="card-head">
                    <img src="/CLIENT/Assets/img/devps.jpg" alt="img" class="img-fluid">
                    <div class="infos">
                        <span>Prix: 5000 Fcfa</span>
                        <a href="">Inscrivez-vous</a>
                        <button class="btn">Envoyez un mail</button>
                    </div>
                </div>
                <div class="card-infos">
                    <div class="infos-head">
                        <h3>FORMATION 2</h3>
                        <time class="date">20/11/2024</time>
                        <h4>Durée: 01 Mois</h4>
                    </div>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sapiente explicabo, totam consequatur ipsum eius quam iste.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus quibusdam laudantium odit enim.</p>
                </div>
            </div>
            <div id="card3" class="card">
                <div class="card-head">
                    <img src="/CLIENT/Assets/img/twoinf.jpg" alt="img" class="img-fluid">
                    <div class="infos">
                        <span>Prix: 10000 Fcfa</span>
                        <a href="">Inscrivez-vous</a>
                        <button class="btn">Envoyer un mail</button>
                    </div>
                </div>
                <div class="card-infos">
                    <div class="infos-head">
                        <h3>FORMATION 3</h3>
                        <time class="date">20/12/2024</time>
                        <h4>Durée: 01 Mois</h4>
                    </div>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sapiente explicabo, totam consequatur ipsum eius quam iste.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus quibusdam laudantium odit enim.</p>
                </div>
            </div>
            <div id="card4" class="card">
                <div class="card-head">
                    <img src="/CLIENT/Assets/img/computer-room.jpg" alt="img" class="img-fluid">
                    <div class="infos">
                        <span>Prix: 10000 Fcfa</span>
                        <a href="">Inscrivez-vous</a>
                        <button class="btn">Envoyer un mail</button>
                    </div>
                </div>
                <div class="card-infos">
                    <div class="infos-head">
                        <h3>FORMATION 4</h3>
                        <time class="date">15/01/2025</time>
                        <h4>Durée: 01 Mois</h4>
                    </div>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sapiente explicabo, totam consequatur ipsum eius quam iste.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus quibusdam laudantium odit enim.</p>
                </div>
            </div>
            <div id="card5" class="card">
                <div class="card-head">
                    <img src="/CLIENT/Assets/img/computer-room.jpg" alt="img" class="img-fluid">
                    <div class="infos">
                        <span>Prix: 15000 Fcfa</span>
                        <a href="">Inscrivez-vous</a>
                        <button class="btn">Envoyer un mail</button>
                    </div>
                </div>
                <div class="card-infos">
                    <div class="infos-head">
                        <h3>FORMATION 5</h3>
                        <time class="date">15/03/2025</time>
                        <h4>Durée: 01 Mois</h4>
                    </div>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sapiente explicabo, totam consequatur ipsum eius quam iste.</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus quibusdam laudantium odit enim.</p>
                </div>
            </div>
          </div>
        </div>
    </div>
@endsection
