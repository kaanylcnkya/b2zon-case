@extends('layouts.app')

@section('content')
    <h1 class="mb-4">Authors</h1>
    <a href="{{ route('authors.create') }}" class="btn btn-primary mb-3">Add New Author</a>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($authors as $author)
            <tr>
                <td>{{ $author->id }}</td>
                <td>{{ $author->name }}</td>
                <td>
                    <a href="{{ route('authors.edit', $author) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('authors.destroy', $author) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
