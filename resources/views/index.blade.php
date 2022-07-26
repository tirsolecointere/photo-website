<x-home-layout>
    <div class="py-12">
        <div class="max-w-5xl xl:max-w-7xl mx-auto px-6 sm:px-6 lg:px-8">
            <nav class="flex justify-center items-center flex-wrap mb-8">
                <a href="{{ route('home') }}" class="block lowercase py-2 px-4 hover:underline
                    {{ !$categoryFilter ? 'font-semibold text-stone-900' : 'text-stone-500' }}">All</a>
                @foreach ($categories as $category)
                    <a href="{{ route('home') . '?category=' . strtolower($category->name) }}" class="block lowercase py-2 px-4 hover:underline hover:text-stone-700
                        {{ $categoryFilter == strtolower($category->name) ? 'font-semibold text-stone-900' : 'text-stone-500' }}">
                        {{ $category->name }}
                    </a>
                @endforeach
            </nav>

            <div class="masonry-grid pswp-gallery" id="my-gallery">
                @forelse ($images as $image)
                <div class="masonry-grid__item p-1 md:p-1 lg:p-2 xl:p-3 w-1/2 md:w-1/3 lg:w-1/4">
                    <a href="{{ Storage::url($image->url_lg) }}" target="_blank" class="block"
                            data-pswp-width="{{ getImageSize(Storage::url($image->url_lg))[0] }}"
                            data-pswp-height="{{ getImageSize(Storage::url($image->url_lg))[1] }}">

                        <img src="{{ Storage::url($image->url_md) }}" alt="" class="w-full h-auto">
                    </a>
                </div>
                @empty
                    <p class="text-center">No images to show.</p>
                @endforelse
            </div>
        </div>
    </div>

    <x-slot name='custom_js'>
        <script>
            var elem = document.querySelector('.masonry-grid');
            var msnry = new Masonry(elem, {
                itemSelector: '.masonry-grid__item',
                columnWidth: 0
            });

            imagesLoaded(elem, function() {
                msnry.layout()
            })
        </script>

        <script type="module">
            import PhotoSwipeLightbox from '/js/photoswipe-lightbox.esm.min.js';

            const lightbox = new PhotoSwipeLightbox({
                gallery: '#my-gallery',
                children: 'a',
                pswpModule: () => import('/js/photoswipe.esm.min.js'),
                padding: { top: 20, bottom: 20, left: 0, right: 0 }
            });

            lightbox.init();
        </script>
    </x-slot>
</x-home-layout>

