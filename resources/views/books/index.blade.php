@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Books</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary">Add New Book</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Author</th>
                <th>Library</th>
                <th>Cover Image</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>{{ $book->title }}</td>
                    <td>{{ $book->description }}</td>
                    <td>{{ $book->author->name }}</td>
                    <td>{{ $book->library->name }}</td>
                    <td>
                        @if ($book->getFirstMedia('cover_images'))
                            <img src="{{ $book->getFirstMediaUrl('cover_images') }}" alt="Cover Image" width="50">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('books.edit', $book) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('books.destroy', $book) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
