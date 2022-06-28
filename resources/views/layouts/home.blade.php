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
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
    </head>
    <body class="bg-stone-100 text-stone-900 font-mono antialiased pb-8">
        {{-- edges --}}
        <div class="fixed right-0 h-full w-4 lg:w-8 bg-black z-30 pointer-events-none"></div>
        <div class="fixed left-0 h-full w-4 lg:w-8 bg-black z-30 pointer-events-none"></div>
        <div class="fixed bottom-0 w-full h-4 lg:h-8 bg-black z-30 pointer-events-none"></div>
        <div class="fixed top-0 w-full h-4 lg:h-8 bg-black z-30 pointer-events-none"></div>

        <nav class="flex items-center justify-center bg-stone-100/90 backdrop-blur-md backdrop-saturate-200 py-2 lg:py-4 mx-4 lg:mx-8 mt-4 lg:mt-8 h-16 lg:h-24 fixed top-0 right-0 left-0 w-100 z-50">
            <div class="flex-grow mx-auto px-4 lg:px-8 flex md:justify-between items-center gap-4">
                <div>
                    <button id="menu-toggler" type="button" class="flex w-10 h-10 justify-center items-center bg-stone-900 hover:bg-stone-700 rounded-full text-white outline-none focus:ring-1 ring-offset-2 ring-stone-400 rotate-0 transition-transform duration-[750ms]" title="toggle menu">
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

        <!-- Offcanvas Menu -->
        <div id="offcanvas-menu" class="fixed inset-0 flex items-center justify-center bg-stone-100 p-8 z-40 opacity-0 invisible transition-all duration-[750ms]">
            <div class="offcanvas-menu__content text-center">
                <p class="block text-lg md:text-2xl">i’m a <b>landscape photographer</b> based in <b>valencia, venezuela</b>.</p>
                <ul class="inline-flex flex-wrap gap-6 mt-8">
                    <li class="block">
                        <a href="" class="block text-stone-900 hover:text-stone-500 lowercase whitespace-nowrap hover:underline">
                            Instagram
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" /><path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" /></svg>
                        </a>
                    </li>
                    <li class="block">
                        <a href="" class="block text-stone-900 hover:text-stone-500 lowercase whitespace-nowrap hover:underline">
                            Twitter
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" /><path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" /></svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

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
