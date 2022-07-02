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
                    <h1 class="text-xl mb-5">Vista <b>create</b> de <b>files</b></h1>

                    <form action="{{ route('admin.files.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file" accept="image/*">

                        @error('file')<div><span class="text-red-500 text-sm">{{ $message }}</span></div>@enderror

                        <div class="mt-5">
                            <x-button>Upload image</x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
