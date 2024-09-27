<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookRequest;
use App\Models\Book;
use App\Models\Author;
use App\Models\Library;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::with(['author', 'library'])->get();
        return view('books.index', compact('books'));
    }

    public function create()
    {
        $authors = Author::all();
        $libraries = Library::all();
        return view('books.create', compact('authors', 'libraries'));
    }

    public function store(BookRequest $request)
    {
        $validated = $request->validated();

        $book = Book::create($validated);

        if ($request->hasFile('cover_image')) {
            $book->addMedia($request->file('cover_image'))->toMediaCollection('cover_images');
        }

        return redirect()->route('books.index')->with('success', 'Book added successfully.');
    }

    public function edit(Book $book)
    {
        $authors = Author::all();
        $libraries = Library::all();
        return view('books.edit', compact('book', 'authors', 'libraries'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->only(['title', 'description', 'author_id', 'library_id']);

        $book->update($validated);

        if ($request->hasFile('cover_image')) {
            $book->clearMediaCollection('cover_images');
            $book->addMedia($request->file('cover_image'))->toMediaCollection('cover_images');
        }

        return redirect()->route('books.index')->with('success', 'Book updated successfully.');
    }

    public function destroy(Book $book)
    {
        $book->clearMediaCollection('cover_images');
        $book->delete();

        return redirect()->route('books.index')->with('success', 'Book deleted successfully.');
    }
}
