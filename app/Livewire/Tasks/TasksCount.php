<?php

namespace App\Livewire\Tasks;

use Livewire\Component;

class TasksCount extends Component
{
    public $count;

    public function render()
    {
        return view('livewire.tasks.tasks-count');
    }
}
