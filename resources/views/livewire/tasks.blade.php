<div>
    <h1>Tasks</h1>

    <div class="flex">
        <input type="text" wire:model="task" wire:keyup.enter.prevent='add' placeholder="Enter task" class="w-[100%] rounded-md">

        <button wire:click="add" class="bg-indigo-500 p-2 m-2 border-md rounded-md text-gray-200">Add</button>
    </div>

    <ul>
        @foreach ($tasks as $task)
            <li>{{ $task }}</li>
        @endforeach
    </ul>
</div>
