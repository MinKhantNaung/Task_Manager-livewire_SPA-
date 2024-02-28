<?php

namespace App\Livewire\Tasks;

use Livewire\Component;

class Search extends Component
{
    public $search = '';

    public function render()
    {
        $results = [];

        if($this->search) {
            $results = auth()->user()->tasks()->where('title', 'LIKE', '%' . $this->search . '%')->get();
        }

        return view('livewire.tasks.search', compact('results'));
    }
}
