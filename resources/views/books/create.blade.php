@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Book</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description"></textarea>
            </div>

            <div class="form-group">
                <label for="author_id">Author</label>
                <select class="form-control" id="author_id" name="author_id" required>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="library_id">Library</label>
                <select class="form-control" id="library_id" name="library_id" required>
                    @foreach ($libraries as $library)
                        <option value="{{ $library->id }}">{{ $library->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="cover_image">Cover Image</label>
                <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*">
            </div>

            <button type="submit" class="btn btn-primary">Add Book</button>
        </form>
    </div>
@endsection
