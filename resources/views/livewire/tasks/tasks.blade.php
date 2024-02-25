<div class="grid grid-cols-12 gap-5">
    {{-- tasks section --}}
    <div class="col-span-12 md:col-span-4 md:col-start-3 my-5 px-2">
        <livewire:tasks.tasks-list :tasks="$tasks" />
    </div>
    <div class="col-span-12 md:col-span-4 my-5 px-2">
        <livewire:tasks.task-index>
    </div>
</div>
