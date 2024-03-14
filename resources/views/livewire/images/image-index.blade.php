<div class="grid grid-cols-12 gap-5">
    <div class="col-span-12 lg:col-span-8 lg:col-start-3">
        <div class="mb-5 flex flex-col text-center">

            @if (session('success'))
                <div id="alert-5" class="flex items-center p-4 rounded-lg bg-gray-50 dark:bg-gray-800" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4 dark:text-gray-300" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="ms-3 text-sm font-medium text-gray-800 dark:text-gray-300">
                        {{ session('success') }}
                    </div>
                    <button wire:click.prevent="clearSession" type="button"
                        class="ms-auto -mx-1.5 -my-1.5 bg-gray-50 text-gray-500 rounded-lg focus:ring-2 focus:ring-gray-400 p-1.5 hover:bg-gray-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-gray-300 dark:hover:bg-gray-700 dark:hover:text-white"
                        data-dismiss-target="#alert-5" aria-label="Close">
                        <span class="sr-only">Dismiss</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                    </button>
                </div>
            @endif

            <label for="photo" class="my-3 bg-violet-200 rounded-md p-3 text-indigo-500">Upload Image</label>

            @if ($photo)
                <img class="rounded-full w-96 h-96" src="{{ $photo->temporaryUrl() }}" alt="image description">
            @endif

            <input wire:model.live='photo' type="file"
                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                id="photo">
            @error('photo')
                <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                    role="alert">
                    <span class="font-medium">{{ $message }}</span>
                </div>
            @enderror
            <button wire:click.prevent='save' class="bg-teal-500 text-white rounded-md p-3">
                Save
            </button>
        </div>
    </div>
</div>
