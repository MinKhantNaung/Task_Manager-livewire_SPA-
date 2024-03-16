<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Component;
use App\Livewire\Forms\TaskForm;
use App\Livewire\LivewireHelper;
use Livewire\Attributes\On;

class TaskIndex extends Component
{
    public TaskForm $form;

    public function saveTask()
    {
        $this->validate();
        $this->form->createTask();
        $this->dispatch('task-created');
        $this->form->reset();

        // return $this->redirectRoute('tasks.index', navigate: true);
    }

    #[On('edit-task')]
    public function editTask($id)
    {
        $task = Task::findOrFail($id);

        $this->form->setTask($task);
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
