<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();

        return view('books.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // ফর্ম ডাটা যাচাই
        $request->validate([
            'title' => 'required',
            'author' => 'required'
        ]);
        // নতুন Book অবজেক্ট তৈরি ও মান সেট করা
        $book = new Book;
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->save();
        // সংরক্ষণ শেষে তালিকার পেজে রিডাইরেক্ট
        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Book::findOrFail($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);
        return view('books.edit', compact('book'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // ফর্ম ডাটা যাচাই
        $request->validate([
            'title' => 'required',
            'author' => 'required'
        ]);
        // বিদ্যমান বই এর রেকর্ড খুঁজে আপডেট করা
        $book = Book::findOrFail($id);
        $book->title = $request->input('title');
        $book->author = $request->input('author');
        $book->save();
        // আপডেট শেষে তালিকার পেজে ফিরে যান
        return redirect()->route('books.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();
        return redirect()->route('books.index');
    }
}
