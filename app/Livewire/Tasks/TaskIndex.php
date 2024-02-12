<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Component;

class TaskIndex extends Component
{
    public $title;
    public $slug;
    public $description;
    public $status;
    public $priority;
    public $deadline;

    public function saveTask()
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

        $this->reset();
    }

    public function render()
    {
        return view('livewire.tasks.task-index')
            ->layout('layouts.app');
    }
}
