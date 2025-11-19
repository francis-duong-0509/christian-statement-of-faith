<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Explore Biblical Truth & Theology - A comprehensive resource for Christian doctrine, theological dictionary, and insightful biblical teachings.">
    <meta name="keywords" content="statement of faith, christian theology, biblical truth, theological dictionary, christian blog">
    <title>Statement of Faith - Explore Biblical Truth & Theology</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:wght@400;600;700&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- AOS (Animate On Scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand" href="/">
                <i class="fas fa-book-open me-2"></i>
                <span class="brand-text">Statement of Faith</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/faith-statements">Statement of Faith</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/dictionary">Dictionary</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/blog">Blog</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="hero-title" data-aos="fade-up" data-aos-duration="1000">
                        Explore Biblical Truth & Theology
                    </h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        A comprehensive resource for understanding Christian doctrine, exploring theological concepts,
                        and deepening your faith through careful biblical study.
                    </p>
                    <div class="hero-cta" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                        <a href="/faith-statements" class="btn btn-primary btn-lg me-3">
                            <span>Explore Statement of Faith</span>
                            <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                        <a href="/blog" class="btn btn-outline-light btn-lg">
                            Read Articles
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Scroll indicator -->
        <div class="scroll-indicator" data-aos="fade-up" data-aos-delay="800">
            <i class="fas fa-chevron-down"></i>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title" data-aos="fade-up">Our Resources</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Explore our comprehensive collection of theological resources designed to help you
                        grow in understanding and faith.
                    </p>
                </div>
            </div>
            <div class="row g-4">
                <!-- Statement of Faith Card -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-scroll"></i>
                        </div>
                        <h3 class="feature-title">Statement of Faith</h3>
                        <p class="feature-description">
                            Explore our core doctrinal beliefs and theological positions rooted in Scripture.
                            Understand the foundational truths that guide our faith and practice.
                        </p>
                        <a href="/faith-statements" class="feature-link">
                            Learn More <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Dictionary Card -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <h3 class="feature-title">Theological Dictionary</h3>
                        <p class="feature-description">
                            Access clear definitions and explanations of biblical and theological terms.
                            Deepen your understanding of complex concepts with comprehensive entries.
                        </p>
                        <a href="/dictionary" class="feature-link">
                            Browse Dictionary <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>

                <!-- Blog Card -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-pen-fancy"></i>
                        </div>
                        <h3 class="feature-title">Theological Blog</h3>
                        <p class="feature-description">
                            Read insightful articles, biblical reflections, and theological discussions.
                            Stay informed with fresh perspectives on faith and Scripture.
                        </p>
                        <a href="/blog" class="feature-link">
                            Read Articles <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Latest Blog Posts Section -->
    <section class="blog-section py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title" data-aos="fade-up">Latest Articles</h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        Discover our most recent theological insights and biblical teachings.
                    </p>
                </div>
            </div>
            <div class="row g-4">
                <!-- Blog Post 1 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <article class="blog-card">
                        <div class="blog-image">
                            <img src="https://images.unsplash.com/photo-1490730141103-6cac27aaab94?w=600&h=400&fit=crop"
                                 alt="Understanding the Trinity" loading="lazy">
                            <span class="blog-category">Doctrine</span>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span><i class="far fa-calendar"></i> January 15, 2025</span>
                                <span><i class="far fa-clock"></i> 8 min read</span>
                            </div>
                            <h3 class="blog-title">Understanding the Trinity: One God in Three Persons</h3>
                            <p class="blog-excerpt">
                                Explore the biblical foundation of the Trinity and how this central doctrine
                                shapes our understanding of God's nature and character.
                            </p>
                            <a href="/blog/understanding-trinity" class="blog-link">
                                Read More <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </article>
                </div>

                <!-- Blog Post 2 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <article class="blog-card">
                        <div class="blog-image">
                            <img src="https://images.unsplash.com/photo-1504052434569-70ad5836ab65?w=600&h=400&fit=crop"
                                 alt="The Sovereignty of God" loading="lazy">
                            <span class="blog-category">Theology</span>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span><i class="far fa-calendar"></i> January 12, 2025</span>
                                <span><i class="far fa-clock"></i> 10 min read</span>
                            </div>
                            <h3 class="blog-title">The Sovereignty of God in Human Affairs</h3>
                            <p class="blog-excerpt">
                                Examining how God's sovereign control over all things provides comfort,
                                direction, and purpose in our daily lives.
                            </p>
                            <a href="/blog/sovereignty-of-god" class="blog-link">
                                Read More <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </article>
                </div>

                <!-- Blog Post 3 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <article class="blog-card">
                        <div class="blog-image">
                            <img src="https://images.unsplash.com/photo-1503455637927-730bce8583c0?w=600&h=400&fit=crop"
                                 alt="Justification by Faith" loading="lazy">
                            <span class="blog-category">Salvation</span>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span><i class="far fa-calendar"></i> January 8, 2025</span>
                                <span><i class="far fa-clock"></i> 12 min read</span>
                            </div>
                            <h3 class="blog-title">Justification by Faith Alone: A Reformed Perspective</h3>
                            <p class="blog-excerpt">
                                Understanding the biblical doctrine of justification and why faith alone
                                in Christ alone is central to the gospel message.
                            </p>
                            <a href="/blog/justification-by-faith" class="blog-link">
                                Read More <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </article>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col text-center" data-aos="fade-up">
                    <a href="/blog" class="btn btn-outline-primary btn-lg">
                        View All Articles <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter/CTA Section -->
    <section class="newsletter-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="newsletter-content" data-aos="fade-up">
                        <i class="fas fa-envelope-open-text newsletter-icon"></i>
                        <h2 class="newsletter-title">Stay Connected</h2>
                        <p class="newsletter-description">
                            Subscribe to receive the latest articles, theological insights, and updates
                            delivered directly to your inbox.
                        </p>
                        <form class="newsletter-form" id="newsletterForm">
                            <div class="input-group">
                                <input type="email"
                                       class="form-control"
                                       placeholder="Enter your email address"
                                       aria-label="Email address"
                                       required>
                                <button class="btn btn-primary" type="submit">
                                    <span class="btn-text">Subscribe</span>
                                    <span class="btn-loading d-none">
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </span>
                                </button>
                            </div>
                            <small class="form-text">
                                We respect your privacy. Unsubscribe at any time.
                            </small>
                        </form>
                        <div class="newsletter-success d-none" id="newsletterSuccess">
                            <i class="fas fa-check-circle"></i>
                            <p>Thank you for subscribing! Please check your email to confirm.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row g-4">
                <!-- About Column -->
                <div class="col-lg-4 col-md-6">
                    <h5 class="footer-title">About</h5>
                    <p class="footer-text">
                        Statement of Faith is dedicated to providing sound theological resources
                        rooted in Scripture, helping believers grow in knowledge and understanding
                        of God's Word.
                    </p>
                    <div class="social-links mt-3">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="YouTube"><i class="fab fa-youtube"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <!-- Quick Links Column -->
                <div class="col-lg-4 col-md-6">
                    <h5 class="footer-title">Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="/">Home</a></li>
                        <li><a href="/faith-statements">Statement of Faith</a></li>
                        <li><a href="/dictionary">Theological Dictionary</a></li>
                        <li><a href="/blog">Blog & Articles</a></li>
                        <li><a href="/about">About Us</a></li>
                        <li><a href="/contact">Contact</a></li>
                    </ul>
                </div>

                <!-- Contact Column -->
                <div class="col-lg-4 col-md-6">
                    <h5 class="footer-title">Contact</h5>
                    <ul class="footer-contact">
                        <li>
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:info@statementoffaith.com">info@statementoffaith.com</a>
                        </li>
                        <li>
                            <i class="fas fa-phone"></i>
                            <a href="tel:+1234567890">+1 (234) 567-890</a>
                        </li>
                        <li>
                            <i class="fas fa-map-marker-alt"></i>
                            <span>123 Theology Lane, Faith City, FC 12345</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Copyright -->
            <div class="row mt-5 pt-4 border-top">
                <div class="col-md-6 text-center text-md-start">
                    <p class="copyright mb-0">
                        &copy; 2025 Statement of Faith. All rights reserved.
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <ul class="footer-legal">
                        <li><a href="/privacy">Privacy Policy</a></li>
                        <li><a href="/terms">Terms of Service</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button class="scroll-top" id="scrollTop" aria-label="Scroll to top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS (Animate On Scroll) -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Custom JS -->
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
