<?php

namespace App\Livewire\Tasks;

use Livewire\Component;

class TasksList extends Component
{
    public function render()
    {
        return view('livewire.tasks.tasks-list', [
            'tasks' => auth()->user()->tasks()->orderBy('id', 'desc')->paginate(3)
        ])->layout('layouts.app');
    }
}
