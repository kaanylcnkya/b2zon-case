@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Book</h1>
        <form action="{{ route('books.update', $book) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description">{{ $book->description }}</textarea>
            </div>

            <div class="form-group">
                <label for="author_id">Author</label>
                <select class="form-control" id="author_id" name="author_id" required>
                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" {{ $book->author_id == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="library_id">Library</label>
                <select class="form-control" id="library_id" name="library_id" required>
                    @foreach ($libraries as $library)
                        <option value="{{ $library->id }}" {{ $book->library_id == $library->id ? 'selected' : '' }}>{{ $library->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="cover_image">Cover Image</label>
                <input type="file" class="form-control" id="cover_image" name="cover_image" accept="image/*">
                @if($book->hasMedia('cover_images'))
                    <img src="{{ $book->getFirstMediaUrl('cover_images') }}" alt="Cover Image" class="img-thumbnail mt-2" style="max-width: 200px;">
                @endif


            </div>

            <button type="submit" class="btn btn-warning">Update Book</button>
        </form>
    </div>
@endsection
