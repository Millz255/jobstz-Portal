<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #eef2f9;
            font-family: 'Nunito', sans-serif;
            color: #e0f7fa;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        .navbar-admin {
            background-color: #1e3a8a;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            padding-top: 0.9rem;
            padding-bottom: 0.9rem;
            border-bottom: none;
        }
        .navbar-admin .navbar-brand {
            color: #ffffff;
            font-weight: 700;
            font-size: 1.45rem;
            letter-spacing: -0.01em;
        }
        .navbar-admin .nav-link {
            color: rgba(255, 255, 255, 0.75);
            margin-left: 1.1rem;
            padding: 0.6rem 1.2rem;
            border-radius: 0.4rem;
            font-size: 0.95rem;
            transition: background-color 0.2s, color 0.2s, transform 0.2s;
        }
        .navbar-admin .nav-link:hover, .navbar-admin .nav-link.active {
            background-color: rgba(255, 255, 255, 0.12);
            color: #ffffff;
            transform: translateY(-2px);
        }

        .bottom-nav-admin {
            background-color: #1a2e78;
            padding: 25px 0;
            text-align: center;
            border-top: none;
            margin-top: 35px;
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
        }
        .bottom-nav-admin a {
            color: rgba(255, 255, 255, 0.8);
            margin: 0 20px;
            text-decoration: none;
            font-weight: 400;
            transition: color 0.2s, transform 0.2s;
        }
        .bottom-nav-admin a:hover {
            color: #ffffff;
            text-decoration: underline;
            transform: translateY(-1px);
        }

        .btn-primary, .btn-secondary, .btn-danger, .btn-info, .btn-warning {
            color: white;
            font-weight: 600;
            border: none;
            border-radius: 0.4rem;
            padding: 0.8rem 1.6rem;
            box-shadow: 0 0.3rem 0.7rem rgba(0, 0, 0, 0.1);
            transition: background-color 0.2s, transform 0.2s, box-shadow 0.2s;
            font-size: 0.95rem;
            letter-spacing: -0.01em;
        }
        .btn-primary {
            background-color: #3b82f6;
        }
        .btn-primary:hover {
            background-color: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .btn-secondary {
            background-color: #6b7280;
            color: #ffffff;
        }
        .btn-secondary:hover {
            background-color: #4b5563;
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .btn-danger {
            background-color: #ef4444;
        }
        .btn-danger:hover {
            background-color: #dc2626;
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .btn-info {
            background-color: #38b6ff;
        }
        .btn-info:hover {
            background-color: #0ea5e9;
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .btn-warning {
            background-color: #f59e0b;
            color: #ffffff;
        }
        .btn-warning:hover {
            background-color: #d97706;
            transform: translateY(-2px);
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }

        .metric-card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 1.2rem;
            margin-bottom: 2.5rem;
        }
        .metric-card {
            background-color: #1e3a8a;
            border-radius: 0.5rem;
            box-shadow: 0 0.4rem 0.9rem rgba(0, 0, 0, 0.1);
            padding: 2rem;
            flex: 1 1 220px;
            min-width: 220px;
            text-align: left;
            transition: transform 0.2s, box-shadow 0.2s;
            border-top: 5px solid #3b82f6;
        }
        .metric-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 0.6rem 1.2rem rgba(0, 0, 0, 0.15);
        }
        .metric-icon {
            font-size: 2.3rem;
            color: #ffffff;
            margin-bottom: 0.9rem;
            opacity: 0.85;
        }
        .metric-value {
            font-size: 1.9rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 0.4rem;
            letter-spacing: -0.02em;
        }
        .metric-title {
            font-size: 1rem;
            color: rgba(255, 255, 255, 0.7);
        }

        .table-wrapper {
            border-radius: 0.5rem;
            overflow: hidden;
            box-shadow: 0 0.4rem 0.8rem rgba(0, 0, 0, 0.08);
            transition: box-shadow 0.3s ease-in-out;
        }
        .table-wrapper:hover {
            box-shadow: 0 0.6rem 1.2rem rgba(0, 0, 0, 0.12);
        }
        .table {
            margin-top: 0;
            margin-bottom: 0;
            background-color: white;
        }
        .table thead th {
            background-color: #dbeafe;
            color: #4b5563;
            border-color: #e0e7ff;
            padding: 0.7rem 0.8rem; /* Reduced header padding */
            font-weight: 600;
            /* text-transform: uppercase;  Removed uppercase */
            letter-spacing: 0.03em;
            font-size: 0.85rem;
            border-bottom: 2px solid #cbd5e0;
        }
        .table tbody td {
            padding: 0.9rem 0.8rem;
            vertical-align: middle;
            border-color: #f0f2f5;
            font-size: 0.9rem;
            color: #4a5568;
            word-break: break-word; /* Added word-break */
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f9fafb;
        }

        .form-control {
            border-radius: 0.4rem;
            padding: 0.8rem 1.1rem;
            border: 1.5px solid #e0e7ff;
            box-shadow: 0 0.1rem 0.2rem rgba(0, 0, 0, 0.03);
            font-size: 0.9rem;
            transition: border-color 0.2s, box-shadow 0.2s;
        }
        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }
        .input-group-text {
            background-color: #edf2f9;
            color: #6b7280;
            border-color: #e0e7ff;
            border-radius: 0.4rem 0 0 0.4rem;
            padding: 0.8rem 1.1rem;
            font-size: 0.9rem;
        }

        .pagination {
            margin-top: 2rem;
            justify-content: center;
        }
        .pagination .page-link {
            color: #4b5563;
            border-color: #e0e7ff;
            margin: 0 0.3rem;
            border-radius: 0.4rem;
            padding: 0.6rem 1rem;
            font-size: 0.85rem;
            transition: background-color 0.2s, color 0.2s, border-color 0.2s, box-shadow 0.2s;
        }
        .pagination .page-link:hover {
            background-color: #edf2f9;
            color: #374151;
            box-shadow: 0 0.1rem 0.2rem rgba(0, 0, 0, 0.04);
        }
        .pagination .page-item.active .page-link {
            background-color: #3b82f6;
            border-color: #3b82f6;
            color: white;
            box-shadow: 0 0.3rem 0.6rem rgba(0, 0, 0, 0.1);
        }
        .pagination .page-item:not(:first-child) .page-link,
        .pagination .page-item:not(:last-child) .page-link {
            margin-left: 0;
        }
        .pagination .page-item:first-child .page-link,
        .pagination .page-item:last-child .page-link {
            border-radius: 0.4rem;
        }

        .card {
            border-radius: 0.5rem;
            box-shadow: 0 0.4rem 0.8rem rgba(0, 0, 0, 0.08);
            margin-bottom: 2.5rem;
            border: none;
            transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
        }
        .card:hover {
            box-shadow: 0 0.7rem 1.5rem rgba(0, 0, 0, 0.12);
            transform: translateY(-3px);
        }
        .card-header {
            background-color: #ffffff;
            border-bottom: 2px solid #e0e7ff;
            padding: 1.3rem 1.7rem;
            font-weight: 700;
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
            color: #374151;
            font-size: 1.1rem;
        }
        .card-body {
            padding: 1.7rem;
        }

        h2 {
            color: #374151;
            margin-bottom: 1.3rem;
            font-weight: 800;
            font-size: 2rem;
            letter-spacing: -0.03em;
        }
        h3 {
            color: #4b5563;
            margin-top: 2.7rem;
            margin-bottom: 1.3rem;
            font-weight: 700;
            font-size: 1.2rem;
        }
        p {
            color: #6b7280;
            margin-bottom: 1.7rem;
            font-size: 0.95rem;
            line-height: 1.6;
        }
        .breadcrumb {
            background-color: #edf2f9;
            padding: 0.9rem 1.4rem;
            border-radius: 0.4rem;
            margin-bottom: 2.5rem;
            font-size: 0.9rem;
        }
        .breadcrumb-item a {
            color: #3b82f6;
            text-decoration: none;
            transition: color 0.2s;
        }
        .breadcrumb-item a:hover {
            color: #2563eb;
        }
        .breadcrumb-item.active {
            color: #4b5563;
        }
        .breadcrumb-item+.breadcrumb-item::before {
            color: #9ca3af;
        }

        .dashboard-actions {
            margin-bottom: 2.5rem;
            display: flex;
            gap: 1.2rem;
            justify-content: start;
        }
        .dashboard-card-chart {
            margin-bottom: 2.5rem;
        }
        .dashboard-metric-area {
            margin-bottom: 3rem;
        }
        .dashboard-table-filters {
            margin-bottom: 2rem;
        }
        .dashboard-table-wrapper {
            margin-bottom: 2.5rem;
        }

        .mt-4 { margin-top: 3rem !important; }
        .mb-4 { margin-bottom: 3rem !important; }
        .mt-5 { margin-top: 4rem !important; }
        .mb-5 { margin-bottom: 4rem !important; }

        body * {
            transition: all 0.2s ease-in-out;
        }


    </style>

    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-admin">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="adminNavbar">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.jobs.create') }}"><i class="fas fa-plus me-1"></i> Create</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.jobs.index') }}"><i class="fas fa-briefcase me-1"></i> Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.articles.index') }}"><i class="fas fa-newspaper me-1"></i> Articles</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.logout') }}"><i class="fas fa-sign-out-alt me-1"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row mb-4">
            <div class="col-md-12">
                <h2>Dashboard Overview</h2>
                <p class="lead text-muted" style="font-size: 1.1rem;">Manage your job listings and articles efficiently.</p>
            </div>
        </div>

        <div class="dashboard-metric-area metric-card-container">
            <div class="metric-card">
                <i class="fas fa-briefcase metric-icon"></i>
                <div class="metric-value">{{ $jobs->total() }}</div>
                <div class="metric-title">Job Listings</div>
            </div>
            <div class="metric-card">
                <i class="fas fa-newspaper metric-icon"></i>
                <div class="metric-value">{{ $articles->total() }}</div>
                <div class="metric-title">Articles</div>
            </div>
            <div class="metric-card">
                <i class="fas fa-list-alt metric-icon"></i>
                <div class="metric-value">{{ $categories->count() }}</div>
                <div class="metric-title">Categories</div>
            </div>
        </div>

        <div class="dashboard-actions">
            <a href="{{ route('admin.jobs.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i> New Job</a>
            <a href="{{ route('admin.articles.create') }}" class="btn btn-info"><i class="fas fa-plus"></i> New Article</a>
            <a href="{{ route('admin.logout') }}" class="btn btn-danger"><i class="fas fa-sign-out-alt"></i> Sign Out</a>
        </div>

        <div class="dashboard-card-chart card mb-5">
            <div class="card-header"><i class="fas fa-chart-bar"></i> Top Searched Categories</div>
            <div class="card-body">
                <canvas id="categoryChart" width="400" height="260"></canvas> </div>
        </div>

        <div class="dashboard-table-wrapper">
            <h3><i class="fas fa-briefcase"></i> Job Listings</h3>
            <div class="dashboard-table-filters mb-3">
                <form action="{{ route('admin.dashboard') }}" method="GET" class="row gy-3 gx-3 align-items-center">
                    <div class="col-md-auto">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control" name="job_search_keyword" placeholder="Search Jobs..." value="{{ request('job_search_keyword') }}">
                        </div>
                    </div>
                    <div class="col-md-auto">
                        <select name="job_category_filter" class="form-control">
                            <option value="">All Categories</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ request('job_category_filter') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-auto">
                        <div class="input-group">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            <input type="date" class="form-control" name="job_date_filter" value="{{ request('job_date_filter') }}">
                        </div>
                    </div>
                    <div class="col-md-auto">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> Filter</button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary"><i class="fas fa-times"></i> Reset</a>
                    </div>
                </form>
            </div>
            <div class="table-responsive table-wrapper">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Location</th>
                            <th>Deadline</th>
                            <th>Created At</th>  <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jobs as $job)
                            <tr>
                                <td>{{ $job->title }}</td>
                                <td>{{ $job->category->name }}</td>
                                <td>{{ $job->location->name }}</td>
                                <td>{{ $job->deadline }}</td>
                                <td>{{ $job->created_at->toDateString() }}</td> <td class="text-center">
                                    <a href="{{ route('admin.jobs.edit', $job->id) }}" class="btn btn-warning btn-sm" title="Edit Job"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Job"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                    <form action="{{ route('admin.jobs.markExpired', $job->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-secondary btn-sm" title="Mark as Expired"><i class="fas fa-ban"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No listings found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $jobs->appends(request()->except('page'))->links('pagination::bootstrap-5') }}
            </div>
        </div>

        <div class="dashboard-table-wrapper mt-5">
            <h3><i class="fas fa-newspaper"></i> Article Listings</h3>
            <div class="dashboard-table-filters mb-3">
                <form action="{{ route('admin.dashboard') }}" method="GET" class="row gy-3 gx-3 align-items-center">
                    <div class="col-md-auto">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                            <input type="text" class="form-control" name="article_search_keyword" placeholder="Search Articles..." value="{{ request('article_search_keyword') }}">
                        </div>
                    </div>
                    <div class="col-md-auto">
                        <div class="input-group">
                            <span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
                            <input type="date" class="form-control" name="article_date_filter" value="{{ request('article_date_filter') }}">
                        </div>
                    </div>
                    <div class="col-md-auto">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-filter"></i> Filter Articles</button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary"><i class="fas fa-times"></i> Reset</a>
                    </div>
                </form>
            </div>
            <div class="table-responsive table-wrapper">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Created At</th> <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($articles as $article)
                            <tr>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->created_at->toDateString() }}</td> <td class="text-center">
                                    <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-warning btn-sm" title="Edit Article"><i class="fas fa-edit"></i></a>
                                    <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Delete Article"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">No listings found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $articles->appends(request()->except('page'))->links('pagination::bootstrap-5') }}
            </div>
        </div>

    </div>

    <footer class="bottom-nav-admin">
        <a href="{{ route('admin.jobs.index') }}">Jobs</a>
        <a href="{{ route('admin.articles.index') }}">Articles</a>
        <a href="{{ route('admin.logout') }}">Logout</a>
    </footer>

    <script>
        var ctx = document.getElementById('categoryChart').getContext('2d');
        var categoryChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: @json($chartCategories),
                datasets: [{
                    label: 'Search Frequency',
                    data: @json($chartSearchData),
                    backgroundColor: 'rgba(59, 130, 246, 0.75)',
                    borderColor: '#3b82f6',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: '#e0e0e7'
                        },
                        ticks: {
                            color: '#6b7280'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            color: '#6b7280'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Top Searched Categories',
                        color: '#4a5568',
                        font: {
                            size: 16,
                            weight: '600'
                        },
                        padding: {
                            bottom: 10
                        }
                    }
                }
            }
        });
    </script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>