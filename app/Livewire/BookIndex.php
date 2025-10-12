<?php

namespace App\Livewire;

use App\Models\Book;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;

class BookIndex extends Component
{
    public $books;

    #[Url]
    public $search = '';

    public function mount()
    {
        if ($this->search) {
            $this->books = Book::query()
                ->whereAny([
                    'title',
                    'author',
                ], 'like', "%{$this->search}%")
                ->latest()
                ->get();
        } else {
            $this->books = Book::latest()->get();
        }
    }

    // protected $listeners = [
    //     'book-created' => '$refresh',
    // ];

    // public function getListeners()
    // {
    //     return [
    //         'book-created' => '$refresh',
    //     ];
    // }

    #[On('book-created')]
    public function updateBookList($bookId)
    {
        $newBook = Book::find($bookId);

        $this->books->prepend($newBook);
    }

    public function deleteBook($bookId)
    {
        $book = Book::find($bookId);

        if ($book) {
            $book->delete();
            $this->books = $this->books->except($bookId);
        }
    }

    public function render()
    {
        return view('livewire.book-index');
    }
}
