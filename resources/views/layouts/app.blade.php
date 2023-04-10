<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('/image/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('/image/favicon_apple_180.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('/image/favicon192.png') }}">

    {{-- <title>{{ config('app.name', 'GEOCARD') }}</title> --}}
    <title>GEOCARD</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('styles')
    <style>
        .navbar-top {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 999;
        }

        .navbar-bottom {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 999;

        }

        header {
            margin-top: 65px;
        }
    </style>
</head>

<body class="font-sans antialiased">
    {{-- <div class="min-h-screen" style="background-color: #dddddd;"> --}}
    <div class="navbar-top">
        @include('layouts.navigation')
    </div>
    <!-- Page Heading -->
    @if (isset($header))
        <header class="bg-white dark:bg-gray-800 shadow" style="background-color: #dddddd;">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main>
        {{ $slot }}
    </main>

    <div class="bg-white pt-12 sm:pt-16 lg:pt-24 w-screen">
        <!-- nav - start -->
        <div class="navbar-bottom">
            @include('layouts.navbar')
        </div>
        <!-- nav - end -->
    </div>

    </div>
</body>

</html>
