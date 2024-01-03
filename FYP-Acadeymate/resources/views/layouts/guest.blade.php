<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-cloak x-data="themeSwitcher()" :class="{ 'dark': switchOn }">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body>
        <div class="font-sans lg:-mt-10 md:-mt-10 sm:-mt-10 text-gray-900 dark:text-gray-100 antialiased">
            {{ $slot }}
        </div>
		<div class="fixed bottom-0 css-selector right-0 p-4 w-full">
		</div>

        @livewireScripts
</html>
