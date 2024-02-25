<?php

namespace App\Livewire\Tasks;

use Livewire\Component;

class Tasks extends Component
{
    public function render()
    {
        $tasks = auth()->user()->tasks()->orderBy('id', 'desc')->get();

        return view('livewire.tasks.tasks');
    }
}
