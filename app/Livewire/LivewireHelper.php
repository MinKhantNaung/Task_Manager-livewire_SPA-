<?php

namespace App\Livewire;

use Livewire\Component;

class LivewireHelper extends Component
{
    public function clearSession()
    {
        $messages = session()->get('messages');

        if (isset($messages['success'])) {
            session()->forget('messages.success');
        }

        if (isset($messages['error'])) {
            session()->forget('messages.error');
        }
    }
}
