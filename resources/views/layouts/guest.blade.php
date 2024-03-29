<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'GEOCARD') }}</title> --}}
    <title>GEOCARD</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="shortcut icon" href="{{ asset('/image/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('/image/favicon_apple_180.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('/image/favicon192.png') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div
        style="background-color:white;"class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100 dark:bg-gray-900">
        <div>
            <a href="/">
                <img src="{{ asset('/image/logo7.svg') }}" style="height:80px; margin-top:10px; margin-bottom:0px;">
            </a>
        </div>
        <div style="position: relative; margin-top: 65px;">
            <img src="{{ asset('image/title12.png') }}" style="width: 100%;">
            <div style="position: absolute; top: 50%; left: 70px; transform: translate(-50%, -50%);">
                <h2 style="font-size: 1em; color: rgb(0, 0, 0); font-family: Noto+Sans+JP;">GEOCARD</h2>
            </div>
        </div>
        <div style="background-color:white;"
            class="w-full sm:max-w-md  px-6 py-4 bg-white dark:bg-gray-800 shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
