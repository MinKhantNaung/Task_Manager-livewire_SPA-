<div>
    <div class="grid grid-cols-12">
        {{-- tasks section --}}
        <div class="col-span-12 md:col-span-6 md:col-start-4 my-5">
            <div class="py-5">
                <a wire:navigate href="{{ route('tasks.create') }}"
                    class="float-right bg-indigo-400 text-gray-100 p-2 rounded-md">+ Add Task</a>
            </div>

            @foreach ($tasks as $task)
                <a href="#" class="flex flex-col items-center bg-white border border-gray-200 my-10 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                    <div class="flex flex-col justify-between p-4 leading-normal">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $task->title }}
                        </h5>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                            {{ $task->description }}
                        </p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</div>
