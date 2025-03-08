<div class="job-listing @if($job->expired) expired @elseif($job->soon_expiring) soon-expiring @endif" itemscope itemtype="http://schema.org/JobPosting">
    <meta itemprop="hiringOrganization" content="{{ $job->company }}">
    <meta itemprop="jobLocationType" content="{{ $job->job_type }}">
    <meta itemprop="employmentType" content="{{ $job->employment_type }}">
    <meta itemprop="datePosted" content="{{ $job->created_at->toIso8601String() }}">
    <meta itemprop="validThrough" content="{{ optional($job->expiry_date)->toIso8601String() }}">

    <div class="d-flex align-items-center mb-3">
        <img src="{{ asset('storage/' . $job->company_logo) }}" alt="{{ $job->company }} logo" class="me-3" style="max-width: 80px;" itemprop="image">
        <div>
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