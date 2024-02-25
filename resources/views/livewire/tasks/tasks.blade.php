<div class="grid grid-cols-12">
    {{-- tasks section --}}
    <div class="col-span-12 md:col-span-6 md:col-start-4 my-5">

        <livewire:tasks.task-index>
        <livewire:tasks.tasks-list :tasks="$tasks" />

    </div>
</div>
