<?php

namespace App\Livewire\Forms;

use App\Models\Task;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Form;

class TaskForm extends Form
{
    public ?Task $task;
    public $editMode = false;

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

    public function setTask(Task $task)
    {
        // set task
        $this->task = $task;

        $this->editMode = true;
        $this->title = $task->title;
        $this->slug = $task->slug;
        $this->description = $task->description;
        $this->status = $task->status;
        $this->priority = $task->priority;
        $this->deadline = $task->deadline;
    }

    public function createTask()
    {
        if ($this->editMode) {
            $this->task->update([
                'user_id' => auth()->user()->id,
                'title' => $this->title,
                'slug' => $this->slug,
                'description' => $this->description,
                'status' => $this->status,
                'priority' => $this->priority,
                'deadline' => $this->deadline
            ]);

            session()->flash('success', 'Task updated successfully !');
        } else {
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
}
