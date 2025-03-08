<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $job->title }} at {{ $job->company }} - Jobstz</title>
    <meta name="description" content="Apply for the {{ $job->title }} position at {{ $job->company }} in {{ optional($job->location)->name ?: 'Various Locations' }}. Find job details, description, company information and application link at Jobstz.">
    <meta name="keywords" content="{{ $job->title }}, {{ $job->company }}, {{ optional($job->location)->name }}, {{ $job->job_type }}, {{ $job->employment_type }}, jobs, job search, career">
    <link rel="canonical" href="{{ route('jobs.show', $job->id) }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: Arial, sans-serif;
             background-color: #e8f0fe; /* Consistent background from index page */
            color: #333; /* Consistent text color from index page */
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
        .job-details {
            border: none; /* Removed border */
            padding: 30px; /* Increased padding for better spacing */
            margin-bottom: 25px;
            background-color: #fff; /* White background for job details, like job listings */
            border-radius: 12px; /* Rounded corners like index page */
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.15); /* Shadow from job listings */
        }
        .job-details img {
            max-width: 100px;
            max-height: 50px;
            margin-right: 15px;
            border-radius: 5px;
        }
        .expired {
            color: red;
            font-weight: bold;
        }
        .job-header {
            margin-bottom: 20px;
        }
        .job-header-top {
            display: flex;
            align-items: center;
            margin-bottom: 10px; /* Reduced margin for better spacing */
        }
        .job-header-top h2 {
            margin-left: 15px;
            color: #0d47a1; /* Job title color from index page */
            margin-bottom: 0; /* Align with company/location text */
        }
        .job-header-info p {
            margin-bottom: 5px; /* Reduced margin for company/location text */
            color: #555;
        }
        .social-sharing a {
            margin-right: 10px;
        }
        .btn-custom, .btn-blue { /* Apply same style to both custom button and any btn-blue class */
            background-color: #1a237e; /* Deep Navy Blue, consistent with index page buttons */
            color: white;
             border: none; /* Removed border for button consistency */
             padding: 10px 20px; /* Add padding to buttons */
            border-radius: 5px; /* Add button border radius */
            transition: background-color 0.3s ease; /* Add hover transition */
        }
        .btn-custom:hover, .btn-blue:hover {
            background-color: #0d1759; /* Darker blue on hover, like index page buttons */
        }
        .btn-custom:disabled {
            background-color: #ccc;
        }
        .job-description-section {
            margin-top: 20px;
        }
        .job-description-section h4 {
            color: #1a237e; /* Section header color */
            margin-bottom: 10px;
            font-weight: bold;
        }
        .job-description-section p, .job-description-section li {
            line-height: 1.7; /* Improved line height for readability */
            margin-bottom: 10px; /* Spacing between paragraphs/list items */
            color: #555; /* Description text color, consistent with index page */
        }
        .job-description-section ul {
            padding-left: 20px; /* Indentation for lists */
        }
        .job-info p {
            margin-bottom: 8px;
            color: #555; /* Consistent info text color */
        }
        .job-info strong {
            font-weight: 600;
            color: #333; /* Bold info labels */
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
                    <a class="nav-link" href="{{ route('contact') }}">Advertise With Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8"> {{-- Main Job Details Column (8 columns wide) --}}
            <div class="job-details" itemscope itemtype="http://schema.org/JobPosting">
                <meta itemprop="hiringOrganization" content="{{ $job->company }}">
                <meta itemprop="jobLocationType" content="{{ $job->job_type }}">
                <meta itemprop="employmentType" content="{{ $job->employment_type }}">
                <meta itemprop="datePosted" content="{{ $job->created_at->toIso8601String() }}">
                <meta itemprop="validThrough" content="{{ optional($job->expiry_date)->toIso8601String() }}">

                <div class="job-header">
                    <div class="job-header-top">
                        <img src="{{ asset('storage/' . $job->company_logo) }}" alt="{{ $job->company }} logo" class="me-3" style="max-width: 80px;" itemprop="image">
                        <h1 class="mb-0" itemprop="title">{{ $job->title }}</h1>
                    </div>
                    <div class="job-header-info">
                        <p class="mb-0"><strong>Company:</strong> <span itemprop="name">{{ $job->company }}</span></p>
                        <p class="mb-0"><strong>Location:</strong> <span itemprop="jobLocation" itemscope itemtype="http://schema.org/Place">
                            <span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
                               <span itemprop="addressLocality">{{ optional($job->location)->name ?: 'Location not available' }}</span> </span>
                        </span></p>
                    </div>
                </div>

                @if (!$job->is_expired && $job->application_link)
                    <a href="{{ $job->application_link }}" class="btn btn-custom apply-button" target="_blank" rel="noopener noreferrer">Apply Now</a>
                @elseif (!$job->is_expired)
                    <button class="btn btn-custom apply-button" disabled>Apply Now (Link Not Provided)</button>
                @else
                    <button class="btn btn-custom apply-button" disabled>Expired</button>
                @endif

                <div class="job-description-section">
                    <h4>Job Description</h4>
                    <div itemprop="description">{!! nl2br(e($job->description)) !!}</div>
                </div>

                @if($job->pdf_path)
                    <div class="mb-3">
                        <p>
                            <strong>Job Description (PDF):</strong>
                            <a href="{{ asset('storage/' . $job->pdf_path) }}" target="_blank">Download PDF</a>
                        </p>
                    </div>
                @endif

                <div class="job-info" style="margin-top: 20px;">
                    <p><strong>Deadline:</strong> {{ \Carbon\Carbon::parse($job->deadline)->format('F d, Y') }}</p>
                </div>

                @if ($job->is_expired)
                    <p class="expired">This job has expired.</p>
                @endif
                 <link itemprop="url" href="{{ route('jobs.show', ['slug' => $job->slug]) }}"> {{-- Updated route here --}}
            </div>

            <div class="social-sharing">
                <p><strong>Share this job:</strong></p>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" class="btn btn-secondary" target="_blank" rel="noopener noreferrer" aria-label="Share on Facebook"><i class="fab fa-facebook"></i> Facebook</a>
                <a href="https://twitter.com/share?url={{ urlencode(request()->fullUrl()) }}" class="btn btn-secondary" target="_blank" rel="noopener noreferrer" aria-label="Share on Twitter"><i class="fab fa-twitter"></i> Twitter</a>
                <a href="https://www.linkedin.com/shareArticle?url={{ urlencode(request()->fullUrl()) }}" class="btn btn-secondary" target="_blank" rel="noopener noreferrer" aria-label="Share on LinkedIn"><i class="fab fa-linkedin"></i> LinkedIn</a>
                <a href="https://wa.me/?text={{ urlencode(request()->fullUrl()) }}" class="btn btn-secondary" target="_blank" rel="noopener noreferrer" aria-label="Share on WhatsApp"><i class="fab fa-whatsapp"></i> WhatsApp</a>
                <a href="https://t.me/share/url?url={{ urlencode(request()->fullUrl()) }}" class="btn btn-secondary" target="_blank" rel="noopener noreferrer" aria-label="Share on Telegram"><i class="fab fa-telegram"></i> Telegram</a>
            </div>
        </div>

        <div class="col-md-4"> {{-- Related Jobs Section --}}
    <div class="job-details">
        <h4>Related Jobs</h4>
        @forelse ($relatedJobs as $relatedJob)
            <div style="display: flex; align-items: center; margin-bottom: 15px;"> {{-- Added flex container --}}
                <img src="{{ asset('storage/' . $relatedJob->company_logo) }}" alt="{{ $relatedJob->company }} logo" style="max-width: 50px; max-height: 50px; margin-right: 10px; border-radius: 5px;"> {{-- Added image tag --}}
                <div>
                    <a href="{{ route('jobs.show', ['slug' => $relatedJob->slug]) }}" style="display: block; color: #0d47a1; font-weight: 500; text-decoration: none;">{{ $relatedJob->title }}</a>
                    <p style="font-size: 0.9em; color: #777; margin-bottom: 0;">{{ $relatedJob->company }}</p> {{-- Optional: Add company name below title --}}
                </div>
            </div>
        @empty
            <p>No related jobs found in this category.</p>
        @endforelse
    </div>
</div>
    </div>
</div>

    <div class="bottom-nav">
        <a href="{{ route('jobs.index') }}">Job Listings</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('contact') }}">Contact</a>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0rF7DdeK2i5lfI33uMe1boI6Sdr0/hU6s7zKZ5lZYcuIl/Po" crossorigin="anonymous"></script>
</body>
</html>