@props([
    'withLink',
    'linkText',
    'linkRoute',
])

<header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-stone-800 leading-tight">
                {{ $text }}
            </h2>
            @if ($withLink == 'true')
                <a href="{{ route($linkRoute) }}" class='inline-flex items-center px-4 py-2 bg-stone-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-stone-700 active:bg-stone-900 focus:outline-none focus:border-stone-900 focus:ring ring-stone-300 disabled:opacity-25 transition ease-in-out duration-150'>
                    {{ $linkText }}
                </a>
            @endif
        </div>
    </div>
</header>
