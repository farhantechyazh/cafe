<!DOCTYPE html>
<html>
<head>
    <title>Farhan's Cafe</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('category.index') }}">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('post.create') }}">Create Post</a>
                    </li>
                    <li class="nav-item">
    <a class="nav-link" href="{{ route('post.updated') }}">Updated Posts</a>
</li>
@foreach($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('category.show', $category->id) }}">
                                {{ $category->category_name }}
                            </a>
                        </li>
                    @endforeach



                </ul>
            </div>
        </div>
    </nav>
    <main class="py-4">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
