<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Component;

class HelloWorld extends Component
{
    public $name = '';

    public $firstName = '';

    public $lastName = '';

    public function mount($firstName, $lastName)
    {
        // Log::info('This is from `MOUNT` at '.now());

        $this->name = $firstName.' '.$lastName;
    }

    public function render()
    {
        // Log::info('This is from `RENDER` at '.now());

        return view('livewire.hello-world');
    }
}
