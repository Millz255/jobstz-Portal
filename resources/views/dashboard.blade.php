<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-light">
    <div class="container mt-4">
        <h2>Admin Dashboard</h2>
        <p>Welcome to the admin dashboard. Here, you can manage job listings, articles, and more.</p>

        <div class="mb-4">
            <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary">Create New Job</a>
            <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary">Manage Jobs</a>
            <a href="{{ route('admin.articles.index') }}" class="btn btn-info">Manage Articles</a>
            <a href="{{ route('admin.logout') }}" class="btn btn-danger">Logout</a>
        </div>

        <!-- Graphical View: Most Searched Categories -->
        <div class="card">
            <div class="card-header">Most Searched Categories</div>
            <div class="card-body">
                <canvas id="categoryChart" width="400" height="200"></canvas>
            </div>
        </div>

        <!-- Job List -->
        <div class="mt-4">
            <h3>Job Listings</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Location</th>
                        <th>Deadline</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($jobs as $job)
                        <tr>
                            <td>{{ $job->title }}</td>
                            <td>{{ $job->category->name }}</td>
                            <td>{{ $job->location->name }}</td>
                            <td>{{ $job->deadline }}</td>
                            <td>
                                <a href="{{ route('admin.jobs.edit', $job->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                                <form action="{{ route('admin.jobs.markExpired', $job->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-secondary btn-sm">Mark as Expired</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Article Management Section -->
        <div class="mt-4">
            <h3>Article Listings</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{ $article->title }}</td>
                            <td>
                                <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // Graphical View: Chart.js for displaying most searched categories
        var ctx = document.getElementById('categoryChart').getContext('2d');
        var categoryChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($categories), // Category names
                datasets: [{
                    label: 'Search Frequency',
                    data: @json($searchData), // Search count data
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

</body>
</html>
