<div>
    <div class="grid grid-cols-12 gap-4">
        {{-- grid col logic like bootstrap// -> col-span-6 means col-6 in bootstrap / col-start-4 means offset-3 in
        bootstrap --}}

        <div class="col-span-12 md:col-span-6 md:col-start-4 lg:col-span-4 lg:col-start-5 my-2">
            <h1 class="font-extrabold text-lg">Tasks</h1>

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

            <form wire:submit.prevent='saveTask' method="POST">
                <div class="mb-3">
                    <label for="title">Title</label> <br>
                    <input wire:model.blur='form.title' type="text"
                        class="rounded-md w-[100%] @error('form.title') border-rose-700 focus:ring-rose-800 focus:border-rose-600 @endif"
                        id="title">
                    @error('form.title')
                        <div>
                            <span class="text-rose-700">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="slug">Slug</label> <br>
                    <input wire:model.live='form.slug' type="text"
                        class="rounded-md w-[100%] @error('form.slug') border-rose-700 focus:ring-rose-800 focus:border-rose-600 @endif"
                        id="slug">
                    @error('form.slug')
                        <div>
                            <span class="text-rose-700">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description">Description</label> <br>
                    <textarea wire:model.live='form.description'
                        class="rounded-md w-[100%] @error('form.description') border-rose-700 focus:ring-rose-800 focus:border-rose-600 @endif"
                        id="description"></textarea>
                    @error('form.description')
                        <div>
                            <span class="text-rose-700">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="status">Status</label> <br>
                    <select wire:model.live='form.status'
                        class="rounded-md w-[100%] @error('form.status') border-rose-700 focus:ring-rose-800 focus:border-rose-600 @endif"
                        id="status">
                        <option value="">Select status</option>
                        <option value="started">Started</option>
                        <option value="in_progress">In progress</option>
                        <option value="done">Done</option>
                    </select>
                    @error('form.status')
                        <div>
                            <span class="text-rose-700">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="priority">Priority</label> <br>
                    <select wire:model.live='form.priority'
                        class="rounded-md w-[100%] @error('form.priority') border-rose-700 focus:ring-rose-800 focus:border-rose-600 @endif"
                        id="priority">
                        <option value="">Select priority</option>
                        <option value="low">Low</option>
                        <option value="normal">Normal</option>
                        <option value="high">High</option>
                    </select>
                    @error('form.priority')
                        <div>
                            <span class="text-rose-700">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="deadline">Deadline</label> <br>
                    <input wire:model.live='form.deadline' type="date"
                        class="rounded-md w-[100%] @error('form.deadline') border-rose-700 focus:ring-rose-800 focus:border-rose-600 @endif"
                        id="deadline">
                    @error('form.deadline')
                        <div>
                            <span class="text-rose-700">{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <button class="flex items-center rounded bg-indigo-800 hover:bg-indigo-600 text-gray-100 p-2">
                    <div wire:loading role="status" class="mr-1">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                            <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                        </svg>
                        <span class="sr-only">Loading...</span>
                    </div>
                    Submit
                </button>
            </form>

        </div>
    </div>
</div>
