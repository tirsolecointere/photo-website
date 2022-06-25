<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-xl">Vista <b>index</b> de <b>files</b></h1>
                </div>

                <div class="p-6">
                    @foreach ($files as $image)
                        <img src="{{ $image->url }}" alt="" class="inline-block h-auto max-w-xs mr-4 mb-4">
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
