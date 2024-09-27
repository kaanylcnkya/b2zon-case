<?php

namespace App\Services;

use App\Http\Requests\AuthorRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Author;
use Illuminate\Http\Request;

class AuthorService
{
    public function list()
    {
        try {
            return AuthorResource::collection(Author::all());
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 422);
        }
    }

    public function create(AuthorRequest $request)
    {
        try {
            $author = Author::create($request->validated());
            return new AuthorResource($author);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 422);
        }
    }

    public function show($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['error' => 'Author not found'], 404);
        }

        return new AuthorResource($author);
    }

    public function update(Request $request, $id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['error' => 'Author not found'], 404);
        }

        $data = $request->only(['name', 'biography']);
        $author->update($data);

        return new AuthorResource($author);
    }

    public function destroy($id)
    {
        $author = Author::find($id);

        if (!$author) {
            return response()->json(['error' => 'Author not found'], 404);
        }

        $author->delete();

        return response()->json(['message' => 'Author deleted successfully'], 200);
    }
}
