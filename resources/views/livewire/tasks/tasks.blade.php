<div class="grid grid-cols-12">
    {{-- tasks section --}}
    <div class="col-span-12 md:col-span-6 md:col-start-4 my-5">
        <div class="py-5">
            <a wire:navigate href="{{ route('tasks.create') }}"
                class="float-right bg-indigo-400 text-gray-100 p-2 rounded-md">+ Add Task</a>
        </div>

        <livewire:tasks.tasks-list :tasks="$tasks" />

    </div>
</div>
