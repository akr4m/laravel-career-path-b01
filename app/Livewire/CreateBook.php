<?php

namespace App\Livewire;

use App\Livewire\Forms\BookForm;
use Livewire\Component;

class CreateBook extends Component
{
    public BookForm $form;

    public function createBook()
    {
        $book = $this->form->create();

        $this->dispatch('book-created', $book->id)->to(BookIndex::class);
    }

    public function render()
    {
        return view('livewire.create-book');
    }
}
