<!doctype html>
<html class="{{ Preferences::get('theme') === 'Dark' ? 'mode-dark' : 'mode-light' }}" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    @livewireStyles
</head>
<body>
    <div id="app" class="flex flex-col bg-gray-300 dark:bg-gray-900 text-gray-900 dark:text-green-400 min-h-screen">
        @yield('content')
    </div>

    @if(session()->has('message'))
    <x-flash-message type="{{ session()->get('type','success') }}">
        {{ session()->get('message') }}
    </x-flash-message>
    @endif

    @livewireScripts
    @stack('scripts')
</body>
</html>
