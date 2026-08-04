<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- SEO Meta Tags --}}
    @php
        $siteName = \App\Models\Setting::get('site_name', config('app.name', 'Langtang Local Government Council'));
        $siteDescription = \App\Models\Setting::get('site_description', 'The official website of the Langtang South Area Council, Plateau State, Nigeria.');
        $pageTitle = $title ?? $siteName;
        $pageDescription = $metaDescription ?? $siteDescription;
        $pageImage = $ogImage ?? asset('images/og-default.jpg');
    @endphp

    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $pageDescription }}">
    <meta name="keywords" content="{{ $metaKeywords ?? 'Langtang South, Area Council, Plateau State, Local Government, Nigeria' }}">
    <meta name="author" content="{{ $siteName }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    {{-- Open Graph --}}
    <meta property="og:type" content="{{ $ogType ?? 'website' }}">
    <meta property="og:site_name" content="{{ $siteName }}">
    <meta property="og:title" content="{{ $ogTitle ?? $pageTitle }}">
    <meta property="og:description" content="{{ $ogDescription ?? $pageDescription }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ $pageImage }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $ogTitle ?? $pageTitle }}">
    <meta name="twitter:description" content="{{ $ogDescription ?? $pageDescription }}">
    <meta name="twitter:image" content="{{ $pageImage }}">

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset(\App\Models\Setting::get('site_favicon', 'images/favicon.ico')) }}">

    {{-- Fonts --}}
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    {{-- Scripts --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased bg-light-gray">
    <div class="min-h-screen flex flex-col">
        <x-public-nav />

        {{-- Page Content --}}
        <main class="flex-grow">
            {{ $slot }}
        </main>

        {{-- Footer --}}
        <x-public-footer />
    </div>

    @stack('scripts')
</body>
</html>
