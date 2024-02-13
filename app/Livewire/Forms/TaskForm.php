<?php

namespace App\Livewire\Forms;

use App\Models\Task;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TaskForm extends Form
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

    public function createTask()
    {
        Task::create([
            'user_id' => auth()->user()->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'description' => $this->description,
            'status' => $this->status,
            'priority' => $this->priority,
            'deadline' => $this->deadline
        ]);

        session()->flash('success', 'Task created successfully !');
    }
}
