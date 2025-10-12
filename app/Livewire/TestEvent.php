<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class TestEvent extends Component
{
    #[On('book-created')]
    public function updateBookList($book)
    {
        Log::info('This is from TestEvent component for book id: '.$book['id']);
    }

    public function render()
    {
        return view('livewire.test-event');
    }
}
