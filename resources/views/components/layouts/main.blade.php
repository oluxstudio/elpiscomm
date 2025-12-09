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
        
        <h1 class="text-5xl font-bold text-black font-aladin " >Site Underconstruction</h1>
        <h3> We are working on this page. Please come back soon. </h3>
    </div>

    {{-- @livewireScripts --}}
    @stack('scripts')
    <!-- Optional: Toast/Notifications -->
    {{-- <x-notifications /> --}}

</body>
</html>
