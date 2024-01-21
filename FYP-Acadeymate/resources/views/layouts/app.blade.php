<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-cloak x-data="themeSwitcher()" class="dark" :class="{ 'dark': switchOn }">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">

	{{-- <title>{{ $title ?? 'Page Title' }}</title> --}}
	<title>@yield( 'title', 'Acadeymate' )</title>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
	<link href="https://fonts.bunny.net/css?family=poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

	{{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> --}}

	<!-- Scripts -->
	@vite(['resources/css/app.css', 'resources/js/app.js'])

	<!-- Styles -->
	@livewireStyles
</head>
<body class="font-sans antialiased">
	<x-banner />

	<div class="flex flex-row h-screen main-background">
		<x-sidebar class=""></x-sidebar>
		<div class="flex flex-col justify-items-start">
			@livewire('navigation-menu')
		</div>
		<div class="container-side-nav w-full sm:fill-available-height md:fill-available-height md:mt-[7.15rem] sm:mt-[5.5rem] md:ml-5 lg:ml-4 xl:ml-4 sm:ml-4">
			<div class="overflow-auto main-container example bg-orange-50 shadow-xl dark:bg-gray-800 sm:rounded-lg transition-all duration-500 sm:ml-0 md:ml-[0.4rem] sm:mr-4 mr-4" style="border-radius: 1.5625rem; box-shadow: 2px 0px 4px 1px rgba(0, 0, 0, 0.25); height: -webkit-fill-available;"> {{ $slot }} </div>
		</div>
	</div>

	<!-- Page Heading -->
	{{-- @if (isset($header))
		<header class="bg-white dark:bg-gray-800 shadow pt-20 ">
			<div class="text-center mx-auto py-6 px-4 sm:px-6 lg:px-8 ">
				{{ $header }}
			</div>
		</header>
		@endif --}}

		<!-- Page Content -->

		@stack('modals')
		@livewireScripts
	</body>
	</html>
