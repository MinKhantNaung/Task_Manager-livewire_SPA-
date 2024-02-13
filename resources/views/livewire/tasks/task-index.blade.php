<div>
    <div class="grid grid-cols-12">
        {{-- grid col logic like bootstrap// -> col-span-6 means col-6 in bootstrap / col-start-4 means offset-3 in
        bootstrap --}}
        <div class="col-span-12 md:col-span-6 md:col-start-4 lg:col-span-4 lg:col-start-5 my-2">
            <h1 class="font-extrabold text-lg">Tasks</h1>

            <form wire:submit.prevent='saveTask' method="POST">
                <div class="mb-3">
                    <label for="title">Title</label> <br>
                    <input wire:model.live='form.title' type="text"
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

                <button class="rounded bg-indigo-800 hover:bg-indigo-600 text-gray-100 p-2">Submit</button>
            </form>

        </div>
    </div>
</div>
