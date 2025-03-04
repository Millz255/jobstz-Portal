<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Job Details</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    .job-details {
      border: 1px solid #ccc;
      padding: 25px;
      margin-bottom: 25px;
      background-color: #f9f9f9;
      border-radius: 8px;
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
      display: flex;
      align-items: center;
      margin-bottom: 20px;
    }
    .job-header h2 {
      margin-left: 15px;
    }
    .social-sharing a {
      margin-right: 10px;
    }
    .btn-custom {
      background-color: #007bff;
      color: white;
    }
    .btn-custom:disabled {
      background-color: #ccc;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="job-details">
      <div class="job-header">
        <img src="{{ $job->company_logo }}" alt="{{ $job->company }} logo">
        <h2>{{ $job->title }}</h2>
      </div>

      @if (!$job->is_expired && $job->application_link)
        <a href="{{ $job->application_link }}" class="btn btn-custom" target="_blank">Apply Now</a>
      @elseif (!$job->is_expired)
        <button class="btn btn-custom" disabled>Apply Now (Link Not Provided)</button>
      @else
        <button class="btn btn-custom" disabled>Expired</button>
      @endif

      <p>{{ $job->description }}</p>
      <p><strong>Company:</strong> {{ $job->company }}</p>
      <p><strong>Location:</strong> {{ optional($job->location)->name ?: 'Location not available' }}</p>
      <p><strong>Deadline:</strong> {{ \Carbon\Carbon::parse($job->deadline)->format('F d, Y') }}</p>

      @if ($job->is_expired)
        <p class="expired">This job has expired.</p>
      @endif
    </div>

    <div class="social-sharing">
      <p><strong>Share this job:</strong></p>
      <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" class="btn btn-secondary" target="_blank">Share on Facebook</a>
      <a href="https://twitter.com/share?url={{ urlencode(request()->fullUrl()) }}" class="btn btn-secondary" target="_blank">Share on Twitter</a>
      <a href="https://www.linkedin.com/shareArticle?url={{ urlencode(request()->fullUrl()) }}" class="btn btn-secondary" target="_blank">Share on LinkedIn</a>
      <a href="https://wa.me/?text={{ urlencode(request()->fullUrl()) }}" class="btn btn-secondary" target="_blank">Share on WhatsApp</a>
      <a href="https://t.me/share/url?url={{ urlencode(request()->fullUrl()) }}" class="btn btn-secondary" target="_blank">Share on Telegram</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pzjw8f+ua7Kw1TIq0rF7DdeK2i5lfI33uMe1boI6Sdr0/hU6s7zKZ5lZYcuIl/Po" crossorigin="anonymous"></script>
</body>
</html>
