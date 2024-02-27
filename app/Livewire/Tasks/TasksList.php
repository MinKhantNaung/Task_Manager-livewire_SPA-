<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class TasksList extends Component
{
    use WithPagination;

    public function placeholder()
    {
        return view('components.loader');
    }

    public function changeStatus($id, $status)
    {
        $task = Task::find($id);

        $task->update([
            'status' => $status
        ]);
    }

    #[On('task-created')]

    public function render()
    {
        return view('livewire.tasks.tasks-list', [
            'tasks' => auth()->user()->tasks()->orderBy('id', 'desc')->paginate(4),
            'tasksByStatus' => auth()->user()->tasks()->select('status', DB::raw('Count(*) as count'))
                ->groupBy('status')
                ->orderByRaw("FIELD(status, 'started', 'in_progress', 'done')")
                ->get()
        ]);
    }
}
