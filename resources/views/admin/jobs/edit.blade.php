<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Edit Job</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Edit Job</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.jobs.update', $job->id) }}" method="POST" enctype="multipart/form-data"> {{-- Add enctype for file uploads --}}
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Job Title:</label>
                <input type="text" id="title" name="title" value="{{ old('title', $job->title) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Job Description:</label>
                <textarea id="description" name="description" class="form-control" required>{{ old('description', $job->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="company" class="form-label">Company Name:</label>
                <input type="text" id="company" name="company" value="{{ old('company', $job->company) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="company_logo" class="form-label">Company Logo (Optional):</label>
                <input type="file" id="company_logo" name="company_logo" class="form-control">
                <small class="form-text text-muted">Upload company logo image (JPEG, PNG, JPG, GIF, SVG, max 2MB). Leave blank to keep current logo.</small>
            </div>

            @if($job->company_logo)
            <div class="mb-3">
                <label class="form-label">Current Logo:</label>
                <img src="{{ asset('storage/' . $job->company_logo) }}" alt="Current Company Logo" style="max-width: 100px; height: auto;">
            </div>

            <div class="mb-3">
            <label for="pdf_file" class="form-label">Job Description PDF (Optional):</label>
            <input type="file" id="pdf_file" name="pdf_file" class="form-control">
            <small class="form-text text-muted">Upload a new PDF to replace the current one, or leave blank to keep the existing PDF (if any).</small>
        </div>

        @if($job->pdf_path)
        <div class="mb-3">
            <label class="form-label">Current PDF:</label>
            <p>
                <a href="{{ asset('storage/' . $job->pdf_path) }}" target="_blank">View Current PDF</a>
            </p>
        </div>
        @endif
        
            @endif
            <div class="mb-3">
                <label for="category_id" class="form-label">Category:</label>
                <select id="category_id" name="category_id" class="form-control" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}"
                        @if(old('category_id', $job->category_id) == $category->id) selected @endif
                        >
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="location_id" class="form-label">Job Location:</label>
                <select id="location_id" name="location_id" class="form-control" required>
                    <option value="">Select Location</option>
                    @foreach($locations as $location)
                    <option value="{{ $location->id }}"
                        @if(old('location_id', $job->location_id) == $location->id) selected @endif
                        >
                        {{ $location->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="deadline" class="form-label">Application Deadline:</label>
                <input type="date" id="deadline" name="deadline" value="{{ old('deadline', $job->deadline) }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="application_link" class="form-label">Application Link:</label>
                <input type="url" id="application_link" name="application_link" value="{{ old('application_link', $job->application_link) }}" class="form-control">
                <small class="form-text text-muted">Optional: Provide the URL where applicants can apply for the job.</small>
            </div>

            <button type="submit" class="btn btn-primary">Update Job</button>
            <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>