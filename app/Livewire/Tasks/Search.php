<?php

namespace App\Livewire\Tasks;

use Livewire\Attributes\Url;
use Livewire\Component;

class Search extends Component
{
    #[Url(as: 'q', history: true)]
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
