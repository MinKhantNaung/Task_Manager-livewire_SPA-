<div class="grid grid-cols-12 gap-5">
    <div class="col-span-12 lg:col-span-4 lg:col-start-3 my-5 px-2">
        <livewire:tasks.tasks-count :$count />

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
