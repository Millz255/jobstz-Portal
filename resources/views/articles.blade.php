<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobstz - Articles & Insights</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.net/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            background-color: #e8f0fe;
            color: #333;
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            background-color: #1a237e;
        }
        .navbar .navbar-brand, .navbar-nav .nav-link {
            color: white;
            font-weight: 500;
        }
        .hero-section {
            background: linear-gradient(135deg, #1a237e, #7986cb);
            color: white;
            padding: 80px 0;
            text-align: center;
            margin-bottom: 30px;
        }
        .container {
            max-width: 1100px;
        }
        .main-content {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .articles-container {
            flex: 1;
        }
        .most-read-container {
            flex: 0.4;
            min-width: 280px;
        }
        .article-card {
            background: white;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease-in-out;
        }
        .article-card:hover {
            transform: translateY(-3px);
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15);
        }
        .article-card img {
            width: 100%;
            border-radius: 8px;
        }
        .article-card h3 {
            font-size: 1.4rem;
            margin-top: 10px;
            color: #0d47a1;
        }
        .article-card p {
            font-size: 0.95rem;
            color: #555;
        }
        .article-card .author {
            font-weight: bold;
            font-size: 0.9rem;
            color: #333;
        }
        .most-read {
            background: white;
            border-radius: 8px;
            padding: 15px;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.08);
            position: sticky;
            top: 100px;
        }
        .most-read-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 15px;
        }
        .most-read-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }
        .most-read-item img {
            width: 60px;
            height: 60px;
            border-radius: 6px;
            object-fit: cover;
        }
        .most-read-item a {
            font-size: 1rem;
            font-weight: 500;
            text-decoration: none;
            color: #0d47a1;
        }
        .most-read-item a:hover {
            text-decoration: underline;
        }
        .bottom-nav {
            background-color: #e8f0fe;
            padding: 20px 0;
            text-align: center;
            border-top: 1px solid #b2ebf2;
            margin-top: 50px;
        }
        .bottom-nav a {
            color: #0C08EBFF;
            text-decoration: none;
            margin: 0 20px;
            font-weight: 500;
        }
        .bottom-nav a:hover {
            color: #001BB3FF;
            text-decoration: underline;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .main-content {
                flex-direction: column;
            }
            .most-read-container {
                order: 2;
                margin-top: 30px;
            }
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('jobs.index') }}">Jobstz</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('government.jobs') }}">Government Jobs</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('articles.index') }}">Blog</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="hero-section">
    <h1 class="hero-title">Latest Articles & Insights</h1>
    <p class="hero-slogan">Stay updated with expert career advice.</p>
</div>

<div class="container">
    <div class="main-content">
        <div class="articles-container">
            <h2>Recent Articles</h2>
            @foreach ($articles as $article)
                <div class="article-card">
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
                    <h3>{{ $article->title }}</h3>
                    <p>{{ Str::limit($article->content, 150) }}</p>
                    <p class="author">By {{ $article->author }}</p>
                    <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary">Read More</a>
                </div>
            @endforeach
        </div>

        <div class="most-read-container">
            <div class="most-read">
                <h3 class="most-read-title">Most Read Articles</h3>
                @foreach ($mostReadArticles as $article)
                    <div class="most-read-item">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
                        <div>
                            <a href="{{ route('articles.show', $article->id) }}">{{ Str::limit($article->title, 50) }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="bottom-nav">
    <a href="{{ route('jobs.index') }}">Job Listings</a>
    <a href="{{ route('about') }}">About</a>
    <a href="{{ route('contact') }}">Contact</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>