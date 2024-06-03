<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'Laravel') }}</title>

		<!-- Fonts -->
		<link rel="preconnect" href="https://fonts.bunny.net">
		<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('app.css') }}" />
	<script type="module" src="{{ asset('app.js') }}"></script>
--}}        <!-- Scripts -->
		@vite(['resources/css/app.css', 'resources/js/app.js'])
	</head>
	<body class="font-sans text-gray-900 antialiased">
{{--        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">--}}
		<div class="min-h-screen bg-gray-100">
			<div>
				<!-- Logo -->
				<div class="shrink-0 flex items-center">
					<a href="{{ route('dashboard') }}">
						<x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
					</a>
				</div>

				<!-- Navigation Links -->
				<div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
					<x-nav-link :href="route('dart_index')" :active="request()->routeIs('dart_index')">
						{{ __('ダーツ') }}
					</x-nav-link>
					<x-nav-link :href="route('trip_index')" :active="request()->routeIs('trip_index')">
						{{ __('投稿一覧') }}
					</x-nav-link>
				</div>
				<main class="bg-neutral-50 max-h-full">
					{{ $slot }}
				</main>
{{--            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
				{{ $slot }}
			</div>--}}
		</div>
	</body>
</html>
