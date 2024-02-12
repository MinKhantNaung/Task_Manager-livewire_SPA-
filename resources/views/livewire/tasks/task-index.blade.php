<div>
    <div class="grid grid-cols-12">
        {{-- grid col logic like bootstrap// -> col-span-6 means col-6 in bootstrap / col-start-4 means offset-3 in bootstrap --}}
        <div class="col-span-12 md:col-span-6 md:col-start-4 lg:col-span-4 lg:col-start-5 my-2">
            <h1 class="font-extrabold text-lg">Tasks</h1>

            <form wire:submit.prevent='saveTask' method="POST">
                <div class="mb-3">
                    <label for="title">Title</label> <br>
                    <input wire:model='title' type="text" class="rounded-md w-[100%]" id="title">
                </div>

                <div class="mb-3">
                    <label for="slug">Slug</label> <br>
                    <input wire:model='slug' type="text" class="rounded-md w-[100%]" id="slug">
                </div>

                <div class="mb-3">
                    <label for="description">Description</label> <br>
                    <textarea wire:model='description' class="rounded-md w-[100%]" id="description"></textarea>
                </div>

                <div class="mb-3">
                    <label for="status">Status</label> <br>
                    <select wire:model='status' class="rounded-md w-[100%]" id="status">
                        <option value="">Select status</option>
                        <option value="started">Started</option>
                        <option value="in_progress">In progress</option>
                        <option value="done">Done</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="priority">Priority</label> <br>
                    <select wire:model='priority' class="rounded-md w-[100%]" id="priority">
                        <option value="">Select priority</option>
                        <option value="low">Low</option>
                        <option value="normal">Normal</option>
                        <option value="high">High</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="deadline">Deadline</label> <br>
                    <input wire:model='deadline' type="date" class="rounded-md w-[100%]" id="deadline">
                </div>

                <button class="rounded bg-indigo-800 hover:bg-indigo-600 text-gray-100 p-2">Submit</button>
            </form>

        </div>
    </div>
</div>
