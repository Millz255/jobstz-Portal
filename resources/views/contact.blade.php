<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Jobstz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #e8f0fe; 
            color: #333;
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            background-color: #1a237e; 
        }
        .navbar .navbar-brand, .navbar-nav .nav-link {
            color: white;
            font-weight: 500;
        }
        .navbar-nav .nav-link:hover {
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
        }
        .hero-section {
            background: linear-gradient(135deg, #1a237e, #7986cb); 
            color: white;
            padding: 80px 0;
            text-align: center;
            margin-bottom: 30px;
        }
        .hero-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 10px;
            color: white;
        }
        .hero-slogan {
            font-size: 1.2rem;
            margin-bottom: 30px;
            font-style: italic;
            color: #e0e0e0;
        }
        .container {
            max-width: 950px;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.15);
        }
        .bottom-nav {
            background-color: #e8f0fe;
            padding: 20px 0;
            text-align: center;
            border-top: 1px solid #b2ebf2;
            margin-top: 50px;
        }
        .bottom-nav a {
            color: #0C08EBFF;
            text-decoration: none;
            margin: 0 20px;
            font-weight: 500;
        }
        .bottom-nav a:hover {
            color: #001BB3FF;
            text-decoration: underline;
        }
        .contact-form {
            margin-bottom: 20px;
        }
        .contact-info {
            margin-top: 20px;
            padding: 20px;
            background-color: #f0f0f0;
            border-radius: 8px;
        }
        .contact-info h5 {
            margin-bottom: 15px;
            color: #1a237e;
        }
        .contact-info p, .contact-info a {
            color: #555;
            line-height: 1.6;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Jobstz</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('government.jobs') }}">Government Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">About</a>
                    </li>
                    <li class="nav-item">
                           <a class="nav-link" href="{{ route('contact') }}">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('articles.index') }}">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact') }}">Advertisem With Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="hero-section">
        <h1 class="hero-title">Contact Jobstz</h1>
        <p class="hero-slogan">We're here to help. Reach out to us!</p>
    </div>

    <div class="container">
        <h2 class="mb-4 text-center">Send us a Message</h2>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('contact.submit') }}" class="contact-form">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Your Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Your Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject') }}" required>
                @error('subject')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="message" class="form-label">Your Message</label>
                <textarea class="form-control" id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                @error('message')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100 btn-blue">Send Message</button>
        </form>

        <div class="contact-info">
            <h5 class="mb-3">Contact Information</h5>
            <p><strong>Email:</strong> <a href="mailto:your-email@example.com">mgimwaemily@icloud.com</a></p>
        </div>
    </div>

    <div class="bottom-nav">
        <a href="{{ route('jobs.index') }}">Job Listings</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('contact') }}">Contact</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>