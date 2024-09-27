<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\LibraryService;
use App\Http\Requests\LibraryRequest;
use Illuminate\Http\Request;

class LibraryController extends Controller
{
    protected $libraryService;

    public function __construct(LibraryService $libraryService)
    {
        $this->libraryService = $libraryService;
    }

    public function index()
    {
        return $this->libraryService->list();
    }

    public function store(LibraryRequest $request)
    {
        return $this->libraryService->create($request);
    }

    public function show($id)
    {
        return $this->libraryService->show($id);
    }

    public function update(Request $request, $id)
    {
        return $this->libraryService->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->libraryService->destroy($id);
    }
}
