<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Services\AuthorService;
use App\Http\Requests\AuthorRequest;

class AuthorController extends Controller
{
    protected $authorService;

    public function __construct(AuthorService $authorService)
    {
        $this->authorService = $authorService;
    }

    public function index()
    {
        return $this->authorService->list();
    }

    public function store(AuthorRequest $request)
    {
        return $this->authorService->create($request);
    }

    public function show($id)
    {
        return $this->authorService->show($id);
    }

    public function update(Request $request, $id)
    {
        return $this->authorService->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->authorService->destroy($id);
    }
}
