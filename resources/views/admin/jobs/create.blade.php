<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Create Job Listing</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
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

        .btn-primary, .btn-secondary {
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


        .form-control {
            border-radius: 0.4rem;
            padding: 0.8rem 1.1rem;
            border: 1.5px solid #e0e7ff;
            box-shadow: 0 0.1rem 0.2rem rgba(0, 0, 0, 0.03);
            font-size: 0.9rem;
            transition: border-color 0.2s, box-shadow 0.2s;
            background-color: #ffffff;
            color: #4a5568;
        }
        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.15);
        }
        .form-label {
            color: #ffffff;
            font-weight: 600;
            margin-bottom: 0.5rem;
            display: block;
        }
        .form-text {
            color: #ffffff; /* **FORM TEXT IS NOW WHITE - FOR VISIBILITY** */
            font-size: 0.85rem;
            margin-top: 0.25rem;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
            border-radius: 0.4rem;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }
        .alert-danger ul {
            margin-bottom: 0;
            padding-left: 1.2rem;
        }

        h1 {
            color: #ffffff;
            margin-bottom: 1.5rem;
            font-weight: 800;
            font-size: 2.2rem;
            letter-spacing: -0.03em;
            text-align: center;
        }

        .container {
            background-color: #1e3a8a;
            border-radius: 0.5rem;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
            padding: 2rem 2.5rem;
            margin-top: 2rem;
            margin-bottom: 3rem;
        }


        body * {
            transition: all 0.2s ease-in-out;
        }
    </style>

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
        <h1>Create New Job Listing</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.jobs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Job Title</label>
                <input type="text" id="title" name="title" class="form-control" placeholder="Enter job title" required value="{{ old('title') }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Job Description</label>
                <textarea id="description" name="description" class="form-control" rows="5" placeholder="Enter detailed job description" required>{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="company" class="form-label">Company Name</label>
                <input type="text" id="company" name="company" class="form-control" placeholder="Enter company name" required value="{{ old('company') }}">
            </div>

            <div class="mb-3">
                <label for="company_logo" class="form-label">Company Logo (Optional)</label>
                <input type="file" id="company_logo" name="company_logo" class="form-control">
                <small class="form-text text-muted"><b>Upload company logo image (JPEG, PNG, JPG, GIF, SVG, max 2MB). Leave blank to keep current logo.</b></small>
            </div>

            <div class="mb-3">
                <label for="pdf_file" class="form-label">Job Description PDF (Optional)</label>
                <input type="file" id="pdf_file" name="pdf_file" class="form-control">
                <small class="form-text text-muted"><b>Upload job description as PDF file (PDF, max 10MB).</b></small>
            </div>

            <div class="mb-3">
                <label for="location_id" class="form-label">Location</label>
                <select id="location_id" name="location_id" class="form-control" required>
                    <option value="">Select Location</option>
                    @foreach($locations as $location)
                        <option value="{{ $location->id }}" {{ old('location_id') == $location->id ? 'selected' : '' }}>
                            {{ $location->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="deadline" class="form-label">Application Deadline</label>
                <input type="date" id="deadline" name="deadline" class="form-control" required value="{{ old('deadline') }}">
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select id="category_id" name="category_id" class="form-control" required>
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="application_link" class="form-label">Application Link (Optional)</label>
                <input type="url" id="application_link" name="application_link" class="form-control" placeholder="Enter application link (optional)" value="{{ old('application_link') }}">
                <small class="form-text text-muted"><b>Provide the URL where applicants can apply.</b></small>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Create Job Listing</button>
                <a href="{{ route('admin.jobs.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <footer class="bottom-nav-admin">
        <a href="{{ route('admin.jobs.index') }}">Jobs</a>
        <a href="{{ route('admin.articles.index') }}">Articles</a>
        <a href="{{ route('admin.logout') }}">Logout</a>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>