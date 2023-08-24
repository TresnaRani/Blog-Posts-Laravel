<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Blog Post</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="font-sans text-gray-900 antialiased">
            <h1 class="text-2xl font-semibold text-gray-900 text-center">Blog Post Management</h1>
            <h2 class="text-2xl font-semibold text-gray-900 text-center">Username: tresna312@gmail.com</h2>
            <h2 class="text-2xl font-semibold text-gray-900 text-center">Password: 12345678</h2>
            {{ $slot }}
        </div>
    </body>
</html>
