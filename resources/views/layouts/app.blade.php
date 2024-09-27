<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Library Management System</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Library Management</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="{{ route('books.index') }}">Books</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('authors.index') }}">Authors</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ route('libraries.index') }}">Libraries</a></li>
        </ul>
    </div>
</nav>
<div class="container mt-4">
    @yield('content')
</div>
</body>
</html>
