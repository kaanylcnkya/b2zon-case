<?php

namespace App\Http\Controllers;

use App\Http\Requests\LibraryRequest;
use App\Models\Library;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    public function index()
    {
        $libraries = Library::all();
        return view('libraries.index', compact('libraries'));
    }

    public function create()
    {
        return view('libraries.create');
    }

    public function store(LibraryRequest $request)
    {
        $validated = $request->validated();

        Library::create($validated);

        return redirect()->route('libraries.index')->with('success', 'Library added successfully.');
    }

    public function edit(Library $library)
    {
        return view('libraries.edit', compact('library'));
    }

    public function update(Request $request, Library $library)
    {
        $library->update($request->only(['name', 'location']));

        return redirect()->route('libraries.index')->with('success', 'Library updated successfully.');
    }

    public function destroy(Library $library)
    {
        $library->delete();

        return redirect()->route('libraries.index')->with('success', 'Library deleted successfully.');
    }
}
