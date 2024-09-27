<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\LibraryController;

Route::get('/', function () {
    return view('layouts.app');
});
Route::resource('books', BookController::class);
Route::resource('authors', AuthorController::class);
Route::resource('libraries', LibraryController::class);
