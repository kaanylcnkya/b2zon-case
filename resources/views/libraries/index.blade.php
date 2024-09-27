@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Libraries</h1>
        <a href="{{ route('libraries.create') }}" class="btn btn-primary">Add New Library</a>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($libraries as $library)
                <tr>
                    <td>{{ $library->name }}</td>
                    <td>{{ $library->location }}</td>
                    <td>
                        <a href="{{ route('libraries.edit', $library) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('libraries.destroy', $library) }}" method="POST" style="display:inline;">
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
