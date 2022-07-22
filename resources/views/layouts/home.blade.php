<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <meta name="description" content="I'm a landscape photographer based in Valencia, Venezuela. These shots represent a fraction of stunning places I have visited.">
        <meta name="robots" content="index, follow">

        <meta property="og:url" content="https://tirsophotos.com">
        <meta property="og:title" content="Tirso Lecointere - Landscape Photography">
        <meta property="og:discription" content="I'm a landscape photographer based in Valencia, Venezuela. These shots represent a fraction of stunning places I have visited.">
        <meta property="og:site_name" content="Tirso Lecointere" />
        <meta property="og:type" content="website" />
        <meta property="og:image" content="{{ asset('assets/images/meta_image.jpg') }}">

        <title>{{ config('app.name', 'Tirso Lecointere | Landscape Photography') }}</title>

        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('favicon-32x32.png') }}" type="image/png" sizes="32x32">
        <link rel="icon" href="{{ asset('favicon-16x16.png') }}" type="image/png" sizes="16x16">

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="https://unpkg.com/photoswipe@5.2.2/dist/photoswipe.css" />
        <link rel="stylesheet" href="{{ asset('css/app.css') . '?v=0.0.1' }}">
    </head>
    <body class="h-full bg-stone-100 text-stone-900 font-mono antialiased pb-8">
        {{-- edges --}}
        <div class="fixed right-0 h-full w-4 lg:w-8 bg-black z-30 pointer-events-none"></div>
        <div class="fixed left-0 h-full w-4 lg:w-8 bg-black z-30 pointer-events-none"></div>
        <div class="fixed bottom-0 w-full h-4 lg:h-8 bg-black z-30 pointer-events-none"></div>
        <div class="fixed top-0 w-full h-4 lg:h-8 bg-black z-30 pointer-events-none"></div>

        <nav class="flex items-center justify-center bg-stone-100/90 backdrop-blur-md backdrop-saturate-200 py-2 lg:py-4 mx-4 lg:mx-8 mt-4 lg:mt-8 h-16 lg:h-24 fixed top-0 right-0 left-0 w-100 z-50">
            <div class="flex-grow mx-auto px-4 lg:px-8 flex justify-between items-center gap-4">
                <div>
                    <button id="menu-toggler" type="button" class="flex w-10 h-10 justify-center items-center bg-stone-900 hover:bg-stone-700 rounded-full text-white outline-none focus:ring-1 ring-offset-2 ring-stone-400 rotate-0 transition-transform duration-[750ms]" title="Toggle menu">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M3 7a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 13a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
                <h1 class="font-bold text-lg lg:text-2xl !leading-5 text-center uppercase absolute left-1/2 -translate-x-1/2" title="{{ config('app.name', 'Tirso Lecointere | Landscape Photography') }}">
                    <a href="{{ route('home') }}" class="block">Tirso<br>Lecointere</a>
                </h1>
                <div>
                    <a href="mailto:hello@tirsophotos.com" class="hidden md:block bg-stone-900 hover:bg-stone-700 text-white text-sm py-3 px-4 md:px-6 rounded-full outline-none focus:ring-1 ring-offset-2 ring-stone-400" title="Send email">get in touch</a>
                    <a href="mailto:hello@tirsophotos.com" class="flex md:hidden w-10 h-10 justify-center items-center bg-stone-900 hover:bg-stone-700 rounded-full text-white outline-none focus:ring-1 ring-offset-2 ring-stone-400" title="Send email">
                        <svg xmlns="http://www.w3.org/2000/svg" class="inline md:hidden h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
                            <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                        </svg>
                    </a>
                </div>
            </div>
        </nav>

        <!-- Offcanvas Menu -->
        <div id="offcanvas-menu" class="fixed top-0 left-0 w-full h-screen flex items-center justify-center bg-stone-100 p-8 z-40 opacity-0 invisible transition-all duration-[750ms]">

            <div class="absolute inset-x-0 bottom-0 w-full h-[65vh] lg:h-[85vh] overflow-hidden select-none pointer-events-none">
                <img src="{{ asset('assets/images/menu_bg.jpg') }}" class="offcanvas-menu__bg w-full h-full object-cover object-[25%_bottom] transition-transform ease-out scale-110 duration-[3s]" alt="menu background photo">
            </div>
            <div class="absolute inset-x-0 bottom-[18%] top-[35vh] lg:top-[15vh] bg-gradient-to-b from-stone-100 to-transparent pointer-events-none"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-transparent to-stone-100 pointer-events-none"></div>

            <div class="offcanvas-menu__content text-center transition-all duration-[1s]">
                <p class="block text-lg md:text-2xl">I’m a <b>landscape photographer</b> based in <b>valencia, venezuela</b>.</p>
                <ul class="flex flex-col md:flex-row justify-center flex-wrap gap-4 md:gap-6 mt-8">
                    <li class="block">
                        <a href="https://www.instagram.com/tirsolecointere/" target="_blank" class="block md:text-xl text-stone-900 hover:text-stone-500 lowercase whitespace-nowrap hover:underline" title="Go to Instagram">
                            Instagram
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" /><path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" /></svg>
                        </a>
                    </li>
                    <li class="block">
                        <a href="https://www.twitter.com/tirsolecointere/" target="_blank" class="block md:text-xl text-stone-900 hover:text-stone-500 lowercase whitespace-nowrap hover:underline" title="Go to Twitter">
                            Twitter
                            <svg xmlns="http://www.w3.org/2000/svg" class="inline h-5 w-5" viewBox="0 0 20 20" fill="currentColor"><path d="M11 3a1 1 0 100 2h2.586l-6.293 6.293a1 1 0 101.414 1.414L15 6.414V9a1 1 0 102 0V4a1 1 0 00-1-1h-5z" /><path d="M5 5a2 2 0 00-2 2v8a2 2 0 002 2h8a2 2 0 002-2v-3a1 1 0 10-2 0v3H5V7h3a1 1 0 000-2H5z" /></svg>
                        </a>
                    </li>
                    <li class="block">
                        <a href="mailto:hello@tirsophotos.com" class="block md:text-xl text-stone-900 hover:text-stone-500 lowercase whitespace-nowrap hover:underline" title="Send email">
                            Email
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
        <!-- App -->
        <script src="{{ asset('js/app.js') }}"></script>

        <!-- Plugins -->
        <script src="https://unpkg.com/imagesloaded@5/imagesloaded.pkgd.min.js"></script>
        <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>

        <!-- Global Js -->
        <script src="{{ asset('js/custom.js') }}"></script>

        {{ $custom_js }}
    </body>
</html>
