<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;500;600;700&family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-light-gray">
    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-light-gray">
        <!-- Sidebar -->
        <x-admin.sidebar />

        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Navbar -->
            <x-admin.navbar />

            <!-- Main content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-light-gray">
                <div class="container mx-auto px-6 py-8">
                    <!-- Page header -->
                    @if (isset($header))
                        <header class="mb-6">
                           {{ $header }}
                        </header>
                    @endif

                    <!-- Page Content -->
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
    @stack('scripts')
</body>
</html>
