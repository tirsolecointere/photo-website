<x-app-layout>
    <x-slot name="header">
        <x-page-header withLink="false" linkText="New Category" linkRoute="admin.categories">
            <x-slot name="text">Manage Categories</x-slot>
        </x-page-header>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <livewire:admin.category>
            </div>
        </div>
    </div>
</x-app-layout>
