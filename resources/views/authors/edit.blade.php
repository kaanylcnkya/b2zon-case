@extends('layouts.app')

@section('content')
    <h1>Edit Author</h1>
    <form action="{{ route('authors.update', $author) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $author->name }}" required>
        </div>
        <div class="form-group">
            <label for="biography">Biography</label>
            <textarea class="form-control" id="biography" name="biography">{{ $author->biography }}</textarea>
        </div>
        <button type="submit" class="btn btn-success">Update Author</button>
    </form>
@endsection

