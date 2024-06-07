<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChatComponent extends Component
{
    public $message = 'Mariana';
    public function render()
    {

        return view('livewire.chat-component');
    }
}
