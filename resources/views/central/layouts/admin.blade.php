<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- BOX ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- Scripts -->

    <link rel="stylesheet" href="{{ mix('public/css/app.css') }}">
    <link rel="stylesheet" href="{{ mix('public/css/styles.css') }}">


    <!-- Scripts -->
    <script src="{{ mix('public/js/app.js') }}" defer></script>
    <script src="{{ mix('public/js/index.js') }}" defer></script>
</head>
<body class="bg-gray-50">

<div class="min-h-screen">

    <!-- HEADER -->
    @include('central.layouts.dashboard.header')
    <!-- NAV -->
    @include('central.layouts.dashboard.sidebar')

    <!-- Page Content -->

    <main class="home_content">
            @yield('content')
    </main>
</div>
</body>
</html>
