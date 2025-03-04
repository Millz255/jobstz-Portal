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

    <!-- Display Validation Errors -->
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.jobs.update', $job->id) }}" method="POST">
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
        <label for="location" class="form-label">Job Location:</label>
        <input type="text" id="location" name="location" value="{{ old('location', $job->location) }}" class="form-control" required>
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

  <!-- Optional: JavaScript for form validation (Bootstrap or custom) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
