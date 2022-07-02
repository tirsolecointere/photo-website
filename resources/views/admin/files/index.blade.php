<x-app-layout>
    <x-slot name="header">
        <x-page-header withLink="true" linkText="New Image" linkRoute="admin.files.create">
            <x-slot name="text">Manage Gallery</x-slot>
        </x-page-header>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-xl">Uploaded images</h1>
                </div>

                <div class="divide-y divide-slate-400/20 text-sm leading-5 text-slate-900">
                @foreach ($files as $image)
                    <div class="flex items-center justify-between p-4">
                        <img src="{{ Storage::url($image->url_th) }}" alt="" class="h-20 w-20 object-cover flex-none rounded-lg">
                        <div class="ml-4 flex-auto">
                            <div class="font-medium">{{ $image->created_at }}</div>
                            <div class="mt-1 text-slate-400 uppercase font-medium text-xs">Showing : <span class="text-green-400">true</span></div>
                            <div class="mt-1 text-slate-400">by : {{ $image->user->name }}</div>
                            @if (count($image->categories) > 0)
                                <div class="mt-1 text-slate-400 font-medium">Categories :
                                    @foreach ($image->categories as $category)
                                        <span class="font-bold">{{ $category->name }}</span>
                                        @if (!$loop->last) , @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.files.edit', $image) }}" class="flex-none rounded-md py-2 px-2 font-medium text-slate-700 shadow-sm border border-slate-700/10 hover:bg-slate-50">
                                Edit
                            </a>
                            <form action="{{ route('admin.files.destroy', $image->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="flex-none rounded-md py-2 px-2 font-medium text-red-500 shadow-sm border border-slate-700/10 hover:bg-red-50/50">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
