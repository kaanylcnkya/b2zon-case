<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Services\BookService;
use App\Http\Requests\BookRequest;
use Illuminate\Http\Request;

class BookController extends Controller
{
    protected $bookService;

    public function __construct(BookService $bookService)
    {
        $this->bookService = $bookService;
    }

    public function index()
    {
        return $this->bookService->list();
    }

    public function store(BookRequest $request)
    {
        return $this->bookService->create($request);
    }

    public function show($id)
    {
        return $this->bookService->show($id);
    }

    public function update(Request $request, $id)
    {
        return $this->bookService->update($request, $id);
    }

    public function destroy($id)
    {
        return $this->bookService->destroy($id);
    }
}
