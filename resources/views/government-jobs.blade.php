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
            background-color: #e8f0fe;
            color: #333;
            font-family: 'Arial', sans-serif;
            overflow-x: hidden;
        }

        .navbar-collapse {
            transition: none !important;
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
        .hero-section {
            background: linear-gradient(135deg, #1a237e, #7986cb);
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
            max-width: 1200px;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.15);
        }

        /* --- Sidebar Widget Styles --- */
        .sidebar-widget {
            position: fixed;
            top: 0;
            left: -300px;
            width: 300px;
            height: 100%;
            background-color: #f0f0f0;
            padding: 30px;
            box-shadow: 5px 0 20px rgba(0, 0, 0, 0.1);
            overflow-y: auto;
            transition: left 0.3s ease-in-out;
            z-index: 1000;
        }

        .sidebar-widget.open {
            left: 0;
        }

        .sidebar-widget .search-bar {
            margin-bottom: 20px;
            padding: 0;
            background-color: transparent;
            border-radius: 0;
        }

        .sidebar-widget .search-bar .form-control {
            margin-bottom: 10px;
            border-radius: 6px;
            padding: 10px;
        }

        .sidebar-widget .search-bar .btn-blue {
            padding: 10px 15px;
            border-radius: 6px;
        }

        #close-search-widget {
            position: absolute;
            top: 10px;
            right: 10px;
            background: none;
            border: none;
            font-size: 1.5em;
            cursor: pointer;
            color: #555;
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

        /* --- Button to Open Sidebar --- */
        #open-search-widget-btn {
            background-color: #f0f0f0;
            color: #333;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        #open-search-widget-btn:hover {
            background-color: #e0e0e0;
        }

        /* --- Article Sidebar Styles --- */
        .article-sidebar {
            padding-left: 30px;
        }

        .article-sidebar-item {
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        .article-sidebar-item:hover {
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
            transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        }

        .article-thumbnail {
            width: 100%;
            max-width: 100%;
            max-height: 100px;
            height: auto;
            border-top-left-radius: 8px;
            border-top-right-radius: 8px;
            display: block;
            object-fit: cover;
            object-position: center;
        }

        .article-content {
            padding: 15px;
        }

        .article-title {
            font-size: 1rem;
            font-weight: bold;
            color: #1a237e;
            margin-bottom: 5px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .article-link {
            color: #555;
            text-decoration: none;
            font-size: 0.9rem;
            display: block;
        }

        .article-link:hover {
            color: #0d1759;
            text-decoration: underline;
        }

        /* --- New CSS for Navbar Toggle --- */
        @media (max-width: 991.98px) { /* Bootstrap's default breakpoint for `navbar-expand-lg` */
            .navbar-collapse {
                display: none; /* Initially hide on small screens */
            }
            .navbar-collapse.show { /* Class to show it (we'll add this with JS) */
                display: block !important; /* Override any other display: none; */
            }
        }

    </style>
    <link rel="canonical" href="{{ url('/') }}">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">Jobstz</a>
        <button class="navbar-toggler" type="button" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" id="navbarTogglerBtn">
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
                    <a class="nav-link" href="{{ route('contact') }}">Advertise With Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="hero-section">
    <h1 class="hero-title">Find Your Dream Job, Remote Jobs & other Opportunities on Jobstz</h1>
    <p class="hero-slogan">Start Your Job Search Today and Build Your Future with Leading Employers.</p>
</div>

<div class="sidebar-widget" id="searchSidebar">  <button id="close-search-widget" onclick="toggleSearchWidget()" aria-label="Close Search Widget">&times;</button>
    <h2>Search Here</h2>
    <div class="search-bar">
        <form method="GET" action="{{ route('jobs.index') }}" class="d-flex flex-column">
            <div class="input-group mb-2">
                <input type="text" name="search" class="form-control" placeholder="Job title or keywords" value="{{ request('search') }}" aria-label="Search Keyword">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
            </div>
            <div class="input-group mb-2">
                <select name="category" class="form-control" aria-label="Job Category"> <option value="">Select Category/Industry</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                    @endforeach
                </select>
                <span class="input-group-text"><i class="fas fa-folder"></i></span>
            </div>
            <div class="input-group mb-2">
                <select name="location" class="form-control" aria-label="Job Location"> <option value="">Select Locations</option>
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
    <button id="open-search-widget-btn" onclick="toggleSearchWidget()" aria-label="Show Job Search Widget"><i class="fas fa-search"></i> Show Job Search</button> <div class="row">
        <div class="col-lg-8">
            <h2 class="mb-4">Latest Job Listings</h2>
            <div id="job-listings">
                @foreach ($jobs as $job)
                    <div class="job-listing @if($job->expired) expired @elseif($job->soon_expiring) soon-expiring @endif" itemscope itemtype="http://schema.org/JobPosting">
                        <meta itemprop="hiringOrganization" content="{{ $job->company }}">
                        <meta itemprop="jobLocationType" content="{{ $job->job_type }}">
                        <meta itemprop="employmentType" content="{{ $job->employment_type }}">
                        <meta itemprop="datePosted" content="{{ $job->created_at->toIso8601String() }}">
                        <meta itemprop="validThrough" content="{{ optional($job->expiry_date)->toIso8601String() }}">


                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('storage/' . $job->company_logo) }}" alt="{{ $job->company }} logo" class="me-3" style="max-width: 80px;" itemprop="image"> <div>
                                <h3 class="mb-0" itemprop="title">{{ $job->title }}</h3>
                                <p class="mb-0">
                                    <strong itemprop="name">{{ $job->company }}</strong> -  <i class="fas fa-map-marker-alt me-1"></i><span itemprop="jobLocation" itemscope itemtype="http://schema.org/Place">
                                        <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                                            <span itemprop="addressLocality">{{ optional($job->location)->name ?: 'Location not available' }}</span> </span>
                                        </span>
                                </p>
                            </div>
                        </div>
                        <p class="mb-3" itemprop="description">{{ Str::limit(strip_tags($job->description), 150) }}</p>
                        <a href="{{ route('jobs.show', ['slug' => $job->slug]) }}" class="btn btn-blue">View Details</a>
                    </div>
                @endforeach
            </div>

            <div id="load-more" class="text-center mt-5">
                @if (count($jobs) >= 12)
                    <button class="btn btn-blue" id="load-more-button">Load More Jobs</button>
                @endif
            </div>
        </div>

        <div class="col-lg-4 article-sidebar">
            <h3 class="mb-3">Recent Articles</h3>
            @foreach($recentArticles as $article)
            <div class="article-sidebar-item">
                <a href="{{ route('articles.show', $article->id) }}" style="display: block; text-decoration: none; color: inherit;">
                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }} Thumbnail" class="article-thumbnail">
                    <div class="article-content">
                        <h4 class="article-title">{{ $article->title }}</h4>
                    </div>
                </a>
                <div class="article-content" style="padding-top: 0;">
                    <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-blue btn-sm">Read More <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            @endforeach
        </div>
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

        // When the navbar toggler is clicked, ensure the search widget is closed.
        $('.navbar-toggler').on('click', function() {
            const sidebar = document.getElementById('searchSidebar');
            if (sidebar.classList.contains('open')) {
                sidebar.classList.remove('open');
            }
        });
    });

    function toggleSearchWidget() {
        const sidebar = document.getElementById('searchSidebar');
        sidebar.classList.toggle('open');
    }

    // JavaScript to manually toggle navbar collapse
    const navbarToggler = document.getElementById('navbarTogglerBtn');
    const navbarNav = document.getElementById('navbarNav');

    navbarToggler.addEventListener('click', () => {
        navbarNav.classList.toggle('show');
        navbarToggler.setAttribute('aria-expanded', navbarNav.classList.contains('show'));
    });

</script>

</body>
</html>