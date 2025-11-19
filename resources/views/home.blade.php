<!DOCTYPE html>
<html lang="en" id="html-root">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Biblical Theology - Comprehensive resources on biblical doctrine, theological dictionary, and insightful biblical teachings rooted in Scripture alone.">
    <meta name="keywords" content="biblical theology, scripture, statement of faith, christian theology, biblical truth, theological dictionary, theology blog">
    <title>Statement of Faith - Biblical Truth & Theology</title>

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
                <img src="{{ asset('images/logo.png') }}" alt="Statement of Faith" class="site-logo">
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
                        <a class="nav-link" href="/scripture-lectures" data-lang-en="Scripture Lectures" data-lang-vi="Giảng Giải Kinh">Scripture Lectures</a>
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

    <!-- Hero Section - Reduced Height with Image Background -->
    <section class="hero-section hero-reduced" style="background-image: url('https://images.unsplash.com/photo-1504052434569-70ad5836ab65?w=1920&q=80');">
        <div class="hero-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10 text-center">
                    <h1 class="hero-title" data-aos="fade-up" data-aos-duration="1000"
                        data-lang-en="Christian Theology: Rooted in Scripture Alone"
                        data-lang-vi="Thần Học Cơ Đốc: Dựa Trên Kinh Thánh">
                        Christian Theology: Rooted in Scripture Alone
                    </h1>
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200"
                       data-lang-en="A comprehensive resource for understanding biblical doctrine and theological truth grounded in God's Word."
                       data-lang-vi="Nguồn tài nguyên toàn diện để hiểu giáo lý Kinh Thánh và chân lý thần học dựa trên Lời Chúa.">
                        A comprehensive resource for understanding biblical doctrine and theological truth grounded in God's Word.
                    </p>
                    <div class="hero-cta" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                        <a href="/faith-statements" class="btn btn-hero-primary btn-lg me-3">
                            <span data-lang-en="Explore Our Beliefs" data-lang-vi="Khám Phá Đức Tin">Explore Our Beliefs</span>
                            <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                        <a href="#statement-of-faith" class="btn btn-hero-secondary btn-lg smooth-scroll">
                            <span data-lang-en="Our Beliefs" data-lang-vi="Niềm Tin">Our Beliefs</span>
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

    <!-- Statement of Faith Overview Section - NEW -->
    <section class="statement-overview-section py-5" id="statement-of-faith">
        <div class="container">
            <!-- Section Header -->
            <div class="row text-center mb-5">
                <div class="col-lg-10 mx-auto">
                    <h2 class="section-title-main" data-aos="fade-up"
                        data-lang-en="What We Believe"
                        data-lang-vi="Chúng Tôi Tin Điều Gì">
                        What We Believe
                    </h2>
                    <p class="section-intro" data-aos="fade-up" data-aos-delay="100"
                       data-lang-en="Core theological convictions grounded in Scripture"
                       data-lang-vi="Những niềm tin thần học cốt lõi dựa trên Kinh Thánh">
                        Core theological convictions grounded in Scripture
                    </p>
                </div>
            </div>

            <!-- Statement Items Grid -->
            <div class="row g-4">
                <!-- Statement 1: The Word of God -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="statement-item">
                        <div class="statement-number">1</div>
                        <h3 class="statement-title">
                            <span class="title-vietnamese">Lời Đức Chúa Trời</span>
                            <span class="title-english">The Word of God</span>
                        </h3>
                        <p class="statement-description"
                           data-lang-en="We believe the Bible is the Word of God, inspired by the Holy Spirit, the supreme and infallible authority in all matters of faith and life. Scripture is the final standard for evaluating all doctrine and practice."
                           data-lang-vi="Chúng tôi tin rằng Kinh Thánh là Lời của Đức Chúa Trời, được soi dẫn bởi Đức Thánh Linh, là quyền phép tối cao và không thể sai lầm trong mọi vấn đề về đức tin và cuộc sống. Kinh Thánh là tiêu chuẩn cuối cùng để đánh giá mọi giáo lý và thực hành.">
                            Chúng tôi tin rằng Kinh Thánh là Lời của Đức Chúa Trời, được soi dẫn bởi Đức Thánh Linh, là quyền phép tối cao và không thể sai lầm trong mọi vấn đề về đức tin và cuộc sống. Kinh Thánh là tiêu chuẩn cuối cùng để đánh giá mọi giáo lý và thực hành.
                        </p>
                        <div class="scripture-references">
                            <i class="fas fa-book-bible"></i>
                            <div class="scripture-list">
                                <a href="#" class="scripture-ref" data-reference="2 Ti-mô-thê 3:16-17">2 Ti-mô-thê 3:16-17</a>,
                                <a href="#" class="scripture-ref" data-reference="2 Phi-e-rơ 1:20-21">2 Phi-e-rơ 1:20-21</a>,
                                <a href="#" class="scripture-ref" data-reference="Thi Thiên 119:160">Thi Thiên 119:160</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statement 2: The Trinity -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="statement-item">
                        <div class="statement-number">2</div>
                        <h3 class="statement-title">
                            <span class="title-vietnamese">Ba Ngôi Đức Chúa Trời</span>
                            <span class="title-english">The Trinity</span>
                        </h3>
                        <p class="statement-description"
                           data-lang-en="We believe in one God, eternally existing in three persons: Father, Son, and Holy Spirit. These three are equal in power and glory, of the same essence, yet distinct in person."
                           data-lang-vi="Chúng tôi tin có một Đức Chúa Trời duy nhất, tồn tại đời đời trong ba Ngôi: Đức Chúa Cha, Đức Chúa Con, và Đức Thánh Linh. Ba Ngôi đồng đẳng về quyền năng và vinh hiển, cùng một bản chất, nhưng phân biệt về vị ngôi.">
                            Chúng tôi tin có một Đức Chúa Trời duy nhất, tồn tại đời đời trong ba Ngôi: Đức Chúa Cha, Đức Chúa Con, và Đức Thánh Linh. Ba Ngôi đồng đẳng về quyền năng và vinh hiển, cùng một bản chất, nhưng phân biệt về vị ngôi.
                        </p>
                        <div class="scripture-references">
                            <i class="fas fa-book-bible"></i>
                            <div class="scripture-list">
                                <a href="#" class="scripture-ref" data-reference="Ma-thi-ơ 28:19">Ma-thi-ơ 28:19</a>,
                                <a href="#" class="scripture-ref" data-reference="2 Cô-rinh-tô 13:14">2 Cô-rinh-tô 13:14</a>,
                                <a href="#" class="scripture-ref" data-reference="Giăng 1:1-3">Giăng 1:1-3</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statement 3: God the Father -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="statement-item">
                        <div class="statement-number">3</div>
                        <h3 class="statement-title">
                            <span class="title-vietnamese">Đức Chúa Cha</span>
                            <span class="title-english">God the Father</span>
                        </h3>
                        <p class="statement-description"
                           data-lang-en="We believe God the Father is the Creator and Sustainer of all things, holy and righteous, loving and merciful. He ordained the plan of redemption before the foundation of the world and calls His chosen ones to Himself."
                           data-lang-vi="Chúng tôi tin Đức Chúa Cha là Đấng Tạo Hóa và Bảo Trì vạn vật, Đấng Thánh Khiết và Công Bình, Đấng yêu thương và thương xót. Ngài đã định trước kế hoạch cứu chuộc từ trước khi sáng thế và kêu gọi những người thuộc về Ngài.">
                            Chúng tôi tin Đức Chúa Cha là Đấng Tạo Hóa và Bảo Trì vạn vật, Đấng Thánh Khiết và Công Bình, Đấng yêu thương và thương xót. Ngài đã định trước kế hoạch cứu chuộc từ trước khi sáng thế và kêu gọi những người thuộc về Ngài.
                        </p>
                        <div class="scripture-references">
                            <i class="fas fa-book-bible"></i>
                            <div class="scripture-list">
                                <a href="#" class="scripture-ref" data-reference="Giăng 17:3">Giăng 17:3</a>,
                                <a href="#" class="scripture-ref" data-reference="Ê-phê-sô 1:3-6">Ê-phê-sô 1:3-6</a>,
                                <a href="#" class="scripture-ref" data-reference="Gia-cơ 1:17">Gia-cơ 1:17</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statement 4: Jesus Christ -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="statement-item">
                        <div class="statement-number">4</div>
                        <h3 class="statement-title">
                            <span class="title-vietnamese">Đức Chúa Jesus Christ</span>
                            <span class="title-english">Jesus Christ</span>
                        </h3>
                        <p class="statement-description"
                           data-lang-en="We believe Jesus Christ is the only begotten Son of God, conceived by the Holy Spirit, born of the virgin Mary, fully God and fully man. He died on the cross for our sins, rose on the third day, and now sits at the right hand of the Father."
                           data-lang-vi="Chúng tôi tin Chúa Jesus Christ là Con Một của Đức Chúa Trời, được thai nghén bởi Đức Thánh Linh, sinh bởi đồng trinh Ma-ri, là Đức Chúa Trời trọn vẹn và con người trọn vẹn. Ngài đã chết trên thập tự giá để chuộc tội cho chúng ta, sống lại ngày thứ ba, và hiện đang ngự bên hữu Đức Chúa Cha.">
                            Chúng tôi tin Chúa Jesus Christ là Con Một của Đức Chúa Trời, được thai nghén bởi Đức Thánh Linh, sinh bởi đồng trinh Ma-ri, là Đức Chúa Trời trọn vẹn và con người trọn vẹn. Ngài đã chết trên thập tự giá để chuộc tội cho chúng ta, sống lại ngày thứ ba, và hiện đang ngự bên hữu Đức Chúa Cha.
                        </p>
                        <div class="scripture-references">
                            <i class="fas fa-book-bible"></i>
                            <div class="scripture-list">
                                <a href="#" class="scripture-ref" data-reference="Giăng 1:14">Giăng 1:14</a>,
                                <a href="#" class="scripture-ref" data-reference="Phi-líp 2:5-11">Phi-líp 2:5-11</a>,
                                <a href="#" class="scripture-ref" data-reference="1 Cô-rinh-tô 15:3-4">1 Cô-rinh-tô 15:3-4</a>,
                                <a href="#" class="scripture-ref" data-reference="Hê-bơ-rơ 4:14-16">Hê-bơ-rơ 4:14-16</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statement 5: The Holy Spirit -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="statement-item">
                        <div class="statement-number">5</div>
                        <h3 class="statement-title">
                            <span class="title-vietnamese">Đức Thánh Linh</span>
                            <span class="title-english">The Holy Spirit</span>
                        </h3>
                        <p class="statement-description"
                           data-lang-en="We believe the Holy Spirit is God, equal with the Father and the Son. He regenerates believers, dwells within them, empowers them to live holy lives, and equips them with gifts for service in the Church."
                           data-lang-vi="Chúng tôi tin Đức Thánh Linh là Đức Chúa Trời, đồng đẳng với Đức Chúa Cha và Đức Chúa Con. Ngài làm cho người tin được tái sinh, ở trong người tin, ban cho sức mạnh để sống thánh khiết, và trang bị các ân tứ để phục vụ trong Hội Thánh.">
                            Chúng tôi tin Đức Thánh Linh là Đức Chúa Trời, đồng đẳng với Đức Chúa Cha và Đức Chúa Con. Ngài làm cho người tin được tái sinh, ở trong người tin, ban cho sức mạnh để sống thánh khiết, và trang bị các ân tứ để phục vụ trong Hội Thánh.
                        </p>
                        <div class="scripture-references">
                            <i class="fas fa-book-bible"></i>
                            <div class="scripture-list">
                                <a href="#" class="scripture-ref" data-reference="Giăng 14:16-17">Giăng 14:16-17</a>,
                                <a href="#" class="scripture-ref" data-reference="Giăng 16:7-14">Giăng 16:7-14</a>,
                                <a href="#" class="scripture-ref" data-reference="Rô-ma 8:9-11">Rô-ma 8:9-11</a>,
                                <a href="#" class="scripture-ref" data-reference="1 Cô-rinh-tô 12:4-11">1 Cô-rinh-tô 12:4-11</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Statement 6: Salvation -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="statement-item">
                        <div class="statement-number">6</div>
                        <h3 class="statement-title">
                            <span class="title-vietnamese">Sự Cứu Rỗi</span>
                            <span class="title-english">Salvation</span>
                        </h3>
                        <p class="statement-description"
                           data-lang-en="We believe salvation is entirely by God's grace through faith in Jesus Christ. Humans cannot save themselves by works, but are justified by faith, regenerated by the Holy Spirit, and assured of eternal life."
                           data-lang-vi="Chúng tôi tin sự cứu rỗi là hoàn toàn do ân điển của Đức Chúa Trời, qua đức tin nơi Chúa Jesus Christ. Con người không thể tự cứu mình bởi việc làm, nhưng được xưng công bình bởi đức tin, được tái sinh bởi Đức Thánh Linh, và được bảo đảm sự sống đời đời.">
                            Chúng tôi tin sự cứu rỗi là hoàn toàn do ân điển của Đức Chúa Trời, qua đức tin nơi Chúa Jesus Christ. Con người không thể tự cứu mình bởi việc làm, nhưng được xưng công bình bởi đức tin, được tái sinh bởi Đức Thánh Linh, và được bảo đảm sự sống đời đời.
                        </p>
                        <div class="scripture-references">
                            <i class="fas fa-book-bible"></i>
                            <div class="scripture-list">
                                <a href="#" class="scripture-ref" data-reference="Ê-phê-sô 2:8-10">Ê-phê-sô 2:8-10</a>,
                                <a href="#" class="scripture-ref" data-reference="Rô-ma 3:23-26">Rô-ma 3:23-26</a>,
                                <a href="#" class="scripture-ref" data-reference="Tít 3:4-7">Tít 3:4-7</a>,
                                <a href="#" class="scripture-ref" data-reference="Giăng 3:16">Giăng 3:16</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Button -->
            <div class="row mt-5">
                <div class="col text-center" data-aos="fade-up" data-aos-delay="700">
                    <a href="/faith-statements" class="btn btn-primary btn-lg">
                        <span data-lang-en="Read Complete Statement of Faith" data-lang-vi="Đọc Tuyên Bố Đức Tin Đầy Đủ">
                            Read Complete Statement of Faith
                        </span>
                        <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Foundation: Scripture Alone Section -->
    <section class="scripture-foundation-section py-5 bg-light">
        <div class="container">
            <div class="row align-items-center">
                <!-- Left Column: Image -->
                <div class="col-lg-5 mb-4 mb-lg-0" data-aos="fade-right">
                    <div class="foundation-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1519791883288-dc8bd696e667?w=800&q=80"
                             alt="Open Bible"
                             class="foundation-image img-fluid">
                    </div>
                </div>

                <!-- Right Column: Content -->
                <div class="col-lg-7" data-aos="fade-left">
                    <h2 class="section-title mb-4"
                        data-lang-en="Our Foundation: Scripture Alone"
                        data-lang-vi="Nền Tảng Của Chúng Ta: Chỉ Kinh Thánh">
                        Our Foundation: Scripture Alone
                    </h2>

                    <div class="foundation-points">
                        <!-- Point 1: Supreme Authority -->
                        <div class="foundation-point">
                            <div class="point-icon">
                                <i class="fas fa-crown"></i>
                            </div>
                            <div class="point-content">
                                <h4 class="point-title"
                                    data-lang-en="Supreme Authority"
                                    data-lang-vi="Thẩm Quyền Tối Cao">
                                    Supreme Authority
                                </h4>
                                <p class="point-text"
                                   data-lang-en="We believe the Bible is the supreme and final authority for all matters of faith and practice."
                                   data-lang-vi="Chúng tôi tin rằng Kinh Thánh là thẩm quyền tối cao và cuối cùng cho mọi vấn đề về đức tin và đời sống.">
                                    We believe the Bible is the supreme and final authority for all matters of faith and practice.
                                </p>
                            </div>
                        </div>

                        <!-- Point 2: Sufficient for Life -->
                        <div class="foundation-point">
                            <div class="point-icon">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="point-content">
                                <h4 class="point-title"
                                    data-lang-en="Sufficient for Life"
                                    data-lang-vi="Đủ Cho Cuộc Sống">
                                    Sufficient for Life
                                </h4>
                                <p class="point-text"
                                   data-lang-en="Scripture provides everything we need to know God and live faithfully for His glory."
                                   data-lang-vi="Kinh Thánh cung cấp mọi điều chúng ta cần để biết Đức Chúa Trời và sống trung tín cho vinh hiển Ngài.">
                                    Scripture provides everything we need to know God and live faithfully for His glory.
                                </p>
                            </div>
                        </div>

                        <!-- Point 3: Clear Teaching -->
                        <div class="foundation-point">
                            <div class="point-icon">
                                <i class="fas fa-lightbulb"></i>
                            </div>
                            <div class="point-content">
                                <h4 class="point-title"
                                    data-lang-en="Clear Teaching"
                                    data-lang-vi="Giáo Lý Rõ Ràng">
                                    Clear Teaching
                                </h4>
                                <p class="point-text"
                                   data-lang-en="The essential truths of the Gospel are clearly revealed in Scripture for all believers."
                                   data-lang-vi="Những chân lý thiết yếu của Phúc Âm được bày tỏ rõ ràng trong Kinh Thánh cho tất cả tín đồ.">
                                    The essential truths of the Gospel are clearly revealed in Scripture for all believers.
                                </p>
                            </div>
                        </div>

                        <!-- Point 4: God's Inspired Word -->
                        <div class="foundation-point">
                            <div class="point-icon">
                                <i class="fas fa-book-bible"></i>
                            </div>
                            <div class="point-content">
                                <h4 class="point-title"
                                    data-lang-en="God's Inspired Word"
                                    data-lang-vi="Lời Được Soi Dẫn">
                                    God's Inspired Word
                                </h4>
                                <p class="point-text"
                                   data-lang-en="Every word of Scripture is inspired by God and profitable for teaching and correction."
                                   data-lang-vi="Mọi lời trong Kinh Thánh đều được Đức Chúa Trời soi dẫn và hữu ích cho sự dạy dỗ và sửa trách.">
                                    Every word of Scripture is inspired by God and profitable for teaching and correction.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dictionary Showcase Section -->
    <section class="dictionary-showcase-section py-5">
        <div class="container">
            <!-- Section Header -->
            <div class="row text-center mb-5">
                <div class="col-lg-10 mx-auto">
                    <h2 class="section-title" data-aos="fade-up"
                        data-lang-en="Multilingual Biblical Dictionary"
                        data-lang-vi="Từ Điển Kinh Thánh Đa Ngôn Ngữ">
                        Multilingual Biblical Dictionary
                    </h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100"
                       data-lang-en="Hebrew, Greek & English theological terms explained in Vietnamese"
                       data-lang-vi="Tra cứu từ ngữ thần học từ tiếng Hebrew (Cựu Ước), Greek (Tân Ước), và English với giải nghĩa tiếng Việt chi tiết">
                        Hebrew, Greek & English theological terms explained in Vietnamese
                    </p>
                    <p class="dictionary-intro" data-aos="fade-up" data-aos-delay="200"
                       data-lang-en="Vietnamese cannot fully express the nuances and context of many Biblical terms. Our dictionary provides original meanings from Hebrew and Greek, helping you understand Scripture with scholarly depth."
                       data-lang-vi="Tiếng Việt không thể diễn tả đúng ngữ nghĩa và bối cảnh của nhiều từ ngữ trong Kinh Thánh. Từ điển của chúng tôi cung cấp nghĩa gốc từ tiếng Hebrew và Greek, giúp bạn hiểu sâu sắc học thuật Kinh Thánh.">
                        Vietnamese cannot fully express the nuances and context of many Biblical terms. Our dictionary provides original meanings from Hebrew and Greek, helping you understand Scripture with scholarly depth.
                    </p>
                </div>
            </div>

            <!-- Feature Highlights -->
            <div class="row g-4 mb-5">
                <!-- Feature 1: Hebrew -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="dictionary-feature">
                        <div class="feature-icon">
                            <i class="fas fa-scroll"></i>
                            <span class="hebrew-letter">א</span>
                        </div>
                        <h4 class="feature-title" data-lang-en="Hebrew Terms (Old Testament)" data-lang-vi="Từ Ngữ Hebrew (Cựu Ước)">
                            Hebrew Terms (Old Testament)
                        </h4>
                        <p class="feature-description"
                           data-lang-en="Original Old Testament words with Vietnamese meanings and context"
                           data-lang-vi="Từ ngữ gốc Cựu Ước với nghĩa và bối cảnh tiếng Việt">
                            Original Old Testament words with Vietnamese meanings and context
                        </p>
                    </div>
                </div>

                <!-- Feature 2: Greek -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="dictionary-feature">
                        <div class="feature-icon">
                            <i class="fas fa-book-open"></i>
                            <span class="greek-letter">Α</span>
                        </div>
                        <h4 class="feature-title" data-lang-en="Greek Terms (New Testament)" data-lang-vi="Từ Ngữ Greek (Tân Ước)">
                            Greek Terms (New Testament)
                        </h4>
                        <p class="feature-description"
                           data-lang-en="New Testament Greek with contextual Vietnamese explanations"
                           data-lang-vi="Từ ngữ Greek Tân Ước với giải thích bối cảnh tiếng Việt">
                            New Testament Greek with contextual Vietnamese explanations
                        </p>
                    </div>
                </div>

                <!-- Feature 3: English -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="dictionary-feature">
                        <div class="feature-icon">
                            <i class="fas fa-language"></i>
                        </div>
                        <h4 class="feature-title" data-lang-en="English Theological Terms" data-lang-vi="Thuật Ngữ Thần Học Tiếng Anh">
                            English Theological Terms
                        </h4>
                        <p class="feature-description"
                           data-lang-en="Key theological concepts explained clearly in Vietnamese"
                           data-lang-vi="Các khái niệm thần học chủ chốt được giải thích rõ ràng bằng tiếng Việt">
                            Key theological concepts explained clearly in Vietnamese
                        </p>
                    </div>
                </div>
            </div>

            <!-- Sample Terms -->
            <div class="row text-center mb-4">
                <div class="col-12">
                    <h3 class="sample-terms-title" data-aos="fade-up"
                        data-lang-en="Sample Dictionary Entries"
                        data-lang-vi="Mẫu Từ Điển">
                        Sample Dictionary Entries
                    </h3>
                </div>
            </div>

            <div class="row g-4 mb-5">
                <!-- Term 1: Agape (Greek) -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="term-card">
                        <span class="language-badge badge-greek">GREEK</span>
                        <div class="term-original">ἀγάπη</div>
                        <div class="term-transliteration">(agapē)</div>
                        <div class="term-vietnamese">Tình yêu thương của Đức Chúa Trời</div>
                        <div class="term-english">God's unconditional love</div>
                        <a href="/dictionary/agape" class="term-link">
                            <span data-lang-en="View Definition" data-lang-vi="Xem Định Nghĩa">View Definition</span>
                            <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Term 2: Chesed (Hebrew) -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="term-card">
                        <span class="language-badge badge-hebrew">HEBREW</span>
                        <div class="term-original">חֶסֶד</div>
                        <div class="term-transliteration">(chesed)</div>
                        <div class="term-vietnamese">Lòng thương xót bền vững</div>
                        <div class="term-english">Steadfast love/covenant faithfulness</div>
                        <a href="/dictionary/chesed" class="term-link">
                            <span data-lang-en="View Definition" data-lang-vi="Xem Định Nghĩa">View Definition</span>
                            <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Term 3: Justification (English) -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="term-card">
                        <span class="language-badge badge-english">ENGLISH</span>
                        <div class="term-original">Justification</div>
                        <div class="term-transliteration"></div>
                        <div class="term-vietnamese">Xưng Công Bình</div>
                        <div class="term-english">Legal declaration of righteousness</div>
                        <a href="/dictionary/justification" class="term-link">
                            <span data-lang-en="View Definition" data-lang-vi="Xem Định Nghĩa">View Definition</span>
                            <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Term 4: Pistis (Greek) -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="term-card">
                        <span class="language-badge badge-greek">GREEK</span>
                        <div class="term-original">πίστις</div>
                        <div class="term-transliteration">(pistis)</div>
                        <div class="term-vietnamese">Đức tin</div>
                        <div class="term-english">Faith/trust/belief</div>
                        <a href="/dictionary/pistis" class="term-link">
                            <span data-lang-en="View Definition" data-lang-vi="Xem Định Nghĩa">View Definition</span>
                            <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Term 5: Berith (Hebrew) -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="term-card">
                        <span class="language-badge badge-hebrew">HEBREW</span>
                        <div class="term-original">בְּרִית</div>
                        <div class="term-transliteration">(berith)</div>
                        <div class="term-vietnamese">Giao ước</div>
                        <div class="term-english">Covenant</div>
                        <a href="/dictionary/berith" class="term-link">
                            <span data-lang-en="View Definition" data-lang-vi="Xem Định Nghĩa">View Definition</span>
                            <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Term 6: Sanctification (English) -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="term-card">
                        <span class="language-badge badge-english">ENGLISH</span>
                        <div class="term-original">Sanctification</div>
                        <div class="term-transliteration"></div>
                        <div class="term-vietnamese">Sự Nên Thánh</div>
                        <div class="term-english">Process of becoming holy</div>
                        <a href="/dictionary/sanctification" class="term-link">
                            <span data-lang-en="View Definition" data-lang-vi="Xem Định Nghĩa">View Definition</span>
                            <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- CTA Button -->
            <div class="row">
                <div class="col text-center" data-aos="fade-up" data-aos-delay="700">
                    <a href="/dictionary" class="btn btn-primary btn-lg">
                        <span data-lang-en="Explore Full Dictionary" data-lang-vi="Khám Phá Từ Điển Đầy Đủ">Explore Full Dictionary</span>
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
                        data-lang-en="Biblical Theological Resources"
                        data-lang-vi="Tài Nguyên Thần Học Kinh Thánh">
                        Biblical Theological Resources
                    </h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100"
                       data-lang-en="Comprehensive tools for studying biblical theology rooted in Scripture"
                       data-lang-vi="Công cụ toàn diện để nghiên cứu thần học Kinh Thánh dựa trên Kinh Thánh">
                        Comprehensive tools for studying biblical theology rooted in Scripture
                    </p>
                </div>
            </div>
            <div class="row g-4">
                <!-- Resource Card 1: Statement of Faith -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="resource-card-new" style="background-image: url('https://images.unsplash.com/photo-1438232992991-995b7058bbb3?w=800&q=80');">
                        <div class="resource-overlay"></div>
                        <div class="resource-content">
                            <div class="resource-icon-new">
                                <i class="fas fa-cross"></i>
                            </div>
                            <h3 class="resource-title-new" data-lang-en="Statement of Faith" data-lang-vi="Tuyên Bố Đức Tin">Statement of Faith</h3>
                            <div class="resource-divider"></div>
                            <p class="resource-description-new"
                               data-lang-en="Comprehensive exposition of biblical doctrine based on Scripture alone"
                               data-lang-vi="Giải thích toàn diện về giáo lý Kinh Thánh dựa trên Kinh Thánh">
                                Comprehensive exposition of biblical doctrine based on Scripture alone
                            </p>
                            <a href="/faith-statements" class="resource-link">
                                <span data-lang-en="Explore" data-lang-vi="Khám Phá">Explore</span>
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Resource Card 2: Theological Dictionary -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="resource-card-new" style="background-image: url('https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=800&q=80');">
                        <div class="resource-overlay"></div>
                        <div class="resource-content">
                            <div class="resource-icon-new">
                                <i class="fas fa-book-bible"></i>
                            </div>
                            <h3 class="resource-title-new" data-lang-en="Theological Dictionary" data-lang-vi="Từ Điển Thần Học">Theological Dictionary</h3>
                            <div class="resource-divider"></div>
                            <p class="resource-description-new"
                               data-lang-en="Biblical and theological terms explained from a scriptural perspective"
                               data-lang-vi="Thuật ngữ Kinh Thánh và thần học được giải thích từ góc nhìn Kinh Thánh">
                                Biblical and theological terms explained from a scriptural perspective
                            </p>
                            <a href="/dictionary" class="resource-link">
                                <span data-lang-en="Browse" data-lang-vi="Xem">Browse</span>
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Resource Card 3: Theological Blog -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="resource-card-new" style="background-image: url('https://images.unsplash.com/photo-1455390582262-044cdead277a?w=800&q=80');">
                        <div class="resource-overlay"></div>
                        <div class="resource-content">
                            <div class="resource-icon-new">
                                <i class="fas fa-feather-alt"></i>
                            </div>
                            <h3 class="resource-title-new" data-lang-en="Theological Blog" data-lang-vi="Blog Thần Học">Theological Blog</h3>
                            <div class="resource-divider"></div>
                            <p class="resource-description-new"
                               data-lang-en="Articles and teachings grounded in biblical theology"
                               data-lang-vi="Bài viết và giảng dạy dựa trên thần học Kinh Thánh">
                                Articles and teachings grounded in biblical theology
                            </p>
                            <a href="/blog" class="resource-link">
                                <span data-lang-en="Read" data-lang-vi="Đọc">Read</span>
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
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
                            <img src="https://images.unsplash.com/photo-1438232992991-995b7058bbb3?w=600&h=400&fit=crop"
                                 alt="Wooden Cross" loading="lazy">
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
                            <img src="https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?w=600&h=400&fit=crop"
                                 alt="Stone Cross Monument" loading="lazy">
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
                            <img src="https://images.unsplash.com/photo-1516339901601-2e1b62dc0c45?w=600&h=400&fit=crop"
                                 alt="Church Cross Silhouette" loading="lazy">
                            <span class="blog-category">Salvation</span>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span><i class="far fa-calendar"></i> January 8, 2025</span>
                                <span><i class="far fa-clock"></i> 12 min read</span>
                            </div>
                            <h3 class="blog-title">Justification by Faith Alone: A Biblical Perspective</h3>
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
                    <div class="footer-logo mb-3">
                        <i class="fas fa-cross"></i>
                        <span class="footer-brand">Statement of Faith</span>
                    </div>
                    <p class="footer-text"
                       data-lang-en="Dedicated to providing sound theological resources rooted in Scripture, helping believers grow in knowledge and understanding of God's Word."
                       data-lang-vi="Cam kết cung cấp tài nguyên thần học đáng tin cậy dựa trên Kinh Thánh, giúp tín hữu phát triển trong kiến thức và sự hiểu biết về Lời Chúa.">
                        Dedicated to providing sound theological resources rooted in Scripture, helping believers grow in knowledge and understanding of God's Word.
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
                        &copy; 2025 <span data-lang-en="Statement of Faith. All rights reserved." data-lang-vi="Statement of Faith. Mọi quyền được bảo lưu.">Statement of Faith. All rights reserved.</span>
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

    <!-- Floating Action Buttons -->
    <div class="floating-buttons">
        <!-- To Top Button -->
        <button class="fab-button fab-to-top" id="fabToTop" aria-label="Scroll to top">
            <i class="fas fa-arrow-up"></i>
        </button>

        <!-- Facebook Button -->
        <a href="https://www.facebook.com/yourpage" target="_blank" class="fab-button fab-facebook" aria-label="Visit our Facebook page">
            <i class="fab fa-facebook-f"></i>
        </a>

        <!-- Donate Button -->
        <button class="fab-button fab-donate" id="fabDonate" aria-label="Support our ministry">
            <i class="fas fa-heart"></i>
        </button>
    </div>

    <!-- Scroll to Top Button (legacy - hidden) -->
    <button class="scroll-top d-none" id="scrollTop" aria-label="Scroll to top">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Scripture Modal -->
    <div id="scriptureModal" class="scripture-modal d-none" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
        <div class="modal-backdrop" data-dismiss="modal"></div>
        <div class="modal-container">
            <div class="modal-header">
                <h3 id="modalTitle" class="modal-title"></h3>
                <button class="modal-close" aria-label="Close modal" data-dismiss="modal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <p class="scripture-text"></p>
            </div>
            <div class="modal-footer">
                <small class="translation-info">Bản dịch 1925</small>
            </div>
        </div>
    </div>

    <!-- Donate Modal -->
    <div id="donateModal" class="donate-modal d-none" role="dialog" aria-modal="true" aria-labelledby="donateModalTitle">
        <div class="modal-backdrop" data-dismiss-donate="modal"></div>
        <div class="modal-container donate-modal-container">
            <!-- Header with Heartbeat Icon -->
            <div class="donate-modal-header">
                <div class="donate-icon-wrapper">
                    <i class="fas fa-heart donate-heart-icon"></i>
                </div>
                <h3 id="donateModalTitle" class="donate-modal-title">
                    <span data-lang-en="Support Our Ministry" data-lang-vi="Ủng Hộ Chức Vụ">Support Our Ministry</span>
                </h3>
                <button class="modal-close" aria-label="Close modal" data-dismiss-donate="modal">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Body -->
            <div class="donate-modal-body">
                <!-- Thank You Message -->
                <p class="donate-message"
                   data-lang-en="Your generous support helps us continue sharing biblical truth and theological resources. Thank you for partnering with us in ministry."
                   data-lang-vi="Sự ủng hộ hào phóng của bạn giúp chúng tôi tiếp tục chia sẻ chân lý Kinh Thánh và tài nguyên thần học. Cảm ơn bạn đã đồng hành với chúng tôi trong chức vụ.">
                    Your generous support helps us continue sharing biblical truth and theological resources. Thank you for partnering with us in ministry.
                </p>

                <!-- QR Code Section -->
                <div class="qr-code-section">
                    <h4 class="qr-title">
                        <span data-lang-en="Scan QR Code to Donate" data-lang-vi="Quét Mã QR Để Ủng Hộ">Scan QR Code to Donate</span>
                    </h4>
                    <div class="qr-code-wrapper">
                        <img src="https://via.placeholder.com/250x250/1e3a5f/ffffff?text=QR+Banking"
                             alt="QR Code for Banking"
                             class="qr-code-image">
                    </div>
                </div>

                <!-- Banking Information -->
                <div class="banking-info-section">
                    <h4 class="banking-title">
                        <span data-lang-en="Banking Information" data-lang-vi="Thông Tin Ngân Hàng">Banking Information</span>
                    </h4>
                    <div class="banking-details">
                        <div class="banking-row">
                            <span class="banking-label" data-lang-en="Bank:" data-lang-vi="Ngân hàng:">Bank:</span>
                            <span class="banking-value">Vietcombank</span>
                        </div>
                        <div class="banking-row">
                            <span class="banking-label" data-lang-en="Account Number:" data-lang-vi="Số tài khoản:">Account Number:</span>
                            <span class="banking-value">1234567890</span>
                        </div>
                        <div class="banking-row">
                            <span class="banking-label" data-lang-en="Account Name:" data-lang-vi="Tên tài khoản:">Account Name:</span>
                            <span class="banking-value">Statement of Faith Ministry</span>
                        </div>
                        <div class="banking-row">
                            <span class="banking-label" data-lang-en="Branch:" data-lang-vi="Chi nhánh:">Branch:</span>
                            <span class="banking-value">Ho Chi Minh City</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="donate-modal-footer">
                <p class="donate-footer-text">
                    <i class="fas fa-heart text-danger"></i>
                    <span data-lang-en="Thank you for your generosity and faithfulness!"
                          data-lang-vi="Cảm ơn sự hào phóng và thành tín của bạn!">
                        Thank you for your generosity and faithfulness!
                    </span>
                </p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- AOS (Animate On Scroll) -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Custom JS -->
    <script src="{{ asset('js/custom.js') }}"></script>
</body>
</html>
