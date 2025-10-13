<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Dynamic SEO Meta Tags --}}
    @if(isset($seoMeta) && $seoMeta)
        {{-- Basic Meta Tags --}}
        <title>{{ $seoMeta->meta_title ?? config('app.name') }}</title>
        @if($seoMeta->meta_description)
            <meta name="description" content="{{ $seoMeta->meta_description }}">
        @endif
        @if($seoMeta->meta_keywords)
            <meta name="keywords" content="{{ $seoMeta->meta_keywords }}">
        @endif
        @if($seoMeta->canonical_url)
            <link rel="canonical" href="{{ $seoMeta->canonical_url }}">
        @endif
        @if($seoMeta->author)
            <meta name="author" content="{{ $seoMeta->author }}">
        @endif

        {{-- Robots Meta --}}
        <meta name="robots" content="{{ $seoMeta->robots_meta }}">

        {{-- Open Graph (Facebook) Meta Tags --}}
        <meta property="og:title" content="{{ $seoMeta->og_title ?? $seoMeta->meta_title ?? config('app.name') }}">
        @if($seoMeta->og_description || $seoMeta->meta_description)
            <meta property="og:description" content="{{ $seoMeta->og_description ?? $seoMeta->meta_description }}">
        @endif
        @if($seoMeta->og_image)
            <meta property="og:image" content="{{ $seoMeta->og_image }}">
        @endif
        <meta property="og:type" content="{{ $seoMeta->og_type }}">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:locale" content="{{ $seoMeta->og_locale }}">
        <meta property="og:site_name" content="{{ config('app.name') }}">

        {{-- Twitter Card Meta Tags --}}
        <meta name="twitter:card" content="{{ $seoMeta->twitter_card }}">
        <meta name="twitter:title" content="{{ $seoMeta->twitter_title ?? $seoMeta->meta_title ?? config('app.name') }}">
        @if($seoMeta->twitter_description || $seoMeta->meta_description)
            <meta name="twitter:description" content="{{ $seoMeta->twitter_description ?? $seoMeta->meta_description }}">
        @endif
        @if($seoMeta->twitter_image ?? $seoMeta->og_image)
            <meta name="twitter:image" content="{{ $seoMeta->twitter_image ?? $seoMeta->og_image }}">
        @endif
        @if($seoMeta->twitter_site)
            <meta name="twitter:site" content="{{ $seoMeta->twitter_site }}">
        @endif
        @if($seoMeta->twitter_creator)
            <meta name="twitter:creator" content="{{ $seoMeta->twitter_creator }}">
        @endif

        {{-- Schema.org Structured Data (JSON-LD) --}}
        @if($seoMeta->schema_markup)
            <script type="application/ld+json">
                {!! $seoMeta->schema_markup !!}
            </script>
        @endif
    @else
        {{-- Fallback Meta Tags when no SEO data exists --}}
        <title>@yield('title', config('app.name'))</title>
        <meta name="description" content="@yield('description', 'Welcome to ' . config('app.name'))">
        <meta name="robots" content="index, follow">
        <link rel="canonical" href="{{ url()->current() }}">

        {{-- Fallback Open Graph --}}
        <meta property="og:title" content="@yield('title', config('app.name'))">
        <meta property="og:description" content="@yield('description', 'Welcome to ' . config('app.name'))">
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:site_name" content="{{ config('app.name') }}">

        {{-- Fallback Twitter Card --}}
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="@yield('title', config('app.name'))">
        <meta name="twitter:description" content="@yield('description', 'Welcome to ' . config('app.name'))">
    @endif

    <link href="https://fonts.googleapis.com/css2?family=Waiting+for+the+Sunrise&display=swap" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
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