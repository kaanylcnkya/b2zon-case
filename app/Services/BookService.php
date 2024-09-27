<?php

namespace App\Services;

use App\Http\Requests\BookRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;
class BookService
{
    public function list()
    {
        try {
            $books = Book::with(['author', 'library'])->get();
            return BookResource::collection($books);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 422);
        }
    }

    public function create(BookRequest $request)
    {
        try {
            $book = Book::create($request->validated());

            if ($request->hasFile('cover_image')) {
                $book->addMedia($request->file('cover_image'))->toMediaCollection('cover_images');
            }

            return new BookResource($book, 201);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 422);
        }
    }

    public function show($id)
    {
        $book = Book::with(['author', 'library'])->find($id);

        if (!$book) {
            return response()->json(['error' => 'Book not found'], 404);
        }

        return new BookResource($book);
    }

    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['error' => 'Book not found'], 404);
        }

        $data = $request->only(['title', 'description', 'author_id', 'library_id']);
        $book->update($data);

        if ($request->hasFile('cover_image')) {
            $book->clearMediaCollection('cover_images');
            $book->addMedia($request->file('cover_image'))->toMediaCollection('cover_images');
        }

        return new BookResource($book);
    }

    public function destroy($id)
    {
        $book = Book::find($id);

        if (!$book) {
            return response()->json(['error' => 'Book not found'], 404);
        }

        $book->clearMediaCollection('cover_images');
        $book->delete();

        return response()->json(['message' => 'Book deleted successfully'], 200);
    }
}
