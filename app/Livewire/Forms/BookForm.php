<?php

namespace App\Livewire\Forms;

use App\Models\Book;
use Livewire\Attributes\Validate;
use Livewire\Form;

class BookForm extends Form
{
    public ?Book $book;

    #[Validate('required|string|min:3|max:255')]
    public $title = '';

    #[Validate('required|string|min:3|max:255')]
    public $author = '';

    public function setBook(Book $book)
    {
        $this->book = $book;

        $this->fill($book->only('title', 'author'));

        // $this->fill([
        //     'title' => $book->title,
        //     'author' => $book->author,
        // ]);

        // $this->title = $book->title;
        // $this->author = $book->author;
    }

    public function create()
    {
        $this->validate();

        $book = Book::create([
            'title' => $this->title,
            'author' => $this->author,
        ]);

        $this->reset();

        return $book;
    }

    public function update()
    {
        // if (! $this->book) {
        //     throw new \Exception('No book set for update.');
        // }

        $this->validate();

        $this->book->update([
            'title' => $this->title,
            'author' => $this->author,
        ]);

        return $this->book;
    }
}
