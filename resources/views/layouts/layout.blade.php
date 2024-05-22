<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title') - Hotel Name</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap" rel="stylesheet">
    <link href="/css/main.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="###">Hotel Logo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav">
                    <li class="nav-item {{ request()->routeIs('home') ? 'active' : '' }} ">
                        <a href="{{ route('home') }}"
                            class="nav-link {{ request()->routeIs('home') ? 'active' : '' }} ">Home</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('rooms') ? 'active' : '' }} ">
                        <a href="{{ route('rooms') }}"
                            class="nav-link {{ request()->routeIs('rooms') ? 'active' : '' }} ">Rooms</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('contact-us') ? 'active' : '' }} ">
                        <a href="{{ route('contact-us') }}"
                            class="nav-link {{ request()->routeIs('contact-us') ? 'active' : '' }} ">Contact Us</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('login') ? 'active' : '' }} ">
                        <a href="{{ route('login')}}" class="btn btn-bd-primary">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer>
        Copyright 2024 @ Hotel Name. All rights reserved.
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>