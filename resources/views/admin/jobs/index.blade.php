<!DOCTYPE html>
<html>
<head>
  <title>Admin - Job Listings</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <h1>Job Listings</h1>

    <!-- Filter Form -->
    <form action="{{ url()->current() }}" method="get" class="mb-3">
      <!-- Search by job title -->
      <div class="mb-2">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search by job title" class="form-control">
      </div>

      <!-- Category Filter -->
      <div class="mb-2">
        <select name="category" class="form-control">
          <option value="">Select Category</option>
          @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
              {{ $category->name }}
            </option>
          @endforeach
        </select>
      </div>

      <!-- Location Filter -->
      <div class="mb-2">
        <select name="location" class="form-control">
          <option value="">Select Location</option>
          @foreach ($locations as $location)
            <option value="{{ $location->id }}" {{ request('location') == $location->id ? 'selected' : '' }}>
              {{ $location->name }}
            </option>
          @endforeach
        </select>
      </div>

      <!-- Submit Button -->
      <button type="submit" class="btn btn-primary">Filter</button>
    </form>

    <!-- Create New Job Button -->
    <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary mb-3">Create New Job</a>

    <!-- Job Listings Table -->
    <table class="table table-striped">
      <thead>
        <tr>
          <th class="text-center">Title</th>
          <th class="text-center">Company</th>
          <th class="text-center">Location</th>
          <th class="text-center">Deadline</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($jobs as $job)
        <tr>
          <td>{{ $job->title }}</td>
          <td>{{ $job->company }}</td>
          <td>{{ $job->location ? $job->location->name : 'No Location' }}</td>
          <td>{{ $job->deadline }}</td>
          <td>
            <a href="{{ route('admin.jobs.edit', $job->id) }}" class="btn btn-sm btn-primary">Edit</a>
            <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" style="display: inline;">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</body>
</html>
