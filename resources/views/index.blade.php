<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <style>
    body {
      background-color: #f8f9fa;
      color: #333;
    }
    .container {
      max-width: 900px;
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
    .job-listing {
      border: 1px solid #ddd;
      padding: 15px;
      margin-bottom: 15px;
      border-radius: 5px;
      background: #fff;
    }
    .job-listing.expired {
      background: #f8d7da;
    }
    .job-listing.soon-expiring {
      background: #fff3cd;
    }
    .search-bar {
      margin-bottom: 20px;
    }
    .navbar {
      background-color: #007bff;
    }
    .navbar a {
      color: white;
    }
    .navbar a:hover {
      color: #f8f9fa;
      text-decoration: underline;
    }
    .navbar .navbar-brand {
      font-weight: bold;
    }
    .bottom-nav {
      background-color: #e9ecef;
      padding: 10px 0;
      text-align: center;
    }
    .bottom-nav a {
      color: #007bff;
      text-decoration: none;
      margin: 0 15px;
    }
    .bottom-nav a:hover {
      color: #0056b3;
    }
    .btn-blue {
      background-color: #007bff;
      color: white;
    }
    .btn-blue:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

  <!-- Top Navigation Bar -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Job Portal</a>
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
            <a class="nav-link" href="{{ route('contact') }}">Contact Admin for Advertisement</a>
        </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="container mt-4">
    <h1 class="text-center">Job Portal</h1>

    <!-- Search and Filter Bar -->
    <div class="search-bar p-3 bg-light rounded">
      <form method="GET" action="{{ route('jobs.index') }}">
        <input type="text" name="search" class="form-control mb-2" placeholder="Keyword (e.g. Developer, Designer)" value="{{ request('search') }}">

        <select name="category" class="form-control mb-2">
          <option value="">Select Category/Industry</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
          @endforeach
        </select>

        <select name="location" class="form-control mb-2">
          <option value="">Select Location</option>
          @foreach ($locations as $location)
            <option value="{{ $location->id }}" {{ request('location') == $location->id ? 'selected' : '' }}>{{ $location->name }}</option>
          @endforeach
        </select>

        <button type="submit" class="btn btn-blue w-100">Search</button>
      </form>
    </div>

    <h2 class="mt-4">Search Results</h2>
    <div id="job-listings">
      @foreach ($jobs as $job)
        <div class="job-listing @if($job->expired) expired @elseif($job->soon_expiring) soon-expiring @endif">
          <div class="d-flex align-items-center">
            <img src="{{ $job->company_logo }}" alt="{{ $job->company }} logo" class="me-3" style="max-width: 80px;">
            <h3 class="mb-0">{{ $job->title }}</h3>
          </div>
          <p><strong>{{ $job->company }}</strong> - {{ optional($job->location)->name ?: 'Location not available' }}</p>
          <p>{{ Str::limit($job->description, 100) }}</p>
          <p><a href="{{ route('jobs.show', $job->id) }}" class="btn btn-blue">Read More</a></p>
        </div>
      @endforeach
    </div>

    <!-- Pagination -->
    <div class="d-flex justify-content-center mt-4">
      {{ $jobs->links() }}
    </div>
    
    <!-- Load More Button -->
    <button id="load-more" class="btn btn-secondary w-100">See More Jobs</button>
  </div>

  <!-- Bottom Navigation Bar -->
  <div class="bottom-nav">
    <a href="mailto:admin@jobportal.com">Email Admin</a> | 
    <a href="{{ route('about') }}">About</a> |
    <a href="{{ route('contact') }}">Contact</a>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#load-more').click(function() {
        $.ajax({
          url: '{{ route('jobs.loadMore') }}',
          type: 'GET',
          data: {
            offset: $('#job-listings .job-listing').length
          },
          success: function(response) {
            $('#job-listings').append(response.html);
          }
        });
      });
    });
  </script>

</body>
</html>
