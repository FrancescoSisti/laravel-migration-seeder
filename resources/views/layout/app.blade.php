<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Default Title')</title>
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])
    @routes
</head>
<body>
    <header>
        @include('layout.partials.header')
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        @include('layout.partials.footer')
    </footer>
</body>
</html>
