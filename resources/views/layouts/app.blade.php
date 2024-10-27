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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
        <link rel="stylesheet" href="{{asset('libraries/lightbox/css/lightbox.min.css')}}">
        <link rel="stylesheet" href="{{asset('libraries/toastr/toastr.min.css')}}">

        <link rel="shortcut icon" href="{{ asset('sistem/img/favicon.png') }}">
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-purple-100">

            @include('layouts.includes.sidebarFlowbite')

            <!-- Page Content -->
            <main class="p-4 sm:ml-64 pt-20 min-h-full">
                {{ $slot }}
            </main>
    
        </div>
        @livewireScripts
        <!-- libs -->
        <script src="{{asset('libraries/jquery/jquery.min.js')}}"  ></script>
        <script src="{{asset('libraries/flowbite/flowbite.min.js')}}"  ></script>
        <script src="{{asset('libraries/lightbox/js/lightbox.min.js')}}"  ></script>
        <script src="{{asset('libraries/sweetalert2/sweetalert2.all.min.js')}}"  ></script>
        <script src="{{asset('libraries/toastr/toastr.min.js')}}"  ></script>

        @stack('modals')
        @stack('scripts')


    </body>
</html>
