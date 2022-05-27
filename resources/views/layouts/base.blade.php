<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ $title ?? config('app.name') }}</title>

        <!-- Favicon -->
		<link rel="shortcut icon" href="{{ url(asset('favicon.ico')) }}">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset(mix('css/app.css')) }}">
        <livewire:styles />

        <!-- Scripts -->
        <script src="{{ asset(mix('js/app.js')) }}" defer></script>

        @stack('styles')
    </head>

    <body
        x-cloak
        x-data
        x-bind:class="{'dark': $store.darkMode.dark }"
    >
        <x-toast />

        {{ $slot }}

        <livewire:scripts />
        @stack('scripts')
    </body>
</html>
