<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Articles</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Assuming you are using a compiled CSS -->
</head>
<body>
    <!-- Top Nav -->
    <nav>
        <!-- Add your top navigation links here -->
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('about') }}">About Us</a>
        <a href="{{ route('blog.index') }}">Blog</a>
    </nav>

    <div class="container">
        <h1>Blog Articles</h1>

        <!-- Articles Loop -->
        @foreach ($articles as $article)
            <div class="article">
                <h2><a href="{{ route('blog.show', $article->id) }}">{{ $article->title }}</a></h2>
                <p>{{ Str::limit($article->content, 150) }}...</p>
            </div>
        @endforeach

        <!-- Pagination -->
        <div class="pagination">
            {{ $articles->links() }}
        </div>
    </div>

    <!-- Bottom Nav -->
    <footer>
        <!-- Add your bottom navigation or footer links here -->
        <a href="{{ route('home') }}">Home</a>
        <a href="{{ route('contact') }}">Contact</a>
    </footer>
</body>
</html>
