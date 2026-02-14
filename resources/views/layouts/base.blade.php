<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Load app CSS once --}}
    @vite('resources/css/app.css')

    {{-- Load global JS once (app.js should expose jQuery globally) --}}
    @vite('resources/js/app.js')
</head>
<body>
    @yield('content') 

    {{-- Place all page-specific scripts here --}}
    @stack('scripts')
</body>
</html>
