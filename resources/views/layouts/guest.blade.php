<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-50 text-gray-800 antialiased selection:bg-primary-500 selection:text-white">
        
        <!-- Navbar Utama -->
        <x-navbar />

        <div class="min-h-screen relative flex flex-col sm:justify-center items-center pt-32 sm:pt-24 pb-12 overflow-hidden">
            <!-- Background Decoration -->
            <div class="absolute inset-0 z-0">
                <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-primary-50 to-white/50"></div>
                <div class="absolute -top-[20%] -right-[10%] w-[60%] h-[60%] rounded-full bg-gradient-to-bl from-primary-200/40 to-transparent blur-3xl"></div>
                <div class="absolute -bottom-[20%] -left-[10%] w-[60%] h-[60%] rounded-full bg-gradient-to-tr from-secondary-200/40 to-transparent blur-3xl"></div>
            </div>

            <!-- Form Container -->
            <div class="w-full sm:max-w-md mt-6 px-8 py-8 glass-card border-white/50 z-10 sm:rounded-2xl">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
