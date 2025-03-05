<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Create Job</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-4">
        <h1>Create Job</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('admin.jobs.store') }}" method="POST" enctype="multipart/form-data">  {{-- ADD enctype HERE and remove inner form --}}
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Job Title:</label>
                <input type="text" id="title" name="title" class="form-control" placeholder="Enter job title" required value="{{ old('title') }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Job Description:</label>
                <textarea id="description" name="description" class="form-control" placeholder="Enter detailed job description" required>{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="company" class="form-label">Company Name:</label>
                <input type="text" id="company" name="company" class="form-control" placeholder="Enter company name" required value="{{ old('company') }}">
            </div>

            <div class="mb-3">
                <label for="company_logo" class="form-label">Company Logo (Optional):</label>
                <input type="file" id="company_logo" name="company_logo" class="form-control">
                <small class="form-text text-muted">Upload company logo image (JPEG, PNG, JPG, GIF, SVG, max 2MB).</small>
            </div>

            <div class="mb-3">
                <label for="location_id" class="form-label">Location:</label>
                <select id="location_id" name="location_id" class="form-control" required>
                    <option value="">Select Location</option>
                    @foreach($locations as $location)
                    <option value="{{ $location->id }}"
                        @if(old('location_id') == $location->id) selected @endif
                        >
                        {{ $location->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="deadline" class="form-label">Application Deadline:</label>
                <input type="date" id="deadline" name="deadline" class="form-control" required value="{{ old('deadline') }}">
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category:</label>
                <select id="category" name="category_id" class="form-control" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="application_link" class="form-label">Application Link (Optional):</label>
                <input type="url" id="application_link" name="application_link" class="form-control" placeholder="Enter application link (optional)" value="{{ old('application_link') }}">
                <small class="form-text text-muted">Provide the URL where applicants can apply.</small>
            </div>

            <button type="submit" class="btn btn-primary">Create Job</button>

            <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>