<?php

namespace App\Livewire\Tasks;

use Livewire\Attributes\On;
use Livewire\Component;

class Tasks extends Component
{
    #[On('task-created')]

    public function test($title)
    {
        dd($title);
    }

    public function render()
    {
        $tasks = auth()->user()->tasks()->orderBy('id', 'desc')->get();

        return view('livewire.tasks.tasks', [
            'tasks' => $tasks
        ]);
    }
}
