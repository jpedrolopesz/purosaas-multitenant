<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{tenant('company')}}</title>

        <link rel="icon" type="image/png" sizes="32x32" href="/uploads/avatars/{{tenant()->logo}}">

        <!-- BOX ICONS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">


        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <link rel="stylesheet" href="{{('/css/styles.css') }}">


        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <script src="{{('/js/index.js') }}" defer></script>

    </head>
    <body class="bg-gray-50">

        <div class="min-h-screen">

            <!-- HEADER -->
            @include('tenant.layouts.dashboard.header')
            <!-- NAV -->
            @include('tenant.layouts.dashboard.sidebar')

            <!-- Page Content -->

            <main class="home_content">
                @yield('content')
            </main>
        </div>

    </body>
</html>
