<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @stack('meta')

    <title>{{ $title }} - {{ config('app.name') }}</title>
    <!-- Fonts -->
    @stack('styles')
    @livewireStyles
    <!-- Scripts & Styles (Vite) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body class="antialiased bg-gray-50 font-baloo">

    <div class="min-h-screen flex flex-col">
        <x-layouts.navbar />
        
        <!-- Page Content -->
        <main class="flex-1 relative z-0">
            {{ $slot }}            
        </main>

        <!-- Footer -->
        <x-layouts.footer />
    </div>

    {{-- @livewireScripts --}}
    @stack('scripts')
    <!-- Optional: Toast/Notifications -->
    {{-- <x-notifications /> --}}

</body>
</html>