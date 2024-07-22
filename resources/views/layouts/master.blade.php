<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>@yield('title' , 'Mon Blog Laravel')</title>
</head>

<body>
    <header>
        <h1>Mon blog Laravel</h1>
        <nav>
            <ul>
                <li><a href="/contact-us">Contactez-nous</a></li>
                <li><a href="/about">About</a></li>
                <li><a href="/articles">Articles</a></li>
            </ul>
        </nav>
    </header>
    <!-- Le contenu de toutes les pages apparaîtra en bas ici -->
    <main>
        @yield('content')
        @yield('about')
        @yield('contenu')
    </main>
    <!-- Le contenu de toutes les pages apparaîtra en bas ici -->
</body>

</html>