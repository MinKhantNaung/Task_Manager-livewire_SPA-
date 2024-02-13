<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Attributes\Validate;
use Livewire\Component;

class TaskIndex extends Component
{
    #[Validate('required|min:5|max:30|string')]
    public $title;

    #[Validate('required|min:5|max:30|string')]
    public $slug;

    #[Validate('required|min:20|string')]
    public $description;

    #[Validate('required')]
    public $status;

    #[Validate('required')]
    public $priority;

    #[Validate('required|date')]
    public $deadline;

    public function saveTask()
    {
        $this->validate();

        Task::create([
            'user_id' => auth()->user()->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'status' => $this->status,
            'priority' => $this->priority,
            'deadline' => $this->deadline
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.tasks.task-index')
            ->layout('layouts.app');
    }
}
