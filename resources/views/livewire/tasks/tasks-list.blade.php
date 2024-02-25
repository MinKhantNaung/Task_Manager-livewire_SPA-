<div>

    @foreach ($tasks as $task)
        <a href="#"
            class="flex flex-col items-center bg-white border border-gray-200 my-10 rounded-lg shadow md:flex-row hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
            <div class="p-4 leading-normal">
                <div class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                    <div>{{ $task->title }}</div>
                    <div class="text-base font-light">
                        {{ \Carbon\Carbon::parse($task->deadline)->format('d M Y') }} /
                        {{ \Carbon\Carbon::parse($task->deadline)->diffForHumans() }}</div>
                </div>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                    {{ $task->description }}
                </p>
            </div>
        </a>
    @endforeach

</div>
