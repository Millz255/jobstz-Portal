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

    <form action="{{ route('admin.jobs.store') }}" method="POST">
      @csrf

      <!-- Job Title -->
      <div class="mb-3">
        <label for="title" class="form-label">Job Title:</label>
        <input type="text" id="title" name="title" class="form-control" placeholder="Enter job title" required value="{{ old('title') }}">
      </div>

      <!-- Job Description -->
      <div class="mb-3">
        <label for="description" class="form-label">Job Description:</label>
        <textarea id="description" name="description" class="form-control" placeholder="Enter detailed job description" required>{{ old('description') }}</textarea>
      </div>

      <!-- Company Name -->
      <div class="mb-3">
        <label for="company" class="form-label">Company Name:</label>
        <input type="text" id="company" name="company" class="form-control" placeholder="Enter company name" required value="{{ old('company') }}">
      </div>

      <!-- Job Location -->
      <div class="mb-3">
        <label for="location" class="form-label">Location:</label>
        <input type="text" id="location" name="location" class="form-control" placeholder="Enter job location" required value="{{ old('location') }}">
      </div>

      <!-- Application Deadline -->
      <div class="mb-3">
        <label for="deadline" class="form-label">Application Deadline:</label>
        <input type="date" id="deadline" name="deadline" class="form-control" required value="{{ old('deadline') }}">
      </div>

      <!-- Category -->
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

      <!-- Application Link (Optional) -->
      <div class="mb-3">
        <label for="application_link" class="form-label">Application Link (Optional):</label>
        <input type="url" id="application_link" name="application_link" class="form-control" placeholder="Enter application link (optional)" value="{{ old('application_link') }}">
        <small class="form-text text-muted">Provide the URL where applicants can apply.</small>
      </div>

      <!-- Submit Button -->
      <button type="submit" class="btn btn-primary">Create Job</button>
      
      <!-- Cancel Button -->
      <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
  </div>

  <!-- Optional: Bootstrap Bundle with Popper for form validation or JavaScript functionality -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
