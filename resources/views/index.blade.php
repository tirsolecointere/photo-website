<x-home-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-6 sm:px-6 lg:px-8">
            <nav class="flex justify-center items-center flex-wrap mb-8">
                <a href="javascript:void(0)" class="block lowercase py-2 px-4 hover:underline font-semibold text-stone-900">All</a>
                <a href="javascript:void(0)" class="block lowercase py-2 px-4 hover:underline hover:text-stone-700 text-stone-500">Cityscape</a>
                <a href="javascript:void(0)" class="block lowercase py-2 px-4 hover:underline hover:text-stone-700 text-stone-500">Mountain</a>
                <a href="javascript:void(0)" class="block lowercase py-2 px-4 hover:underline hover:text-stone-700 text-stone-500">Minimalist</a>
                <a href="javascript:void(0)" class="block lowercase py-2 px-4 hover:underline hover:text-stone-700 text-stone-500">Other</a>
            </nav>

            <div class="masonry-grid">
                @foreach ($images as $image)
                <div class="masonry-grid__item float-left p-1 md:p-3 w-1/2 md:w-1/3 lg:w-1/4">
                    <img src="{{ $image->url_md }}" alt="" class="w-full h-auto">
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <x-slot name='custom_js'>
        <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
        <script>
            var elem = document.querySelector('.masonry-grid');
            var msnry = new Masonry(elem, {
                itemSelector: '.masonry-grid__item',
                columnWidth: 0
            });
        </script>
    </x-slot>
</x-home-layout>

