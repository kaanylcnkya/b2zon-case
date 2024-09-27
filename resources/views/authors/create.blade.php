@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Author</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('authors.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="bio">Bio</label>
                <textarea class="form-control" id="biography" name="biography"></textarea>
            </div>


            <button type="submit" class="btn btn-primary">Add Author</button>
        </form>
    </div>
@endsection
