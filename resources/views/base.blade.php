<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>@yield('CIN')</title>
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid d-flex flex-column flex-grow-1">
        <div class="d-flex justify-content-center pt-2" style="color:azure; background:mediumseagreen">
            <h1 class="fw-bold">Université
                <img id="unz" src="{{ asset('storage/images/logo-unz.png') }}" alt="UNZ" class="img-fluid img-circle d-flpx-4" style="max-width: 60px;">
                NORBERT ZONGO
            </h1>
        </div>

        <nav class="navbar navbar-expand-lg navbar-light bg-light" id="main-navbar">
            <a class="navbar-brand fw-bold d-flex flex-row" href="{{ route('home') }}">
                <img id="cin" src="{{ asset('storage/images/CIN.jpg') }}" alt="cin_icon" class="img-fluid" style="max-width: 50px;">
                <span class="align-self-center fs-2">CIN</span>
                <div class="text-overlay w-50">
                    <h1 class="scrolling-text">
                        <i class="fas fa-star custom-icon"></i>
                        <i class="fas fa-star custom-icon"></i>
                        <i class="fas fa-star custom-icon"></i>
                        <span class="mx-3">Club les Intéllos du Numérique</span>
                        <i class="fas fa-star custom-icon"></i>
                        <i class="fas fa-star custom-icon"></i>
                        <i class="fas fa-star custom-icon"></i>
                    </h1>
                </div>
            </a>

            <!-- Menu Offcanvas -->
            <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarNav" aria-labelledby="navbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title d-flex" id="navbarLabel" style="color: white;">
                        <img id="cin" src="{{ asset('storage/images/CIN.jpg') }}" alt="CIN" class="img-fluid" style="max-width: 50px;">Club les Intéllos du Numérique
                    </h5>
                    <button type="button" class="btn-close bg-primary" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('training.index') }}">Formations</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('blog.index') }}">Blogs</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('membership') }}">Adhésion</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">À propos</a></li>

                        <!-- Vérification si l'utilisateur est authentifié -->
                        @auth
                            <!-- Menu déroulant pour l'utilisateur connecté -->
                            <li class='nav-item dropdown d-none d-xl-inline-block user-dropdown'>
                                <a
                                    class='nav-link dropdown-toggle'
                                    id='UserDropdown'
                                    href='#'
                                    data-bs-toggle='dropdown'
                                    aria-expanded='false'
                                >
                                    <img
                                        class='img-xs rounded-circle w-25 h-auto'
                                        src='{{ asset("theme/images/faces/face8.jpg") }}'
                                        alt='{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}'
                                    >
                                </a>
                                <div
                                    class='dropdown-menu dropdown-menu-right navbar-dropdown'
                                    aria-labelledby='UserDropdown'
                                >
                                    <div class='dropdown-header text-center'>
                                        <img
                                            class='img-md rounded-circle'
                                            src='{{ asset("theme/images/faces/face8.jpg") }}'
                                            alt='{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}'
                                        >
                                        <p class='mb-1 mt-3 font-weight-semibold'>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</p>
                                        <p class='font-weight-light text-muted mb-0'>{{ Auth::user()->email }}</p>
                                    </div>

                                    <!-- Bouton pour afficher le popover avec plus d'informations -->
                                    <button
                                        id='profilePopover'
                                        type='button'
                                        class='dropdown-item'
                                        data-bs-toggle='popover'
                                        title='<strong>Profil Utilisateur</strong>'
                                        data-bs-html='true'
                                    >
                                        Voir Plus d'Informations
                                    </button>

                                    <!-- Autres options -->

                                    <!-- Formulaire de déconnexion -->
                                    <form action="{{ route('logout') }}" method='POST' style='display:inline;'>
                                        @csrf
                                        <button type='submit' class='dropdown-item'>Se déconnecter<i class='dropdown-item-icon ti-power-off'></i></button>
                                    </form>
                                </div>
                            </li>
                        @else
                            <!-- Lien de connexion si l'utilisateur n'est pas authentifié -->
                            <li class='nav-item'><a href='{{ route('login') }}' class='login-button nav-link' style='color:azure'>Se connecter</a></li>
                        @endauth
                    </ul>
                </div>
            </div>

            <!-- Bouton pour afficher le menu -->
            <button
                class='navbar-toggler'
                type='button'
                data-bs-toggle='offcanvas'
                data-bs-target='#navbarNav'
                aria-controls='#navbarNav'
                aria-label=''
            >
                <span class='navbar-toggler-icon'></span>
            </button>
        </nav>

        <!-- Contenu principal -->
        <div class='flex-grow-1 mt-3'>
            @yield('content')
        </div>

        <!-- Pied de page -->
        <div class='footer mt-auto' style='color:azure; background:mediumseagreen'>
            <div class='container-fluid clearfix d-flex' style='justify-content:space-between'>
                <span
                    class='text-muted d-block text-center text-sm-left d-sm-inline-block'
                >&copy; 2024 Club les Intéllos du Numérique. Tous droits réservés.</span>
                <span
                    class='float-none float-sm-right d-block mt-1 mt-sm-0 text-center'
                >Contactez-nous :
                    <a href='mailto:cin@gmail.com' style='color:azure'>cin@gmail.com</a></span>
            </div>
        </div>

    </div>

    <!-- Scripts JS -->
    <script src="//code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @yield('scripts')

    <!-- Script pour initialiser le popover -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var profilePopover = document.getElementById('profilePopover');

            // Contenu HTML dynamique du popover avec un bouton pour fermer
            var popoverContent = `
                <p><strong>Nom :</strong> {{ Auth::user()->firstname }}</p>
                <p><strong>Prénom :</strong> {{ Auth::user()->lastname }}</p>
                <p><strong>Email :</strong> {{ Auth::user()->email }}</p>
                <p><strong>Téléphone :</strong> {{ Auth::user()->telephone }}</p>
                @if(Auth::id() === Auth::user()->id)
                    <a href="{{ route('users.edit', Auth::user()->id) }}" class='btn btn-warning btn-sm mt-2'>Modifier mes informations</a><br />
                @endif
                @if(Auth::user()->isAdmin())
                    <a href="{{ route('users.index') }}" class='btn btn-info btn-sm mt-2'>Gérer les utilisateurs</a><br />
                @endif
                <!-- Bouton pour fermer le popover -->
                <button type='button' id='closePopover' onclick="$(this).closest('.popover').popover('hide'); return false;" class='btn btn-secondary btn-sm mt-2'>Fermer</button>
            `;

            // Initialiser Bootstrap Popover
            var popoverInstance = new bootstrap.Popover(profilePopover, {
                content: popoverContent,
                html: true,
                trigger: 'click', // Affiche le popover au clic
                placement: 'bottom' // Positionne le popover en bas du bouton
            });

            // Gérer la fermeture du popover par le bouton "Fermer"
            document.addEventListener('click', function (event) {
                if (event.target && event.target.id === 'closePopover') {
                    popoverInstance.hide(); // Cache le popover
                }
            });
        });
    </script>

</body>

</html>
