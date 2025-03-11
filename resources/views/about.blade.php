<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Jobstz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet"> <style>
        /* Modern Reset and Base Styles */
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif; /* Modern Font */
            background-color: #e8f0fe; /* Articles Page Background Color - Changed from #fff */
            color: #333; /* Articles Page Text Color - Changed from #343a40 */
            line-height: 1.7;
            overflow-x: hidden; /* Prevent horizontal scrollbar */
            opacity: 0;
            animation: fadeIn 0.6s ease-out forwards; /* Page Load Fade-In Animation */
        }

        @keyframes fadeIn {
            to { opacity: 1; }
        }

        a {
            text-decoration: none;
            color: inherit; /* Inherit color from parent */
            transition: color 0.2s ease-in-out; /* Smooth link color transition */
        }

        ul, ol {
            padding-left: 0;
            list-style: none;
        }

        /* Navbar - Modernized - BLUE (Kept as is) */
        .navbar {
            background-color: #1a237e;
            padding: 1.5rem 2rem;
            box-shadow: 0 0.25rem 0.5rem rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            font-size: 1.75rem;
            font-weight: 700;
            color: #fff;
            transition: color 0.2s ease-in-out;
        }

        .navbar-brand:hover {
            color: #e0e7ff;
        }

        .navbar-toggler {
            border: none;
            background: transparent;
            padding: 0.5rem;
            cursor: pointer;
        }

        .navbar-toggler-icon {
            width: 1.5em;
            height: 1.5em;
            vertical-align: middle;
            color: #fff;
        }

        .navbar-nav .nav-link {
            color: #fff;
            font-weight: 500;
            padding: 0.75rem 1.2rem;
            border-radius: 0.3rem;
            margin: 0 0.25rem;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
        }

        .navbar-nav .nav-link:hover,
        .navbar-nav .nav-link.active {
            background-color: rgba(255, 255, 255, 0.15);
            color: #fff;
        }

        /* Hero Section - Modern & Clean - GRADIENT - MATCH ARTICLES PAGE */
        .hero-section {
            background: linear-gradient(135deg, #1a237e, #7986cb); /* Articles Page Hero Gradient - Changed from #1a237e solid blue */
            color: #fff;
            padding: 80px 0;
            text-align: center;
            margin-bottom: 30px; /* Reduced margin to match articles page */
        }

        .hero-title {
            font-size: 2.5rem; /* Slightly smaller Hero Title to match articles page */
            font-weight: 700;
            margin-bottom: 10px; /* Reduced margin to match articles page */
            color: #fff;
            letter-spacing: -0.02em;
        }

        .hero-slogan {
            font-size: 1.2rem; /* Slightly smaller Hero Slogan to match articles page */
            color: #e0e0e0; /* Lighter Slogan Color to match articles page - Changed from #e0e7ff */
            font-style: italic; /* Reverted to italic to match articles page */
            font-weight: 400;
            margin-bottom: 30px; /* Reduced margin to match articles page */
        }

        /* Container - Elevated (Kept as is - white background is fine) */
        .container {
            max-width: 1100px; /* Wider container to match articles page */
            background-color: #fff;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 0.75rem 1.5rem rgba(0, 0, 0, 0.1);
            margin-bottom: 50px;
        }

        /* Section Titles - BLUE (Kept as blue) */
        .section-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1a237e;
            margin-bottom: 30px;
            text-align: left;
            position: relative;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid #e0e7ff;
            display: inline-block;
        }


        /* Core Values Section (Kept as is) */
        .core-values-section {
            margin-top: 30px;
        }

        .core-values-list {
            list-style: none;
            padding-left: 0;
        }

        .core-values-item {
            margin-bottom: 15px;
            display: flex;
            align-items: flex-start;
        }

        .value-icon {
            margin-right: 15px;
            color: #1a237e;
            font-size: 1.2rem;
            margin-top: 0.2rem;
        }

        .value-text strong {
            font-weight: 600;
            color: #495057;
        }


        /* FAQ Section - Enhanced Layout & Animations (Kept as is) */
        .faq-section {
            margin-top: 40px; /* Reduced top margin to match articles page */
            padding-top: 40px;
            border-top: 1px solid #b2ebf2; /* Lighter border top to match articles page bottom nav border - Changed from  #e0e7ff */
        }

        /* FAQ Title - BLUE (Kept as blue) */
        .faq-title {
            font-size: 2.2rem;
            margin-bottom: 25px; /* Reduced bottom margin to match articles page */
            text-align: center;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            color: #1a237e;
            display: block;
            border-bottom: none;
            padding-bottom: 0;
        }


        .faq-item {
            margin-bottom: 15px; /* Reduced bottom margin to match articles page */
            border: none;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.07);
            background-color: #fff;
            transition: box-shadow 0.3s ease-in-out, transform 0.3s ease-in-out;
        }

        .faq-item:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
            transform: translateY(-3px);
        }

        .faq-header {
            background-color: #fff;
            padding: 15px; /* Reduced padding to match articles page */
            cursor: pointer;
            position: relative;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #f1f3f5;
        }


        .faq-header h6 {
            margin-bottom: 0;
            font-weight: bold; /* Reverted to bold to match articles page */
            color: #333; /* Reverted to #333 to match articles page */
        }


        .faq-body {
            padding: 15px; /* Reduced padding to match articles page */
            background-color: #fff; /* Changed to white to match articles page article card bg - from #fefefe */
            color: #555;
            opacity: 0;
            max-height: 0;
            overflow: hidden;
            transition: opacity 0.5s ease-out, max-height 0.5s ease-out;
        }

        .faq-body.show {
            opacity: 1;
            max-height: 1200px;
            transition: opacity 0.5s ease-out, max-height 0s ease-out 0.5s;
        }


        .faq-arrow {
            position: relative;
            right: 15px; /* Re-positioned arrow to match articles page */
            top: auto;
            transform: none;
            transition: transform 0.35s ease-in-out;
            color: #777;
            font-size: 1rem; /* Reduced size to match articles page */
        }

        .faq-header.collapsed .faq-arrow {
            transform: rotate(-90deg) scale(0.9);
        }


        /* Color Meaning Explanation - Modernized (Kept as is) */
        .color-meanings {
            margin-top: 20px; /* Reduced top margin to match articles page */
            padding: 15px; /* Reduced padding to match articles page */
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.04);
            border: 1px solid #e0e7ff;
        }

        .color-meanings h6 {
            font-weight: bold; /* Reverted to bold to match articles page "Most Read" title style */
            margin-bottom: 10px; /* Reduced bottom margin to match articles page */
            color: #333; /* Reverted to #333 to match articles page */
            font-size: 1.1rem; /* Reduced size to match articles page "Most Read" title style */
        }

        .color-meaning-item {
            display: flex;
            align-items: center;
            margin-bottom: 8px; /* Reduced bottom margin to match articles page "Most Read" items spacing */
        }

        .color-box {
            width: 20px; /* Reduced size to match articles page */
            height: 20px;
            border-radius: 6px; /* Reduced border radius to match articles page */
            margin-right: 10px; /* Reduced margin to match articles page */
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: transform 0.25s ease-in-out, box-shadow 0.25s ease-in-out;
        }

        .color-box:hover {
            transform: scale(1.15);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .color-text {
            color: #555;
            font-size: 0.95rem; /* Reduced size to match articles page article text size */
            line-height: 1.7;
            font-weight: 400;
        }

        .expired-color-box {
            background-color: #ff4d4d;
        }

        .soon-expiring-color-box {
            background-color: #ffc107;
        }


        /* Bottom Navigation - Simplified - MATCH ARTICLES PAGE */
        .bottom-nav {
            background-color: #e8f0fe; /* Articles Page Bottom Nav Background - Changed from #fff */
            padding: 20px 0;
            text-align: center;
            border-top: 1px solid #b2ebf2; /* Articles Page Bottom Nav Border - Changed from #e0e7ff */
            margin-top: 50px; /* Reduced top margin to match articles page */
            box-shadow: none; /* Removed shadow to match articles page */
        }

        .bottom-nav a {
            color: #0C08EBFF; /* Articles Page Bottom Nav Link Color - Changed from #495057 */
            text-decoration: none;
            margin: 0 20px; /* Reduced horizontal margin to match articles page */
            font-weight: 500;
            transition: color 0.2s ease-in-out;
        }

        .bottom-nav a:hover {
            color: #001BB3FF; /* Darker blue hover color from articles page */
        }

        /* Responsive Adjustments - Fine-tuned (Kept as is) */
        @media (max-width: 992px) { /* Bootstrap MD Breakpoint for Tablet and Below */
            .navbar {
                padding: 1rem 1.5rem;
            }

            .navbar-brand {
                font-size: 1.5rem;
            }

            .navbar-nav {
                text-align: center;
            }

            .navbar-nav .nav-link {
                margin: 0.5rem 0;
                padding: 0.75rem 1rem;
            }

            .hero-section {
                padding: 80px 20px;
            }

            .hero-title {
                font-size: 2.2rem;
            }

            .hero-slogan {
                font-size: 1.1rem;
            }

            .container {
                padding: 30px 20px;
            }

            .section-title {
                font-size: 1.8rem;
            }

            .faq-title {
                font-size: 2rem;
            }

            .faq-header {
                padding: 20px;
            }

            .faq-body {
                padding: 20px;
            }

            .color-meanings {
                padding: 25px;
            }

            .bottom-nav {
                padding: 25px 0;
            }

            .bottom-nav a {
                margin: 0 15px;
            }
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
                    <a class="nav-link" href="{{ route('contact') }}">Advertise With Us</a>
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
    <h2 class="section-title">Our Mission</h2>
    <p class="mb-4">At Jobstz, we are driven by a singular mission: to empower individuals in their job search and career growth journey. We believe in connecting talent with opportunity, creating pathways for professionals to find fulfilling employment and for companies to discover exceptional talent. Our platform is built on the foundation of simplifying the job search, making it efficient, accessible, and ultimately, successful for every user.</p>

    <h2 class="section-title">Why Jobstz Exists</h2>
    <p class="mb-4">The modern job market is complex and often challenging to navigate. Jobstz was created to address these challenges head-on. We recognized the need for a platform that not only lists job openings but also acts as a comprehensive resource, guiding job seekers through every step of their career journey. We are committed to breaking down traditional barriers, making job searching transparent, and providing the tools and knowledge necessary for career advancement.</p>
    <p class="mb-4">Our approach goes beyond just job listings. We are invested in your success. Jobstz offers a suite of resources designed to enhance your employability and confidence, from resume and CV building to interview preparation and career advice. We strive to be more than just a job board; we aim to be your career partner.</p>
    <p class="mb-4">Whether you are a recent graduate, an experienced professional looking for a career change, or seeking leadership roles, Jobstz is designed to support your aspirations. We champion the belief that everyone deserves the opportunity to achieve career fulfillment, and we are dedicated to making that vision a reality.</p>

    <h2 class="section-title">Our Core Values</h2>
    <ul class="core-values-list">
        <li class="core-values-item">
            <i class="fas fa-heart value-icon"></i>
            <div class="value-text"><strong>Empathy:</strong> We deeply understand the emotional and practical challenges of the job search. Our platform is designed with compassion and support at its core.</div>
        </li>
        <li class="core-values-item">
            <i class="fas fa-shield-alt value-icon"></i>
            <div class="value-text"><strong>Integrity:</strong> Trust is paramount. We are committed to maintaining a platform of genuine, verified job opportunities, ensuring a safe and reliable experience for all users.</div>
        </li>
        <li class="core-values-item">
            <i class="fas fa-users value-icon"></i>
            <div class="value-text"><strong>Collaboration:</strong> We believe in the power of partnerships. By fostering collaboration between job seekers and employers, we create a more effective and harmonious job market ecosystem.</div>
        </li>
        <li class="core-values-item">
            <i class="fas fa-rocket value-icon"></i>
            <div class="value-text"><strong>Innovation:</strong> We are committed to continuous improvement and innovation, constantly evolving our platform to meet the changing needs of job seekers and the demands of the future of work.</div>
        </li>
    </ul>

    <div class="faq-section">
        <h2 class="faq-title">Frequently Asked Questions</h2>

        <div class="faq-item">
            <div class="faq-header" data-bs-toggle="collapse" data-bs-target="#faqAnswer1" aria-expanded="true" aria-controls="faqAnswer1">
                <h6 class="faq-question">What is Jobstz and what services do you offer?</h6>
                <span class="faq-arrow"><i class="fas fa-chevron-down"></i></span>
            </div>
            <div id="faqAnswer1" class="collapse show faq-body">
                Jobstz is a next-generation job portal designed to seamlessly connect job seekers with opportunities across diverse industries. We provide a robust and intuitive job listing platform, coupled with a wealth of career-enhancing resources. Our primary goal is to simplify the often complex job search, ensuring a streamlined and efficient experience for every user.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-header collapsed" data-bs-toggle="collapse" data-bs-target="#faqAnswer2" aria-expanded="false" aria-controls="faqAnswer2">
                <h6 class="faq-question">How do I effectively search for jobs on Jobstz?</h6>
                <span class="faq-arrow"><i class="fas fa-chevron-down"></i></span>
            </div>
            <div id="faqAnswer2" class="collapse faq-body">
                Searching for your ideal job on Jobstz is straightforward and powerful. Utilize our prominently placed search bar to enter keywords related to your desired job title, skills, or industry. Enhance your search with our comprehensive filters, allowing you to refine listings by location, job type, employment type, and more. Our advanced search capabilities are designed to swiftly pinpoint the most pertinent job listings, saving you time and maximizing relevance.
            </div>
        </div>

        <div class="faq-item">
            <div class="faq-header collapsed" data-bs-toggle="collapse" data-bs-target="#faqAnswer3" aria-expanded="false" aria-controls="faqAnswer3">
                <h6 class="faq-question">Understanding Job Status Colors: What do they signify?</h6>
                <span class="faq-arrow"><i class="fas fa-chevron-down"></i></span>
            </div>
            <div id="faqAnswer3" class="collapse faq-body">
                <div class="color-meanings">
                    <h6>Decoding Job Listing Status Colors:</h6>
                    <div class="color-meaning-item">
                        <div class="color-box expired-color-box"></div>
                        <span class="color-text"><strong><span style="color: #ff4d4d; font-weight: 600;">Red - Expired:</span></strong>  Indicates that the application deadline for this position has officially passed.  Regrettably, applications are no longer being accepted for expired listings.</span>
                    </div>
                    <div class="color-meaning-item">
                        <div class="color-box soon-expiring-color-box"></div>
                        <span class="color-text"><strong><span style="color: #ffc107; font-weight: 600;">Yellow - Soon Expiring:</span></strong>  Serves as a timely alert! A yellow status signifies that the application deadline for this job is rapidly approaching. If you are interested, we highly encourage you to expedite your application process to ensure timely submission.</span>
                    </div>
                    <div class="color-meaning-item">
                        <div class="color-box" style="background-color: inherit; border: 1px solid #ced4da;"></div>
                        <span class="color-text"><strong>Default Status (No Color Indicator):</strong> Denotes an active job listing with a deadline that is not immediately imminent.  This indicates that the position is currently open and accepting applications, providing you with a comfortable window to apply.</span>
                    </div>
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-header collapsed" data-bs-toggle="collapse" data-bs-target="#faqAnswer4" aria-expanded="false" aria-controls="faqAnswer4">
                    <h6 class="faq-question">Is Jobstz a free platform for job seekers?</h6>
                    <span class="faq-arrow"><i class="fas fa-chevron-down"></i></span>
                </div>
                <div id="faqAnswer4" class="collapse faq-body">
                    Absolutely! Jobstz is committed to providing a cost-free and accessible job search experience for all job seekers. You can leverage our comprehensive platform to search job listings, meticulously save positions of interest, and fully utilize our extensive suite of career resources—all without incurring any charges or subscription fees. We believe in democratizing access to job opportunities and are proud to offer our services freely to support your career aspirations.
                </div>
            </div>

            <div class="faq-item">
                <div class="faq-header collapsed" data-bs-toggle="collapse" data-bs-target="#faqAnswer5" aria-expanded="false" aria-controls="faqAnswer5">
                    <h6 class="faq-question">How can I get in touch with the Jobstz support team?</h6>
                    <span class="faq-arrow"><i class="fas fa-chevron-down"></i></span>
                </div>
                <div id="faqAnswer5" class="collapse faq-body">
                    For any inquiries, assistance, or feedback, our dedicated Jobstz support team is readily available to help. The most efficient way to connect with us is through our <a href="{{ route('contact') }}" style="color: #1a237e; font-weight: 500; text-decoration: underline;">Contact Us</a> page. We are committed to providing timely and helpful responses to ensure your experience with Jobstz is seamless and successful.
                </div>
            </div>

        </div>
    </div>

    <div class="bottom-nav">
        <a href="{{ route('jobs.index') }}">Job Listings</a>
        <a href="{{ route('about') }}">About</a>
        <a href="{{ route('contact') }}">Contact</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.faq-header').forEach(header => {
                header.addEventListener('click', () => {
                    const collapseTarget = header.getAttribute('data-bs-target');
                    const arrow = header.querySelector('.faq-arrow');
                    const faqBody = document.querySelector(collapseTarget);

                    header.classList.toggle('collapsed');
                    if (!header.classList.contains('collapsed')) {
                        faqBody.classList.add('show');
                    } else {
                        faqBody.classList.remove('show');
                    }
                });
            });
        });
    </script>
</body>
</html>