    <!-- Enhanced Resources Section -->
    <section class="resources-section py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title" data-aos="fade-up">
                        {{ __t('Tài Nguyên Thần Học Kinh Thánh', 'Biblical Theological Resources') }}
                    </h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        {{ __t('Công cụ toàn diện để nghiên cứu thần học Kinh Thánh dựa trên Kinh Thánh', 'Comprehensive tools for studying biblical theology rooted in Scripture') }}
                    </p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="resource-card-new" style="background-image: url({{ asset('uploads/images/holy_cross_1.jpeg') }});">
                        <div class="resource-overlay"></div>
                        <div class="resource-content">
                            <div class="resource-icon-new">
                                <i class="fas fa-cross"></i>
                            </div>
                            <h3 class="resource-title-new">{{ __t('Tuyên Bố Đức Tin', 'Statement of Faith') }}</h3>
                            <div class="resource-divider"></div>
                            <p class="resource-description-new">
                                {{ __t('Giải thích toàn diện về giáo lý Kinh Thánh dựa trên Kinh Thánh', 'Comprehensive exposition of biblical doctrine based on Scripture alone') }}
                            </p>
                            <a href="{{ route('faith.index') }}" class="resource-link">
                                <span>{{ __t('Khám Phá', 'Explore') }}</span>
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="resource-card-new" style="background-image: url({{ asset('uploads/images/holy_bible_1.jpeg') }});">
                        <div class="resource-overlay"></div>
                        <div class="resource-content">
                            <div class="resource-icon-new">
                                <i class="fas fa-book-bible"></i>
                            </div>
                            <h3 class="resource-title-new">{{ __t('Từ Điển Thần Học', 'Theological Dictionary') }}</h3>
                            <div class="resource-divider"></div>
                            <p class="resource-description-new">
                                {{ __t('Thuật ngữ Kinh Thánh và thần học được giải thích từ góc nhìn Kinh Thánh', 'Biblical and theological terms explained from a scriptural perspective') }}
                            </p>
                            <a href="#" class="resource-link">
                                <span>{{ __t('Tra Cứu', 'Browse') }}</span>
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="resource-card-new" style="background-image: url({{ asset('uploads/images/holy_cross_3.jpeg') }});">
                        <div class="resource-overlay"></div>
                        <div class="resource-content">
                            <div class="resource-icon-new">
                                <i class="fas fa-feather-alt"></i>
                            </div>
                            <h3 class="resource-title-new">{{ __t('Blog Thần Học', 'Theological Blog') }}</h3>
                            <div class="resource-divider"></div>
                            <p class="resource-description-new">
                                {{ __t('Bài viết và chia sẻ dựa trên thần học Kinh Thánh', 'Articles and teachings grounded in biblical theology') }}
                            </p>
                            <a href="/blog" class="resource-link">
                                <span>{{ __t('Đọc', 'Read') }}</span>
                                <i class="fas fa-arrow-right ms-2"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
