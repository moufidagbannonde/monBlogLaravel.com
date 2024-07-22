<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mon blog Laravel</title>
</head>

<body>
    <header>
        <h1>Mon blog Laravel</h1>
        <nav>
            <ul>
                <li><a href="/contact-us">Contactez-nous</a></li>
                <li><a href="/about">About</a></li>
            </ul>
        </nav>
    </header>
    <!-- Le contenu de toutes les pages apparaîtra en bas ici -->
    <main>
        <!-- @yield('contenu') -->
        <!-- @yield('about') -->
    </main>
    <!-- Le contenu de toutes les pages apparaîtra en bas ici -->
</body>

</html>