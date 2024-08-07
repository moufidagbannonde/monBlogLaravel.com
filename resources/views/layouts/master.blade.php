<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>@yield('title', 'Mon Blog Laravel')</title>
</head>

<body>
    <header>
        <h1>Moufid Lara-Blog</h1>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-disabled="true" href="/contact-us">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/articles">Articles</a>
                        </li>
                        @guest
                            <a href="{{ route('register') }}" style="text-decoration:none">Créer un compte</a>
                            <a href="{{ route('login') }}" style="text-decoration:none">Login</a>
                        @endguest

                        @auth
                            <a href="{{ route('profile') }}">Mon profil</a>
                            <h6>                            
                                {{Auth::user()->name}}(connecté) 
                            </h6>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Le contenu de toutes les pages apparaîtra en bas ici -->
    <main class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        @endif
        {{-- Contenu de tous les pages ici --}}
        @yield('contenu')
        @yield('content')
        @yield('about')
        {{-- Contenu de toutes les pages ici --}}
    </main>
    {{-- Le contenu de toutes les pages apparaîtra en bas ici --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>