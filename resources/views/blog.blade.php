@extends('base')

@section('title', 'Blog')

@section('content')
    <div class="container mt-5">
            <div class="row">
                <div class="col-md-7">
                    <h2>Derniers Articles</h2>
                    <div class="blog-post">
                        <div class="post-head">
                            <h3>Titre de l'Article 1</h3>
                            <span class="date">Publié le 10/10/2024</span>
                            <img src="/CLIENT/Assets/img/twoinf.jpg" class="img-fluid" alt="Image de l'article 1">
                        </div>
                        <div class="body">
                            <p class="excerpt">Ceci est un extrait du contenu de l'article 1...</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas unde ducimus velit assumenda veritatis tempora eveniet facilis! Odit, quam quibusdam.</p>
                        </div>
                        <a href="/CLIENT/Src/Public/Blog/Regular_Article/article1.html">Lire plus</a>
                    </div>
                    <div class="blog-post">
                        <div class="post-head">
                            <h3>Titre de l'Article 2</h3>
                            <span class="date">Publié le 10/11/2024</span>
                            <img src="/CLIENT/Assets/img/twoinf.jpg" class="img-fluid" alt="Image de l'article 1">
                        </div>
                        <div class="body">
                            <p class="excerpt">Ceci est un extrait du contenu de l'article 1...</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas unde ducimus velit assumenda veritatis tempora eveniet facilis! Odit, quam quibusdam.</p>
                        </div>
                        <a href="/CLIENT/Src/Public/Blog/Regular_Article/article1.html">Lire plus</a>
                    </div>
                    <div class="blog-post">
                        <div class="post-head">
                            <h3>Titre de l'Article 3</h3>
                            <span class="date">Publié le 15/11/2024</span>
                            <img src="/CLIENT/Assets/img/twoinf.jpg" class="img-fluid" alt="Image de l'article 1">
                        </div>
                        <div class="body">
                            <p class="excerpt">Ceci est un extrait du contenu de l'article 1...</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas unde ducimus velit assumenda veritatis tempora eveniet facilis! Odit, quam quibusdam.</p>
                        </div>
                        <a href="/CLIENT/Src/Public/Blog/Regular_Article/article1.html">Lire plus</a>
                    </div>
                    <div class="blog-post">
                        <div class="post-head">
                            <h3>Titre de l'Article 4</h3>
                            <span class="date">Publié le 16/11/2024</span>
                            <img src="/CLIENT/Assets/img/twoinf.jpg" class="img-fluid" alt="Image de l'article 1">
                        </div>
                        <div class="body">
                            <p class="excerpt">Ceci est un extrait du contenu de l'article 1...</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas unde ducimus velit assumenda veritatis tempora eveniet facilis! Odit, quam quibusdam.</p>
                        </div>
                        <a href="/CLIENT/Src/Public/Blog/Regular_Article/article1.html">Lire plus</a>
                    </div>
                    <div class="blog-post">
                        <div class="post-head">
                            <h3>Titre de l'Article 5</h3>
                            <span class="date">Publié le 17/11/2024</span>
                            <img src="/CLIENT/Assets/img/twoinf.jpg" class="img-fluid" alt="Image de l'article 1">
                        </div>
                        <div class="body">
                            <p class="excerpt">Ceci est un extrait du contenu de l'article 1...</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas unde ducimus velit assumenda veritatis tempora eveniet facilis! Odit, quam quibusdam.</p>
                        </div>
                        <a href="/CLIENT/Src/Public/Blog/Regular_Article/article1.html">Lire plus</a>
                    </div>
                    <div class="blog-post">
                        <div class="post-head">
                            <h3>Titre de l'Article 6</h3>
                            <span class="date">Publié le 18/11/2024</span>
                            <img src="/CLIENT/Assets/img/twoinf.jpg" class="img-fluid" alt="Image de l'article 1">
                        </div>
                        <div class="body">
                            <p class="excerpt">Ceci est un extrait du contenu de l'article 1...</p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas unde ducimus velit assumenda veritatis tempora eveniet facilis! Odit, quam quibusdam.</p>
                        </div>
                        <a href="/CLIENT/Src/Public/Blog/Regular_Article/article1.html">Lire plus</a>
                    </div>
                </div>

                <div class="col-md-5">
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
