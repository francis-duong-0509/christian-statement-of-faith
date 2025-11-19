<!DOCTYPE html>
<html lang="en" id="html-root">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Reformed Theology - Comprehensive resources on biblical doctrine, the Five Solas, theological dictionary, and insightful Reformed teachings rooted in Scripture alone.">
    <meta name="keywords" content="reformed theology, five solas, sola scriptura, statement of faith, christian theology, biblical truth, theological dictionary, reformed blog">
    <title>Reformed Statement of Faith - Biblical Truth & Reformed Theology</title>

    <!-- Google Fonts - Scholarly Typography -->
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
                <span class="brand-text">Reformed Faith</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="/" data-lang-en="Home" data-lang-vi="Trang Chủ">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/faith-statements" data-lang-en="Statement of Faith" data-lang-vi="Tuyên Bố Đức Tin">Statement of Faith</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/dictionary" data-lang-en="Dictionary" data-lang-vi="Từ Điển">Dictionary</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/blog" data-lang-en="Blog" data-lang-vi="Blog">Blog</a>
                    </li>
                    <!-- Language Switcher -->
                    <li class="nav-item dropdown language-switcher">
                        <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button"
                           data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-globe me-1"></i>
                            <span id="currentLang">EN</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                            <li><a class="dropdown-item" href="#" data-lang="en"><i class="fas fa-check me-2 lang-check"></i>English</a></li>
                            <li><a class="dropdown-item" href="#" data-lang="vi"><i class="fas fa-check me-2 lang-check"></i>Tiếng Việt</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section - Reduced Height -->
    <section class="hero-section hero-reduced">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="hero-title" data-aos="fade-up" data-aos-duration="1000"
                        data-lang-en="Reformed Theology: Rooted in Scripture Alone"
                        data-lang-vi="Thần Học Cải Chánh: Dựa Trên Kinh Thánh">
                        Reformed Theology: Rooted in Scripture Alone
                    </h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200"
                       data-lang-en="A comprehensive resource for understanding biblical doctrine, the Five Solas of the Reformation, and Reformed theological truth grounded in God's Word."
                       data-lang-vi="Nguồn tài nguyên toàn diện để hiểu giáo lý Kinh Thánh, Năm Điển Cải Chánh, và chân lý thần học Cải Chánh dựa trên Lời Chúa.">
                        A comprehensive resource for understanding biblical doctrine, the Five Solas of the Reformation,
                        and Reformed theological truth grounded in God's Word.
                    </p>
                    <div class="hero-cta" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                        <a href="/faith-statements" class="btn btn-primary btn-lg me-3">
                            <span data-lang-en="Explore Our Beliefs" data-lang-vi="Khám Phá Đức Tin">Explore Our Beliefs</span>
                            <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                        <a href="#five-solas" class="btn btn-outline-light btn-lg smooth-scroll">
                            <span data-lang-en="The Five Solas" data-lang-vi="Năm Điển">The Five Solas</span>
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

    <!-- Five Solas Section -->
    <section class="five-solas-section py-5" id="five-solas">
        <div class="container">
            <!-- Section Header -->
            <div class="row text-center mb-5">
                <div class="col-lg-10 mx-auto">
                    <h2 class="section-title-main" data-aos="fade-up"
                        data-lang-en="The Five Solas of Reformed Theology"
                        data-lang-vi="Năm Điển Của Thần Học Cải Chánh">
                        The Five Solas of Reformed Theology
                    </h2>
                    <p class="section-intro" data-aos="fade-up" data-aos-delay="100"
                       data-lang-en="Reformed Theology is a comprehensive system of Christian doctrine rooted in the Protestant Reformation. At its heart are the Five Solas—five fundamental principles that define our understanding of Scripture, salvation, and the glory of God. These truths form the bedrock of biblical Christianity."
                       data-lang-vi="Thần Học Cải Chánh là một hệ thống giáo lý Cơ Đốc toàn diện bắt nguồn từ Cải Chánh Tin Lành. Trung tâm của nó là Năm Điển—năm nguyên tắc căn bản định hình sự hiểu biết của chúng ta về Kinh Thánh, sự cứu rỗi, và vinh hiển của Đức Chúa Trời.">
                        Reformed Theology is a comprehensive system of Christian doctrine rooted in the Protestant Reformation.
                        At its heart are the Five Solas—five fundamental principles that define our understanding of Scripture,
                        salvation, and the glory of God. These truths form the bedrock of biblical Christianity.
                    </p>
                </div>
            </div>

            <!-- Five Solas Cards -->
            <div class="row g-4 mb-5">
                <!-- Sola 1: Sola Scriptura -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="sola-card">
                        <div class="sola-icon">
                            <i class="fas fa-book-bible"></i>
                        </div>
                        <h3 class="sola-latin">Sola Scriptura</h3>
                        <h4 class="sola-english" data-lang-en="Scripture Alone" data-lang-vi="Chỉ Kinh Thánh">Scripture Alone</h4>
                        <p class="sola-tagline"
                           data-lang-en="Scripture is the only infallible rule of faith and practice"
                           data-lang-vi="Kinh Thánh là quy tắc duy nhất vô sai sót về đức tin và thực hành">
                            Scripture is the only infallible rule of faith and practice
                        </p>
                    </div>
                </div>

                <!-- Sola 2: Sola Gratia -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="sola-card">
                        <div class="sola-icon">
                            <i class="fas fa-hands-praying"></i>
                        </div>
                        <h3 class="sola-latin">Sola Gratia</h3>
                        <h4 class="sola-english" data-lang-en="Grace Alone" data-lang-vi="Chỉ Ân Điển">Grace Alone</h4>
                        <p class="sola-tagline"
                           data-lang-en="Salvation is by God's grace alone, not by human merit"
                           data-lang-vi="Sự cứu rỗi chỉ bởi ân điển Đức Chúa Trời, không phải công đức con người">
                            Salvation is by God's grace alone, not by human merit
                        </p>
                    </div>
                </div>

                <!-- Sola 3: Sola Fide -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="sola-card">
                        <div class="sola-icon">
                            <i class="fas fa-cross"></i>
                        </div>
                        <h3 class="sola-latin">Sola Fide</h3>
                        <h4 class="sola-english" data-lang-en="Faith Alone" data-lang-vi="Chỉ Đức Tin">Faith Alone</h4>
                        <p class="sola-tagline"
                           data-lang-en="We are justified by faith alone in Christ"
                           data-lang-vi="Chúng ta được xưng công chỉ bởi đức tin nơi Đấng Christ">
                            We are justified by faith alone in Christ
                        </p>
                    </div>
                </div>

                <!-- Sola 4: Solus Christus -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="sola-card">
                        <div class="sola-icon">
                            <i class="fas fa-crown"></i>
                        </div>
                        <h3 class="sola-latin">Solus Christus</h3>
                        <h4 class="sola-english" data-lang-en="Christ Alone" data-lang-vi="Chỉ Đấng Christ">Christ Alone</h4>
                        <p class="sola-tagline"
                           data-lang-en="Christ is the only mediator between God and humanity"
                           data-lang-vi="Đấng Christ là Đấng trung bảo duy nhất giữa Đức Chúa Trời và con người">
                            Christ is the only mediator between God and humanity
                        </p>
                    </div>
                </div>

                <!-- Sola 5: Soli Deo Gloria -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="sola-card">
                        <div class="sola-icon">
                            <i class="fas fa-star"></i>
                        </div>
                        <h3 class="sola-latin">Soli Deo Gloria</h3>
                        <h4 class="sola-english" data-lang-en="Glory to God Alone" data-lang-vi="Chỉ Vinh Hiển Đức Chúa Trời">Glory to God Alone</h4>
                        <p class="sola-tagline"
                           data-lang-en="All things are done for the glory of God alone"
                           data-lang-vi="Mọi điều được làm chỉ vì vinh hiển Đức Chúa Trời">
                            All things are done for the glory of God alone
                        </p>
                    </div>
                </div>

                <!-- Placeholder for symmetry on desktop -->
                <div class="col-lg-4 d-none d-lg-block"></div>
            </div>

            <!-- CTA Button -->
            <div class="row">
                <div class="col text-center" data-aos="fade-up" data-aos-delay="600">
                    <a href="/faith-statements" class="btn btn-outline-primary btn-lg">
                        <span data-lang-en="Explore Our Statement of Faith" data-lang-vi="Khám Phá Tuyên Bố Đức Tin">
                            Explore Our Statement of Faith
                        </span>
                        <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Enhanced Resources Section -->
    <section class="resources-section py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title" data-aos="fade-up"
                        data-lang-en="Reformed Theological Resources"
                        data-lang-vi="Tài Nguyên Thần Học Cải Chánh">
                        Reformed Theological Resources
                    </h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100"
                       data-lang-en="Comprehensive tools for studying biblical theology rooted in the Reformed tradition"
                       data-lang-vi="Công cụ toàn diện để nghiên cứu thần học Kinh Thánh dựa trên truyền thống Cải Chánh">
                        Comprehensive tools for studying biblical theology rooted in the Reformed tradition
                    </p>
                </div>
            </div>
            <div class="row g-4">
                <!-- Resource Card 1: Statement of Faith -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="resource-card">
                        <div class="resource-icon">
                            <i class="fas fa-scroll"></i>
                        </div>
                        <h3 class="resource-title" data-lang-en="Statement of Faith" data-lang-vi="Tuyên Bố Đức Tin">Statement of Faith</h3>
                        <p class="resource-description"
                           data-lang-en="Comprehensive exposition of Reformed doctrine based on Scripture alone"
                           data-lang-vi="Giải thích toàn diện về giáo lý Cải Chánh dựa trên Kinh Thánh">
                            Comprehensive exposition of Reformed doctrine based on Scripture alone
                        </p>
                        <ul class="resource-features">
                            <li><i class="fas fa-check-circle"></i> <span data-lang-en="Detailed theological positions" data-lang-vi="Lập trường thần học chi tiết">Detailed theological positions</span></li>
                            <li><i class="fas fa-check-circle"></i> <span data-lang-en="Scripture references throughout" data-lang-vi="Tham chiếu Kinh Thánh đầy đủ">Scripture references throughout</span></li>
                            <li><i class="fas fa-check-circle"></i> <span data-lang-en="Historic Reformed confessions" data-lang-vi="Tín điều Cải Chánh lịch sử">Historic Reformed confessions</span></li>
                        </ul>
                        <a href="/faith-statements" class="btn btn-primary btn-block">
                            <span data-lang-en="Explore Our Beliefs" data-lang-vi="Khám Phá Niềm Tin">Explore Our Beliefs</span>
                        </a>
                    </div>
                </div>

                <!-- Resource Card 2: Theological Dictionary -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="resource-card">
                        <div class="resource-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <h3 class="resource-title" data-lang-en="Theological Dictionary" data-lang-vi="Từ Điển Thần Học">Theological Dictionary</h3>
                        <p class="resource-description"
                           data-lang-en="Biblical and theological terms explained from a Reformed perspective"
                           data-lang-vi="Thuật ngữ Kinh Thánh và thần học được giải thích từ góc nhìn Cải Chánh">
                            Biblical and theological terms explained from a Reformed perspective
                        </p>
                        <ul class="resource-features">
                            <li><i class="fas fa-check-circle"></i> <span data-lang-en="500+ theological terms" data-lang-vi="Hơn 500 thuật ngữ thần học">500+ theological terms</span></li>
                            <li><i class="fas fa-check-circle"></i> <span data-lang-en="Biblical context provided" data-lang-vi="Bối cảnh Kinh Thánh được cung cấp">Biblical context provided</span></li>
                            <li><i class="fas fa-check-circle"></i> <span data-lang-en="Cross-referenced concepts" data-lang-vi="Các khái niệm tham chiếu chéo">Cross-referenced concepts</span></li>
                        </ul>
                        <a href="/dictionary" class="btn btn-primary btn-block">
                            <span data-lang-en="Browse Dictionary" data-lang-vi="Xem Từ Điển">Browse Dictionary</span>
                        </a>
                    </div>
                </div>

                <!-- Resource Card 3: Theological Blog -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="resource-card">
                        <div class="resource-icon">
                            <i class="fas fa-pen-fancy"></i>
                        </div>
                        <h3 class="resource-title" data-lang-en="Theological Blog" data-lang-vi="Blog Thần Học">Theological Blog</h3>
                        <p class="resource-description"
                           data-lang-en="Articles and teachings grounded in Reformed biblical theology"
                           data-lang-vi="Bài viết và giảng dạy dựa trên thần học Kinh Thánh Cải Chánh">
                            Articles and teachings grounded in Reformed biblical theology
                        </p>
                        <ul class="resource-features">
                            <li><i class="fas fa-check-circle"></i> <span data-lang-en="Weekly theological articles" data-lang-vi="Bài viết thần học hàng tuần">Weekly theological articles</span></li>
                            <li><i class="fas fa-check-circle"></i> <span data-lang-en="Biblical exposition & study" data-lang-vi="Giải thích & nghiên cứu Kinh Thánh">Biblical exposition & study</span></li>
                            <li><i class="fas fa-check-circle"></i> <span data-lang-en="Practical application" data-lang-vi="Ứng dụng thực tế">Practical application</span></li>
                        </ul>
                        <a href="/blog" class="btn btn-primary btn-block">
                            <span data-lang-en="Read Articles" data-lang-vi="Đọc Bài Viết">Read Articles</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Reformed Theology Section -->
    <section class="why-reformed-section py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title" data-aos="fade-up"
                        data-lang-en="Our Theological Distinctives"
                        data-lang-vi="Đặc Điểm Thần Học Của Chúng Tôi">
                        Our Theological Distinctives
                    </h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100"
                       data-lang-en="What makes Reformed Theology a faithful and compelling expression of biblical Christianity"
                       data-lang-vi="Điều gì làm cho Thần Học Cải Chánh trở thành biểu hiện trung thành và hấp dẫn của Cơ Đốc giáo Kinh Thánh">
                        What makes Reformed Theology a faithful and compelling expression of biblical Christianity
                    </p>
                </div>
            </div>

            <div class="row g-4">
                <!-- Distinctive 1 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="distinctive-card">
                        <div class="distinctive-icon">
                            <i class="fas fa-bible"></i>
                        </div>
                        <h3 class="distinctive-title" data-lang-en="Biblically Rooted" data-lang-vi="Bắt Nguồn Từ Kinh Thánh">Biblically Rooted</h3>
                        <p class="distinctive-description"
                           data-lang-en="Grounded entirely in Scripture as the sole infallible authority for faith and practice. Every doctrine is tested against God's written Word."
                           data-lang-vi="Hoàn toàn dựa trên Kinh Thánh là quyền năng duy nhất vô sai sót về đức tin và thực hành. Mọi giáo lý đều được kiểm chứng với Lời Chúa.">
                            Grounded entirely in Scripture as the sole infallible authority for faith and practice.
                            Every doctrine is tested against God's written Word.
                        </p>
                    </div>
                </div>

                <!-- Distinctive 2 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="distinctive-card">
                        <div class="distinctive-icon">
                            <i class="fas fa-landmark"></i>
                        </div>
                        <h3 class="distinctive-title" data-lang-en="Historically Rich" data-lang-vi="Giàu Truyền Thống">Historically Rich</h3>
                        <p class="distinctive-description"
                           data-lang-en="Built on 500 years of theological scholarship from the Protestant Reformation and the faithful teaching of church fathers."
                           data-lang-vi="Được xây dựng trên 500 năm học thuật thần học từ Cải Chánh Tin Lành và sự giảng dạy trung thành của các giáo phụ.">
                            Built on 500 years of theological scholarship from the Protestant Reformation
                            and the faithful teaching of church fathers.
                        </p>
                    </div>
                </div>

                <!-- Distinctive 3 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="distinctive-card">
                        <div class="distinctive-icon">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h3 class="distinctive-title" data-lang-en="Intellectually Rigorous" data-lang-vi="Nghiêm Túc Học Thuật">Intellectually Rigorous</h3>
                        <p class="distinctive-description"
                           data-lang-en="Emphasizes careful biblical exegesis, systematic theology, and logical consistency in understanding God's revelation."
                           data-lang-vi="Nhấn mạnh giải kinh nghiêm túc, thần học hệ thống, và tính nhất quán logic trong việc hiểu sự mặc khải của Đức Chúa Trời.">
                            Emphasizes careful biblical exegesis, systematic theology, and logical consistency
                            in understanding God's revelation.
                        </p>
                    </div>
                </div>

                <!-- Distinctive 4 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="distinctive-card">
                        <div class="distinctive-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h3 class="distinctive-title" data-lang-en="Practically Applicable" data-lang-vi="Ứng Dụng Thực Tế">Practically Applicable</h3>
                        <p class="distinctive-description"
                           data-lang-en="Connects profound theological truths to daily Christian living, worship, and discipleship."
                           data-lang-vi="Kết nối các chân lý thần học sâu sắc với đời sống Cơ Đốc hàng ngày, thờ phượng, và môn đồ hóa.">
                            Connects profound theological truths to daily Christian living, worship, and discipleship.
                        </p>
                    </div>
                </div>

                <!-- Distinctive 5 -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="distinctive-card">
                        <div class="distinctive-icon">
                            <i class="fas fa-cross"></i>
                        </div>
                        <h3 class="distinctive-title" data-lang-en="Christ-Centered" data-lang-vi="Tập Trung Vào Đấng Christ">Christ-Centered</h3>
                        <p class="distinctive-description"
                           data-lang-en="Focused on the glory of God in Christ, emphasizing His sufficiency as Prophet, Priest, and King."
                           data-lang-vi="Tập trung vào vinh hiển Đức Chúa Trời trong Đấng Christ, nhấn mạnh sự đầy đủ của Ngài là Đấng Tiên Tri, Thầy Tế Lễ, và Vua.">
                            Focused on the glory of God in Christ, emphasizing His sufficiency as Prophet, Priest, and King.
                        </p>
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
                    <h2 class="section-title" data-aos="fade-up"
                        data-lang-en="Latest Articles"
                        data-lang-vi="Bài Viết Mới Nhất">
                        Latest Articles
                    </h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100"
                       data-lang-en="Discover our most recent theological insights and biblical teachings"
                       data-lang-vi="Khám phá những hiểu biết thần học và giảng dạy Kinh Thánh mới nhất">
                        Discover our most recent theological insights and biblical teachings
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
                                <span data-lang-en="Read More" data-lang-vi="Đọc Thêm">Read More</span> <i class="fas fa-arrow-right ms-2"></i>
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
                                <span data-lang-en="Read More" data-lang-vi="Đọc Thêm">Read More</span> <i class="fas fa-arrow-right ms-2"></i>
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
                                <span data-lang-en="Read More" data-lang-vi="Đọc Thêm">Read More</span> <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </article>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col text-center" data-aos="fade-up">
                    <a href="/blog" class="btn btn-outline-primary btn-lg">
                        <span data-lang-en="View All Articles" data-lang-vi="Xem Tất Cả Bài Viết">View All Articles</span> <i class="fas fa-arrow-right ms-2"></i>
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
                        <h2 class="newsletter-title" data-lang-en="Stay Connected" data-lang-vi="Kết Nối Với Chúng Tôi">Stay Connected</h2>
                        <p class="newsletter-description"
                           data-lang-en="Subscribe to receive the latest articles, theological insights, and updates delivered directly to your inbox."
                           data-lang-vi="Đăng ký để nhận các bài viết mới nhất, hiểu biết thần học, và cập nhật được gửi trực tiếp đến hộp thư của bạn.">
                            Subscribe to receive the latest articles, theological insights, and updates
                            delivered directly to your inbox.
                        </p>
                        <form class="newsletter-form" id="newsletterForm">
                            <div class="input-group">
                                <input type="email"
                                       class="form-control"
                                       placeholder="Enter your email address"
                                       data-lang-placeholder-en="Enter your email address"
                                       data-lang-placeholder-vi="Nhập địa chỉ email của bạn"
                                       aria-label="Email address"
                                       required>
                                <button class="btn btn-primary" type="submit">
                                    <span class="btn-text" data-lang-en="Subscribe" data-lang-vi="Đăng Ký">Subscribe</span>
                                    <span class="btn-loading d-none">
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </span>
                                </button>
                            </div>
                            <small class="form-text"
                                   data-lang-en="We respect your privacy. Unsubscribe at any time."
                                   data-lang-vi="Chúng tôi tôn trọng quyền riêng tư của bạn. Hủy đăng ký bất cứ lúc nào.">
                                We respect your privacy. Unsubscribe at any time.
                            </small>
                        </form>
                        <div class="newsletter-success d-none" id="newsletterSuccess">
                            <i class="fas fa-check-circle"></i>
                            <p data-lang-en="Thank you for subscribing! Please check your email to confirm."
                               data-lang-vi="Cảm ơn bạn đã đăng ký! Vui lòng kiểm tra email để xác nhận.">
                                Thank you for subscribing! Please check your email to confirm.
                            </p>
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
                    <h5 class="footer-title" data-lang-en="About" data-lang-vi="Giới Thiệu">About</h5>
                    <p class="footer-text"
                       data-lang-en="Reformed Faith is dedicated to providing sound theological resources rooted in Scripture, helping believers grow in knowledge and understanding of God's Word through the lens of Reformed theology."
                       data-lang-vi="Reformed Faith cam kết cung cấp tài nguyên thần học đáng tin cậy dựa trên Kinh Thánh, giúp tín hữu phát triển trong kiến thức và sự hiểu biết về Lời Chúa qua góc nhìn thần học Cải Chánh.">
                        Reformed Faith is dedicated to providing sound theological resources
                        rooted in Scripture, helping believers grow in knowledge and understanding
                        of God's Word through the lens of Reformed theology.
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
                    <h5 class="footer-title" data-lang-en="Quick Links" data-lang-vi="Liên Kết">Quick Links</h5>
                    <ul class="footer-links">
                        <li><a href="/"><span data-lang-en="Home" data-lang-vi="Trang Chủ">Home</span></a></li>
                        <li><a href="/faith-statements"><span data-lang-en="Statement of Faith" data-lang-vi="Tuyên Bố Đức Tin">Statement of Faith</span></a></li>
                        <li><a href="/dictionary"><span data-lang-en="Theological Dictionary" data-lang-vi="Từ Điển Thần Học">Theological Dictionary</span></a></li>
                        <li><a href="/blog"><span data-lang-en="Blog & Articles" data-lang-vi="Blog & Bài Viết">Blog & Articles</span></a></li>
                        <li><a href="/about"><span data-lang-en="About Us" data-lang-vi="Về Chúng Tôi">About Us</span></a></li>
                        <li><a href="/contact"><span data-lang-en="Contact" data-lang-vi="Liên Hệ">Contact</span></a></li>
                    </ul>
                </div>

                <!-- Contact Column -->
                <div class="col-lg-4 col-md-6">
                    <h5 class="footer-title" data-lang-en="Contact" data-lang-vi="Liên Hệ">Contact</h5>
                    <ul class="footer-contact">
                        <li>
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:info@reformedfaith.org">info@reformedfaith.org</a>
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
                        &copy; 2025 <span data-lang-en="Reformed Faith. All rights reserved." data-lang-vi="Reformed Faith. Mọi quyền được bảo lưu.">Reformed Faith. All rights reserved.</span>
                    </p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <ul class="footer-legal">
                        <li><a href="/privacy"><span data-lang-en="Privacy Policy" data-lang-vi="Chính Sách Bảo Mật">Privacy Policy</span></a></li>
                        <li><a href="/terms"><span data-lang-en="Terms of Service" data-lang-vi="Điều Khoản Dịch Vụ">Terms of Service</span></a></li>
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
