<div class="divide-y divide-stone-400/20">
    <div class="p-6">
        <form wire:submit.prevent="store" autocomplete="off" spellcheck="false">
            <x-label for="name" class="mb-2" :value="__('New category:')" />
            <div class="flex gap-2">
                <x-input wire:model.lazy="name" id="name" class="block md:w-1/2 lg:w-1/4" placeholder="Write..." autofocus></x-input>
                <x-button type="submit">Save</x-button>
            </div>
            @error('name')
                <div>
                    <small class="font-medium text-red-600">{{ $message }}</small>
                </div>
            @enderror
        </form>
    </div>
    <div class="p-6">
        {{-- {{$category}} --}}
        @foreach ($categories as $item)
            @if ($category->id != $item->id)
                <div class="flex items-center gap-2">
                    <button wire:click="destroy({{ $item }})" class="text-red-600" title="Delete">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button wire:click="edit({{ $item }})" class="text-indigo-600 mr-2" title="Edit">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <span class="flex-grow">{{ $item->name }}</span>
                </div>
            @else
                {{-- edit form --}}
                <form wire:submit.prevent="update" class="flex items-center gap-2 my-4">
                    <button type="button" class="text-red-600 disabled:opacity-25" title="Delete" disabled>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <button type="button" class="text-indigo-600 disabled:opacity-25 mr-2" title="Edit" disabled>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    <div>
                        <input type="text" wire:model.defer="category.name" class="rounded-md shadow-sm border border-stone-200 focus:border-indigo-400 focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50 p-1">
                        @error('category.name')
                            <div>
                                <small class="font-medium text-red-600">{{ $message }}</small>
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="bg-green-300 hover:bg-green-200 px-2">save</button>
                    <button type="button" wire:click="cancel()" class="hover:bg-stone-50 px-2">cancel</button>
                </form>
            @endif
        @endforeach
    </div>
</div>
