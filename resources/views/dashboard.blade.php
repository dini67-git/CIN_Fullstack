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
<body>
<div class="dash d-flex flex-row">
    <div class="side-menu">
        <div class="brand-name">
            <h1 class="fw-bold">Brand name</h1>
        </div>
        <ul>
            <li><i class="fa-solid fa-tachometer-alt me-3"></i> Dashboard</li>
            <li><i class="fa-solid fa-users me-3"></i> Users</li>
            <li><i class="fa-solid fa-graduation-cap me-3"></i> Training</li>
            <li><i class="fa-solid fa-newspaper me-3"></i> Blog</li>
            <li><i class="fa-solid fa-cogs me-3"></i> Setting</li>
        </ul>
    </div>

    <div class="dash-container">
        <div class="header">
            <div class="nav">
                <div class="search">
                    <input type="text" placeholder="Search...">
                    <button type="submit"><i class="fas fa-search"></i></button>
                </div>
                <div class="user">
                    <a href="#" class="btn">Add new</a>
                    <img src="{{asset('storage/images/notification.png')}}" alt="notification_img">
                    <div class="img-case">
                        <img src="{{asset('storage/images/user1.jpg')}}" alt="user_img">
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <h1>2190</h1>
                        <h3>Members</h3>
                    </div>
                    <div class="icon-case">
                        <img class="responsive img-fluid" src="{{asset('storage/images/member.png')}}" alt="members_img">
                    </div>
                </div>

                <div class="card">
                    <div class="box">
                        <h1>2190</h1>
                        <h3>Trainings</h3>
                    </div>
                    <div class="icon-case">
                        <img class="responsive img-fluid" src="{{asset('storage/images/member.png')}}" alt="training_img">
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1>2190</h1>
                        <h3>Blogs</h3>
                    </div>
                    <div class="icon-case">
                        <img class="responsive img-fluid" src="{{asset('storage/images/member.png')}}" alt="blog_img">
                    </div>
                </div>

            </div>
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Recent Payments</h2>
                        <a href="#" class="btn">View All</a>
                    </div>
                    <table>
                        <tr>
                            <th>Name</th>
                            <th>Name</th>
                            <th>Name</th>
                            <th>Name</th>
                        </tr>
                    </table>
                </div>
                <div class="new-user"></div>
            </div>
        </div>
    </div>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>
</body>
</html>
