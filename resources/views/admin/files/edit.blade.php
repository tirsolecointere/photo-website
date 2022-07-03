<x-app-layout>
    <x-slot name="header">
        <x-page-header withLink="true" linkText="New Image" linkRoute="admin.files.create">
            <x-slot name="text">Manage Gallery</x-slot>
        </x-page-header>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-stone-200">
                    <h1 class="text-xl font-bold mb-5">Upload new file</h1>

                    {!! Form::model($file, ['route' => ['admin.files.update', $file->id], 'method' => 'PUT', 'files' => true]) !!}

                        @isset($file->url_th)
                            <div class="bg-stone-50 p-4 shadow rounded-lg lg:w-1/2">
                                <h6 class="font-bold mb-1">Actual file:</h6>
                                <img src="{{ Storage::url($file->url_th) }}" alt="">
                            </div>
                        @endisset

                        <div class="pt-4">
                            <div class="mb-1">
                                {!! Form::label('file', 'Select your new file', ['class' => 'inline-block font-bold']) !!}
                                @error('file')<div><small class="font-bold text-red-600 text-sm">{{ $message }}</small></div>@enderror
                            </div>
                            {!! Form::file('file', ['id' => 'file', 'accept' => 'image/*']) !!}
                        </div>

                        <div class="pt-4">
                            <div class="mb-3">
                                <h6 class="font-bold">Select new file categories</h6>
                                @error('categories')<div><small class="font-bold text-red-600 text-sm">{{ $message }}</small></div>@enderror
                            </div>
                            <div class="space-y-2">
                                @foreach ($categories as $category)
                                    <div>
                                        {!! Form::checkbox('categories[]', $category->id, null, ['id' => 'cat-label-' . $category->id, 'class' => 'form-check-input appearance-none h-4 w-4 border border-stone-300 rounded-sm bg-white checked:bg-blue-600 checked:border-blue-600 focus:outline-none transition duration-200 mt-1 align-top bg-no-repeat bg-center bg-contain float-left mr-2 cursor-pointer']) !!}
                                        {!! Form::label('cat-label-' . $category->id, $category->name, ['class'=> 'form-check-label inline-block']) !!}
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="py-4">
                            <x-button>Upload image</x-button>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
