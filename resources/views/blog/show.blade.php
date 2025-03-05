<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $article->title }} - Jobstz Articles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox/dist/css/glightbox.min.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e8f0fe;
            color: #333;
        }
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
        .article-details {
            border: none;
            padding: 30px;
            margin-bottom: 25px;
            background-color: #fff;
            border-radius: 12px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.15);
            display: flex; /* Enable Flexbox on article-details */
            flex-wrap: wrap; /* Allow content to wrap below image on small screens */
            align-items: flex-start; /* Align items to the start of the container */
        }
        .article-image-column {
            flex: 0 0 40%; /* Image column takes 40% width initially */
            max-width: 40%;
            padding-right: 20px; /* Spacing between image and content */
        }
        .article-image-column img {
            max-width: 100%; /* Image takes full width of its column */
            border-radius: 8px;
            margin-bottom: 10px;
            cursor: pointer;
            display: block; /* Ensure image is block-level for margin auto to work */
            margin: 0 auto 10px auto; /* Center image horizontally in column */
        }
        .article-image {
            max-height: 400px;
            width: auto;
            display: block;
        }
        .image-container {
            position: relative;
            display: inline-block;
        }
        .download-button {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: rgba(0, 0, 0, 0.6);
            color: white;
            padding: 8px 12px;
            border-radius: 5px;
            font-size: 0.9rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .image-container:hover .download-button {
            opacity: 1;
        }
        .article-content-column {
            flex: 1; /* Content column takes remaining space */
            padding-left: 20px; /* Spacing from image column if needed */
        }
        .article-header {
            margin-bottom: 20px;
        }
        .article-header h2 {
            color: #0d47a1;
            margin-bottom: 10px;
        }
        .article-meta p {
            margin-bottom: 5px;
            color: #555;
        }
        .social-sharing a {
            margin-right: 10px;
        }
        .article-content-section {
            margin-top: 20px;
        }
        .article-content-section h4 {
            color: #1a237e;
            margin-bottom: 10px;
            font-weight: bold;
        }
        .article-content-section p, .article-content-section li {
            line-height: 1.7;
            margin-bottom: 10px;
            color: #555;
        }
        .article-content-section ul {
            padding-left: 20px;
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

        /* Responsive adjustments for smaller screens */
        @media (max-width: 768px) {
            .article-details {
                flex-direction: column; /* Stack columns vertically on small screens */
            }
            .article-image-column, .article-content-column {
                max-width: 100%; /* Columns take full width on small screens */
                padding-right: 0; /* Remove right padding for image column */
                padding-left: 0; /* Remove left padding for content column */
            }
            .article-image-column {
                margin-bottom: 20px; /* Add space below image when stacked */
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
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('government.jobs') }}">Government Jobs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('articles.index') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact') }}">Advertisem With Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <div class="article-details">
        <div class="article-image-column"> {{-- NEW IMAGE COLUMN CONTAINER --}}
            @if($article->image)
                <div class="image-container">
                    <a href="{{ asset('storage/' . $article->image) }}" data-glightbox="type: image">
                        <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="article-image">
                    </a>
                    <a href="{{ asset('storage/' . $article->image) }}" class="download-button" download="{{ Str::slug($article->title) }}.{{ pathinfo(parse_url(asset('storage/' . $article->image))['path'], PATHINFO_EXTENSION) }}">
                        <i class="fas fa-download"></i> Download
                    </a>
                </div>
            @endif
        </div>

        <div class="article-content-column"> {{-- NEW CONTENT COLUMN CONTAINER --}}
            <div class="article-header">
                <h2>{{ $article->title }}</h2>
                <div class="article-meta">
                    <p><strong>By:</strong> {{ $article->author }}</p>
                    <p><strong>Published on:</strong> {{ \Carbon\Carbon::parse($article->created_at)->format('F d, Y') }}</p>
                </div>
            </div>

            <div class="article-content-section">
                <h4>Content</h4>
                {!! nl2br(e($article->content)) !!}
            </div>

            <div class="social-sharing" style="margin-top: 20px;">
                <p><strong>Share this article:</strong></p>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" class="btn btn-secondary" target="_blank">Share on Facebook</a>
                <a href="https://twitter.com/share?url={{ urlencode(request()->fullUrl()) }}" class="btn btn-secondary" target="_blank">Share on Twitter</a>
                <a href="https://www.linkedin.com/shareArticle?url={{ urlencode(request()->fullUrl()) }}" class="btn btn-secondary" target="_blank">Share on LinkedIn</a>
                <a href="https://wa.me/?text={{ urlencode(request()->fullUrl()) }}" class="btn btn-secondary" target="_blank">Share on WhatsApp</a>
                <a href="https://t.me/share/url?url={{ urlencode(request()->fullUrl()) }}" class="btn btn-secondary" target="_blank">Share on Telegram</a>
            </div>
        </div>
    </div>
</div>

<div class="bottom-nav">
    <a href="{{ route('jobs.index') }}">Job Listings</a>
    <a href="{{ route('about') }}">About</a>
    <a href="{{ route('contact') }}">Contact</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/glightbox/dist/js/glightbox.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const lightbox = GLightbox({
            selector: 'data-glightbox',
        });
    });
</script>

</body>
</html>