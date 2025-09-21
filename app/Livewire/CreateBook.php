<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CreateBook extends Component
{
    #[Validate('required|string|min:3|max:255')]
    public $title = '';

    #[Validate('required|string|min:3|max:255')]
    public $author = '';

    public function createBook()
    {
        $this->validate();

        sleep(5);

        Book::create([
            'title' => $this->title,
            'author' => $this->author,
        ]);

        $this->title = '';
        $this->author = '';

        $this->dispatch('book-created');
    }

    public function render()
    {
        return view('livewire.create-book');
    }
}
