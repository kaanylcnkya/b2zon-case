<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthorRequest;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{

    public function index()
    {
        $authors = Author::all();
        return view('authors.index', compact('authors'));
    }

    public function create()
    {
        return view('authors.create');
    }

    public function store(AuthorRequest $request)
    {
        $validated = $request->validated();

        Author::create($validated);

        return redirect()->route('authors.index')->with('success', 'Author added successfully.');
    }

    public function edit(Author $author)
    {
        return view('authors.edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
        $author->update($request->only(['name', 'biography']));

        return redirect()->route('authors.index')->with('success', 'Author updated successfully.');
    }

    public function destroy(Author $author)
    {
        $author->delete();

        return redirect()->route('authors.index')->with('success', 'Author deleted successfully.');
    }
}
