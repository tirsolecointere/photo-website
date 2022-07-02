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
                    <h1 class="text-xl">Edit image</h1>
                </div>

                <div class="p-6">
                    Edit
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
