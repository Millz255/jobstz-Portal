<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobstz - Articles & Insights</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        /* --- General Body Styles --- */
        body {
            background-color: #e8f0fe;
            color: #333;
            font-family: 'Arial', sans-serif;
        }

        /* --- Navbar Styles --- */
        .navbar {
            background-color: #1a237e;
        }
        .navbar .navbar-brand, .navbar-nav .nav-link {
            color: white;
            font-weight: 500;
        }
        .navbar-nav .nav-link:hover {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
        }

        /* --- Hero Section Styles --- */
        .hero-section {
            background: linear-gradient(135deg, #1a237e, #7986cb);
            color: white;
            padding: 80px 0;
            text-align: center;
            margin-bottom: 30px;
        }

        /* --- Container for Page Content --- */
        .container {
            max-width: 1100px;
        }

        /* --- Main Content Area (Articles and Sidebar) --- */
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

        /* --- Article Card Styles --- */
        .article-card {
            background: white;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
            display: flex; /* Enable flexbox */
            align-items: flex-start; /* Align items to the top */
        }
        .article-card:hover {
            transform: translateY(-3px);
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15);
        }
        .article-card .article-image-container {
            flex-shrink: 0; /* Prevent shrinking */
            margin-right: 15px;
            width: 100px;      /* Further reduced width for thumbnail - now 100px */
            height: 80px;     /* Further reduced height for thumbnail - now 80px */
            overflow: hidden;
            border-radius: 6px; /* Slightly smaller border radius */
        }
        .article-card .article-image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 6px; /* Match container border-radius */
            display: block;
        }
        .article-card .article-content {
            flex-grow: 1;
        }
        .article-card h3 {
            font-size: 1.1rem; /* Further reduced title font size */
            margin-top: 0;
            margin-bottom: 3px; /* Further reduced margin below title */
            color: #0d47a1;
            line-height: 1.2;  /* Tighter line height for title */
        }
        .article-card p {
            font-size: 0.85rem; /* Further reduced snippet font size */
            color: #666;      /* Slightly lighter snippet color */
            margin-bottom: 5px; /* Further reduced margin below snippet */
            line-height: 1.3;  /* Slightly tighter line height for snippet */
        }
        .article-card .author {
            font-weight: normal; /* Author name less bold */
            font-size: 0.8rem;  /* Further reduced author font size */
            color: #777;      /* Lighter author color */
            margin-bottom: 0;
        }
        .article-card .btn-primary { /* Style for the "Read More" button */
            padding: 0.5rem 1rem; /* Slightly smaller button padding */
            font-size: 0.85rem;  /* Smaller button font size */
        }


        /* --- Most Read Articles Sidebar Styles --- */
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
            width: 50px;      /* Slightly smaller sidebar image width */
            height: 50px;     /* Slightly smaller sidebar image height */
            border-radius: 5px;  /* Smaller border radius for sidebar images */
            object-fit: cover;
        }
        .most-read-item a {
            font-size: 0.9rem;  /* Smaller sidebar link font size */
            font-weight: normal; /* Sidebar link less bold */
            text-decoration: none;
            color: #0d47a1;
        }
        .most-read-item a:hover {
            text-decoration: underline;
        }

        /* --- Bottom Navigation Styles --- */
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

        /* --- Responsive Design for Smaller Screens --- */
        @media (max-width: 768px) {
            .main-content {
                flex-direction: column;
            }
            .most-read-container {
                order: 2;
                margin-top: 30px;
            }
            .article-card {
                flex-direction: column;
                align-items: stretch;
            }
            .article-card .article-image-container {
                width: 100%;
                height: 150px;     /* Reduced height on small screens */
                margin-bottom: 10px;
                margin-right: 0;
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
                    <div class="article-image-container">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
                    </div>
                    <div class="article-content">
                        <h3>{{ $article->title }}</h3>
                        <p>{{ Str::limit($article->content, 150) }}</p>
                        <p class="author">By {{ $article->author }}</p>
                        <a href="{{ route('blog.show', $article->id) }}" class="btn btn-primary">Read More</a>
                    </div>
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