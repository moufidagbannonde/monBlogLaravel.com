<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mon blog Laravel</title>
</head>

<body>
    <h1>Mon blog Laravel</h1>
    <p>
        <a href="/contact-us">Contactez-nous</a>
    </p>
    <!-- Le contenu de toutes les pages apparaîtra en bas ici -->
    @yield('contenu')
    <!-- Le contenu de toutes les pages apparaîtra en bas ici -->
</body>

</html>