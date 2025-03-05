<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobstz - Your Career, Your Future</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #e8f0fe; /* Very light blue background */
            color: #333;
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            background-color: #1a237e; /* Deep Navy Blue Navbar */
        }
        .navbar .navbar-brand, .navbar-nav .nav-link {
            color: white;
            font-weight: 500;
        }
        .navbar-nav .nav-link:hover {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
        }
        .hero-section {
            background: linear-gradient(135deg, #1a237e, #7986cb); /* Deep Blue Gradient Hero */
            color: white;
            padding: 80px 0;
            text-align: center;
            margin-bottom: 30px;
        }
        .hero-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: white;
        }
        .hero-slogan {
            font-size: 1.2rem;
            margin-bottom: 30px;
            font-style: italic;
            color: #e0e0e0;
        }
        .container {
            max-width: 950px;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.15);
        }
        .search-bar {
            margin-bottom: 30px;
            padding: 25px;
            background-color: #f0f0f0;
            border-radius: 8px;
        }
        .search-bar .form-control {
            margin-bottom: 15px;
            border-radius: 6px;
            padding: 12px;
        }
        .search-bar .btn-blue {
            padding: 12px 20px;
            border-radius: 6px;
        }
        .job-listing {
            border: none;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            background: #fff;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease-in-out;
        }
        .job-listing:hover {
            transform: translateY(-3px);
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.15);
        }
        .job-listing.expired {
            background: #ffebee;
            border-top: 4px solid #ef5350;
        }
        .job-listing.soon-expiring {
            background: #fffde7;
            border-top: 4px solid #ffeb3b;
        }
        .job-listing h3 {
            margin-bottom: 8px;
            color: #0d47a1;
        }
        .job-listing p {
            margin-bottom: 10px;
            color: #555;
        }
        .job-listing strong {
            font-weight: 600;
            color: #333;
        }
        .btn-blue {
            background-color: #1a237e;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn-blue:hover {
            background-color: #0d1759;
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
        #load-more {
            margin-top: 20px;
            padding: 12px;
            border-radius: 6px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Jobstz</a>
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

    <div class="hero-section">
        <h1 class="hero-title">Find Your Dream Job with Jobstz</h1>
        <p class="hero-slogan">Your Career, Your Future starts here.</p>
        <div class="container search-bar hero-search-bar">
            <form method="GET" action="{{ route('jobs.index') }}" class="d-flex flex-column">
                <div class="input-group mb-2">
                    <input type="text" name="search" class="form-control" placeholder="Job title or keywords" value="{{ request('search') }}" aria-label="Search Keyword">
                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                </div>
                <div class="input-group mb-2">
                    <select name="category" class="form-control">
                        <option value="">All Categories</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    <span class="input-group-text"><i class="fas fa-folder"></i></span>
                </div>
                <div class="input-group mb-2">
                    <select name="location" class="form-control">
                        <option value="">All Locations</option>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}" {{ request('location') == $location->id ? 'selected' : '' }}>{{ $location->name }}</option>
                        @endforeach
                    </select>
                    <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                </div>
                <button type="submit" class="btn btn-blue w-100">Search Jobs</button>
            </form>
        </div>
    </div>

    <div class="container">
        <h2 class="mb-4">Latest Job Listings</h2>
        <div id="job-listings">
            @foreach ($jobs as $job)
                <div class="job-listing @if($job->expired) expired @elseif($job->soon_expiring) soon-expiring @endif">
                    <div class="d-flex align-items-center mb-3">
                    <img src="{{ asset('storage/' . $job->company_logo) }}" alt="{{ $job->company }} logo" class="me-3" style="max-width: 80px;">
                        <div>
                            <h3 class="mb-0">{{ $job->title }}</h3>
                            <p class="mb-0">
                                <strong>{{ $job->company }}</strong> - <i class="fas fa-map-marker-alt me-1"></i>{{ optional($job->location)->name ?: 'Location not available' }}
                            </p>
                        </div>
                    </div>
                    <p class="mb-3">{{ Str::limit($job->description, 150) }}</p>
                    <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-blue">View Details</a>
                </div>
            @endforeach
        </div>
        
        <div id="load-more" class="text-center mt-5">
            @if (count($jobs) >= 12)
                <button class="btn btn-blue" id="load-more-button">Load More Jobs</button>
            @endif
        </div>
    </div>

    <div class="bottom-nav">
        <a href="{{ route('jobs.index') }}">Job Listings</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('contact') }}">Contact</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0tn9kY1wzO8O+Nf4vFLHKkBd/l6ZxDqUOEdXn7r4WR0mRp4p" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('#load-more-button').on('click', function () {
            $.ajax({
                url: '{{ route('jobs.loadMore') }}',
                type: 'GET',
                data: {
                    offset: $('#job-listings .job-listing').length
                },
                success: function (response) {
                    $('#job-listings').append(response.html);
                    if (response.jobs_remaining < 12) {
                        $('#load-more').hide();
                    }
                }
            });
        });
    });
</script>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0tn9kY1wzO8O+Nf4vFLHKkBd/l6ZxDqUOEdXn7r4WR0mRp4p" crossorigin="anonymous"></script>

</body>
</html>
