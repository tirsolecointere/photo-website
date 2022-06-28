<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Tirso Lecointere | Photography') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class="bg-stone-50 font-mono antialiased pb-8">
        {{-- edges --}}
        <div class="fixed right-0 h-full w-4 lg:w-8 bg-black z-50 pointer-events-none"></div>
        <div class="fixed left-0 h-full w-4 lg:w-8 bg-black z-50 pointer-events-none"></div>
        <div class="fixed bottom-0 w-full h-4 lg:h-8 bg-black z-50 pointer-events-none"></div>
        <div class="fixed top-0 w-full h-4 lg:h-8 bg-black z-50 pointer-events-none"></div>

        <nav class="flex items-center justify-center bg-stone-50/90 backdrop-blur-md backdrop-saturate-200 py-2 lg:py-4 mx-4 lg:mx-8 mt-8 h-16 lg:h-24 fixed top-0 right-0 left-0 w-100 z-40">
            <div class="flex-grow mx-auto px-4 lg:px-8 flex md:justify-between items-center gap-4">
                <div>
                    <button class="flex w-10 h-10 justify-center items-center bg-stone-900 hover:bg-stone-700 rounded-full text-white outline-none focus:ring-1 ring-offset-2 ring-stone-400">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 7a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 13a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <h1 class="font-bold text-2xl leading-5 text-center uppercase absolute left-1/2 -translate-x-1/2">
                    <a href="{{ route('home') }}" class="block">Tirso<br>Lecointere</a>
                </h1>
                <div class="hidden md:block">
                    <a href="javascript:void(0)" class="block bg-stone-900 hover:bg-stone-700 text-white text-sm py-3 px-4 md:px-6 rounded-full outline-none focus:ring-1 ring-offset-2 ring-stone-400">get in touch</a>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <main class="pt-16 lg:pt-24">
            {{ $slot }}
        </main>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/custom.js') }}"></script>

        {{ $custom_js }}
    </body>
</html>
