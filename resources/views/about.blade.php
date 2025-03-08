<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Jobstz</title> <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
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
        <h1 class="hero-title">About Jobstz</h1>
        <p class="hero-slogan">Learn more about our mission and values.</p>
    </div>

    <div class="container my-5">
        <h2 class="mb-4">Our Mission</h2>
        <p class="mb-4">At Jobstz, we are dedicated to helping individuals find meaningful employment opportunities. Our mission is to connect job seekers with companies that align with their skills, aspirations, and career goals. We provide a platform that simplifies the job search process and helps you discover jobs that are a perfect match.</p>

        <h2 class="mb-4">Why We Are Here to Help</h2>
        <p class="mb-4">We understand that finding a job can be overwhelming, and that's why we're here. Jobstz aims to break down the barriers between job seekers and employers by providing easy access to job listings, personalized recommendations, and career resources.</p>
        <p class="mb-4">Our platform not only offers job listings but also provides resources such as resume-building tips, interview preparation, career advice, and much more. We are committed to ensuring that your job search journey is smooth, efficient, and successful.</p>
        <p class="mb-4">Whether you're looking for your first job, switching careers, or seeking a senior-level position, Jobstz is here to support you every step of the way. We believe everyone deserves an opportunity to thrive in their careers, and we strive to make that a reality for every job seeker.</p>

        <h2 class="mb-4">Our Core Values</h2>
        <ul class="list-unstyled">
            <li class="mb-2"><i class="fas fa-check-circle me-2 text-primary"></i> <strong>Empathy</strong> – We understand the challenges job seekers face and offer a supportive environment.</li>
            <li class="mb-2"><i class="fas fa-check-circle me-2 text-primary"></i> <strong>Integrity</strong> – We ensure that job listings and employers on our platform are legitimate and trustworthy.</li>
            <li class="mb-2"><i class="fas fa-check-circle me-2 text-primary"></i> <strong>Collaboration</strong> – We work closely with employers to match them with the best candidates.</li>
            <li class="mb-2"><i class="fas fa-check-circle me-2 text-primary"></i> <strong>Innovation</strong> – We constantly evolve our platform to better serve job seekers and employers.</li>
        </ul>
    </div>

    <div class="bottom-nav">
        <a href="{{ route('jobs.index') }}">Job Listings</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('contact') }}">Contact</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>