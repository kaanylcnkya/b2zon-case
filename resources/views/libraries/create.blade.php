@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Add New Library</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('libraries.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location">
            </div>

            <button type="submit" class="btn btn-primary">Add Library</button>
        </form>
    </div>
@endsection
