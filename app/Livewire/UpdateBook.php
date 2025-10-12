<?php

namespace App\Livewire;

use App\Livewire\Forms\BookForm;
use App\Models\Book;
use Livewire\Component;

class UpdateBook extends Component
{
    public BookForm $form;

    public Book $book;

    public function mount()
    {
        $this->form->setBook($this->book);
    }

    public function updateBook()
    {
        $this->form->update();

        $this->dispatch("book-updated.{$this->book->id}");
    }

    public function render()
    {
        return view('livewire.update-book');
    }
}
