<?php

namespace App\Livewire\Tasks;

use Livewire\Component;
use Livewire\WithPagination;

class TasksList extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.tasks.tasks-list', [
            'tasks' => auth()->user()->tasks()->orderBy('id', 'desc')->paginate(5)
        ]);
    }
}
