<div class="grid grid-cols-12 gap-5">

    <div class="col-span-12 lg:col-span-8 lg:col-start-3">
        <livewire:tasks.search />
    </div>

    <div class="col-span-12 lg:col-span-4 lg:col-start-3 my-5 px-2">
        <livewire:tasks.tasks-count :tasksByStatus='$this->tasksByStatus' />

        @foreach ($tasks as $index => $task)
            <a href="#"
                class="flex flex-col items-start bg-white border border-gray-200 my-10 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                <div class="p-4 leading-normal">
                    <div class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                        <div>{{ $index + $tasks->firstItem() }}. {{ $task->title }}</div>
                        <div class="text-base font-light">
                            {{ \Carbon\Carbon::parse($task->deadline)->format('d M Y') }} /
                            {{ \Carbon\Carbon::parse($task->deadline)->diffForHumans() }}</div>
                    </div>
                    <div class="text-wrap break-all">
                        {{ $task->description }}
                    </div>

                    <div class="flex flex-wrap mt-2">
                        <div class="flex items-center me-4">
                            <input wire:click='changeStatus({{ $task->id }}, "started")'
                                {{ $task->status == 'started' ? 'checked' : '' }} id="red-radio{{ $task->id }}"
                                type="radio" value="started" name="status{{ $task->id }}"
                                class="w-4 h-4 text-red-600 bg-gray-100 border-gray-300 focus:ring-red-500 dark:focus:ring-red-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="red-radio{{ $task->id }}"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">STARTED</label>
                        </div>
                        <div class="flex items-center me-4">
                            <input wire:click='changeStatus({{ $task->id }}, "in_progress")'
                                {{ $task->status == 'in_progress' ? 'checked' : '' }}
                                id="purple-radio{{ $task->id }}" type="radio" value="in_progress"
                                name="status{{ $task->id }}"
                                class="w-4 h-4 text-purple-600 bg-gray-100 border-gray-300 focus:ring-purple-500 dark:focus:ring-purple-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="purple-radio{{ $task->id }}"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">IN PROGRESS</label>
                        </div>
                        <div class="flex items-center me-4">
                            <input wire:click='changeStatus({{ $task->id }}, "done")'
                                {{ $task->status == 'done' ? 'checked' : '' }} id="teal-radio{{ $task->id }}"
                                type="radio" value="done" name="status{{ $task->id }}"
                                class="w-4 h-4 text-teal-600 bg-gray-100 border-gray-300 focus:ring-teal-500 dark:focus:ring-teal-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="teal-radio{{ $task->id }}"
                                class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">DONE</label>
                        </div>
                    </div>
                </div>
            </a>
        @endforeach

        <div class="max-w-[100%]">
            {{ $tasks->links(data: ['scrollTo' => false]) }}
        </div>
    </div>

    <div class="col-span-12 lg:col-span-4 my-5 px-2">
        <livewire:tasks.task-index>
    </div>
</div>
