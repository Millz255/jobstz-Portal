<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Article</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Very light grey background, almost white */
        }
        .container {
            margin-top: 20px;
            background-color: white; /* White container background */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05); /* Optional: subtle shadow for container */
        }
        .navbar {
            margin-bottom: 20px;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: white !important; /* Ensure navbar text is white */
        }
        .btn-primary, .btn-info, .btn-secondary, .btn-danger, .btn-warning {
            color: white !important; /* Ensure button text is white for contrast */
        }
        /* You can add more custom styles here if needed */
    </style>
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Panel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="adminNavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.jobs.index') }}">Manage Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.articles.index') }}">Manage Articles</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.logout') }}">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <h2>Create New Blog Article</h2>
        <p>Use the form below to create a new article for your blog.</p>

        <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Article Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Article Content</label>
                <textarea class="form-control" id="content" name="content" rows="8" required></textarea>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Article Image (Optional)</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <div class="mb-3">
                <label for="video_url" class="form-label">Video URL (Optional)</label>
                <input type="url" class="form-control" id="video_url" name="video_url">
            </div>

            <button type="submit" class="btn btn-primary">Create Article</button>
            <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Cancel</a>
        </form>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>