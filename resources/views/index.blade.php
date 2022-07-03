<x-home-layout>
    <div class="py-12">
        <div class="max-w-5xl xl:max-w-7xl mx-auto px-6 sm:px-6 lg:px-8">
            <nav class="flex justify-center items-center flex-wrap mb-8">
                <a href="{{ route('home') }}" class="block lowercase py-2 px-4 hover:underline
                    {{ !$categoryFilter ? 'font-semibold text-stone-900' : 'text-stone-500' }}">All</a>
                @foreach ($categories as $category)
                    <a href="{{ route('home') . '?category=' . strtolower($category->name) }}" class="block lowercase py-2 px-4 hover:underline hover:text-stone-700
                        {{ $categoryFilter == strtolower($category->name) ? 'font-semibold text-stone-900' : 'text-stone-500' }}">{{ $category->name }}</a>
                @endforeach
            </nav>

            <div class="masonry-grid">
                @forelse ($images as $image)
                <div class="masonry-grid__item p-1 md:p-1 lg:p-2 xl:p-3 w-1/2 md:w-1/3 lg:w-1/4">
                    <img src="{{ Storage::url($image->url_md) }}" alt="" class="w-full h-auto">
                </div>
                @empty
                    <p class="text-center">No images to show.</p>
                @endforelse
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

