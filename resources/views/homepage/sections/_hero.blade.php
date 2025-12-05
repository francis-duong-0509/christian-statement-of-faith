<!-- Hero Section - Reduced Height with Image Background -->
<section class="hero-section hero-reduced" style="background-image: url({{ asset('uploads/images/homepage_banner.jpeg') }});">
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="hero-title" data-aos="fade-up" data-aos-duration="1000">
                    {{ __t('Niềm Tin Kitô Giáo: Dựa Trên Kinh Thánh', 'Christian Theology: Rooted in Scripture Alone') }}
                </h1>
                <p class="hero-subtitle" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200"
                   data-lang-en="A comprehensive resource for understanding biblical doctrine and theological truth grounded in God's Word."
                   data-lang-vi="Tất cả là nhờ bỏi Chúa, trong Chúa và vì Chúa.">
                    {{ __t('Tất cả là nhờ bỏi Chúa, trong Chúa và vì Chúa.', 'A comprehensive resource for understanding biblical doctrine and theological truth grounded in God\'s Word.') }}
                </p>
                <div class="hero-cta" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <a href="{{ route('faith.index') }}" class="btn btn-hero-primary btn-lg me-3">
                        <span>{{ __t('Tuyên Bố Đức Tin', 'Explore Faith Statements') }}</span>
                        <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                    <a href="#statement-of-faith" class="btn btn-hero-secondary btn-lg smooth-scroll">
                        <span>{{ __t('Niềm Tin', 'Our Beliefs') }}</span>
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
