<?php

namespace App\Livewire\Tasks;

use App\Livewire\Forms\TaskForm;
use App\Livewire\LivewireHelper;
use Livewire\Component;

class TaskIndex extends Component
{
    public TaskForm $form;

    public function saveTask()
    {
        $this->validate();
        $this->form->createTask();
        $this->dispatch('task-created', ['title' => $this->form->title]); // you can also give like 'title : $this->form->title'
        $this->form->reset();
    }

    public function clearSession()
    {
        (new LivewireHelper)->clearSession();
    }

    public function render()
    {
        return view('livewire.tasks.task-index');
    }
}
