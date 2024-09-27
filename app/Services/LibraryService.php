<?php

namespace App\Services;

use App\Http\Resources\LibraryResource;
use App\Http\Requests\LibraryRequest;
use App\Models\Library;
use Illuminate\Http\Request;
class LibraryService
{
    public function list()
    {
        try {
            return LibraryResource::collection(Library::all());
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 422);
        }
    }

    public function create(LibraryRequest $request)
    {
        try {
            $library = Library::create($request->validated());
            return new LibraryResource($library);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 422);
        }
    }

    public function show($id)
    {
        $library = Library::find($id);
        if (!$library) {
            return response()->json(['error' => 'Library not found'], 404);
        }
        return new LibraryResource($library);
    }

    public function update(Request $request, $id)
    {
        $library = Library::find($id);
        if (!$library) {
            return response()->json(['error' => 'Library not found'], 404);
        }
        $data = $request->only(['name', 'location']);
        $library->update($data);
        return new LibraryResource($library);
    }

    public function destroy($id)
    {
        $library = Library::find($id);
        if (!$library) {
            return response()->json(['error' => 'Library not found'], 404);
        }
        $library->delete();
        return response()->json(['message' => 'Library deleted successfully'], 200);
    }
}
