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
            <h1 class="fw-bold">Université <img id="unz" src="{{ asset('storage/images/logo-unz.png') }}" alt="UNZ" class="img-fluid img-circle d-flpx-4" style="max-width: 60px;"> NORBERT ZONGO</h1>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light bg-light" id="main-navbar">
            <a class="navbar-brand fw-bold d-flex flex-row" href=" {{ route('home')}}">
                <img id="cin" src="{{ asset('storage/images/CIN.jpg') }}" alt="cin_icon" class="img-fluid" style="max-width: 50px;">
                <span class="align-self-center fs-2">CIN</span>
                <div class="text-overlay w-50" >
                    <h1 class="scrolling-text">
                    <i class="fas fa-star custom-icon"></i>
                    <i class="fas fa-star custom-icon"></i>
                    <i class="fas fa-star custom-icon"></i>
                    <span class="mx-3">Club  les Intéllos du Numérique</span>
                    <i class="fas fa-star custom-icon"></i>
                    <i class="fas fa-star custom-icon"></i>
                    <i class="fas fa-star custom-icon"></i>
                    </h1>
                </div>
            </a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="navbarNav" aria-labelledby="navbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title d-flex" id="navbarLabel" style="color: white;">
                        <img id="cin" src="{{ asset('storage/images/CIN.jpg') }}" alt="CIN" class="img-fluid" style="max-width: 50px;">Club les Intéllos du Numérique
                    </h5>
                    <button type="button" class="btn-close bg-primary" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item"><a class="nav-link" href=" {{ route('home')}}">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href=" {{ route('training')}}">Formations</a></li>
                        <li class="nav-item"><a class="nav-link" href=" {{ route('blog.index')}}">Blog</a></li>
                        <li class="nav-item"><a class="nav-link" href=" {{ route('membership')}}">Adhésion</a></li>
                        <li class="nav-item"><a class="nav-link" href=" {{ route('about')}}">À propos</a></li>
                    </ul>
                    <a href=" {{ route('login')}}" class="login-button" style="color:azure">Se connecter</a>
                </div>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-label="Toggle-navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </nav>

        <div class="flex-grow-1 mt-3">
            @yield('content')
        </div>

        <div class="footer  mt-auto" style="color:azure; background:mediumseagreen">
            <div class="container-fluid clearfix d-flex" style="justify-content:space-between">
                <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">&copy; 2024 Club les Intéllos du Numérique. Tous droits réservés.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Contactez-nous : <a href="cin@gmail.com" style="color:azure">cin@gmail.com</a></span>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>
</body>

</html>
