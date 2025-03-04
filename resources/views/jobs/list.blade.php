@if($jobs->count() > 0)
  @foreach ($jobs as $job)
    <div class="job-listing">
      <div class="d-flex align-items-center">
        <img src="{{ $job->company_logo }}" alt="{{ $job->company }} logo">
        <h2>{{ $job->title }}</h2>
      </div>
      <p>{{ $job->description }}</p>
      <p>
        <a href="{{ route('jobs.show', $job->id) }}" class="btn btn-primary">See More</a>
      </p>
    </div>
  @endforeach
@else
  <p class="text-center">No jobs found. Try another search.</p>
@endif
