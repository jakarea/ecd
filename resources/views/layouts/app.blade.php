<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Laravel App')</title>

    <link href="https://fonts.googleapis.com/css2?family=Waiting+for+the+Sunrise&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap"
        rel="stylesheet">


    {{-- Common CSS --}}
    {{--
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    @stack('styles') {{-- For page-specific styles --}}
    @vite('resources/css/app.css')
</head>

<body>

    @include('partials.header')
    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    {{-- Common JS --}}
    {{--
    <script src="{{ asset('resources/js/app.js') }}"></script> --}}
    @vite('resources/js/app.js')
    @stack('scripts') {{-- For page-specific scripts --}}
</body>

</html>