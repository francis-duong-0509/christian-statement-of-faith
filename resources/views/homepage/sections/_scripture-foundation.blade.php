    <!-- Our Foundation: Core Beliefs Section -->
    <section class="scripture-foundation-section py-5 bg-light">
        <div class="container">
            <!-- Section Header -->
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title" data-aos="fade-up">
                        {{ __t('Lời Sống và Linh Nghiệm', 'Scripture and Faith') }}
                    </h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        {{ __t('Lời Sống và Linh Nghiệm từ những người đã trải qua và sống qua những trải nghiệm thuộc linh và bước đi theo Chúa', 'Scripture and faith from people who have lived and experienced their experiences') }}
                    </p>
                </div>
            </div>

            <!-- Foundation Cards Grid -->
            <div class="row g-4">
                @foreach($foundationCategories as $index => $category)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 * ($index + 1) }}">
                        <div class="foundation-card h-100">
                            <!-- Card Image (if exists, otherwise show gradient header) -->
                            @if($category->image)
                                <div class="foundation-card-image">
                                    <a href="{{ route('blog.index', ['category_id' => $category->id]) }}">
                                        <img src="{{ asset($category->image_url) }}" alt="{{ $category->name }}" loading="lazy">
                                    </a>
                                </div>
                            @else
                                <!-- Fallback: Gradient header if no image -->
                                <div class="foundation-card-header">
                                    <div class="foundation-icon-wrapper">
                                        @if($index === 0)
                                            <i class="fas fa-crown"></i>
                                        @elseif($index === 1)
                                            <i class="fas fa-book-bible"></i>
                                        @else
                                            <i class="fa-solid fa-cross"></i>
                                        @endif
                                    </div>
                                </div>
                            @endif

                            <!-- Card Content -->
                            <div class="foundation-card-body">
                                <h3 class="foundation-card-title">
                                    <a href="{{ route('blog.index', ['category_id' => $category->id]) }}">{{ $category->name }}</a>
                                </h3>
                                <p class="foundation-card-description">
                                    {{ Str::limit($category->description, 150) }}
                                </p>

                                <!-- Posts Count -->
                                <div class="foundation-meta">
                                    <div class="meta-item">
                                        <i class="fas fa-file-alt me-2"></i>
                                        <span>{{ $category->published_posts_count }} {{ __t('bài viết', 'articles') }}</span>
                                    </div>
                                </div>

                                <!-- Read More Link -->
                                <a href="{{ route('blog.index', ['category_id' => $category->id]) }}" class="foundation-link">
                                    <span>{{ __t('Xem Bài Viết', 'View Articles') }}</span>
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- CTA Button -->
            <div class="row mt-5">
                <div class="col text-center" data-aos="fade-up" data-aos-delay="700">
                    <a href="{{ route('blog.index') }}" class="btn btn-primary btn-lg">
                        <span>
                            {{ __t('Khám Phá Tất Cả Lời Sống', 'Explore All Categories') }}
                        </span>
                        <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Modern Foundation Card Styles --}}
    @push('styles')
    <style>
    /* Foundation Card - Modern Design */
    .foundation-card {
        background: #ffffff;
        border-radius: 20px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        position: relative;
        display: flex;
        flex-direction: column;
    }

    .foundation-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(30, 58, 95, 0.15);
    }

    /* Card Image */
    .foundation-card-image {
        position: relative;
        width: 100%;
        height: 220px;
        overflow: hidden;
    }

    .foundation-card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .foundation-card:hover .foundation-card-image img {
        transform: scale(1.1);
    }

    /* Image Overlay */
    .foundation-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(30, 58, 95, 0.3) 0%, rgba(45, 90, 138, 0.2) 100%);
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .foundation-overlay .foundation-icon-wrapper {
        background: rgba(255, 255, 255, 0.3);
        backdrop-filter: blur(10px);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
    }

    /* Card Header with Gradient Background (Fallback when no image) */
    .foundation-card-header {
        background: linear-gradient(135deg, #1e3a5f 0%, #2d5a8a 100%);
        padding: 40px 30px;
        text-align: center;
        position: relative;
    }

    .foundation-icon-wrapper {
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.15);
        backdrop-filter: blur(10px);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 10px;
        border: 2px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease;
    }

    .foundation-card:hover .foundation-icon-wrapper {
        transform: scale(1.1) rotate(5deg);
        background: rgba(255, 255, 255, 0.25);
    }

    .foundation-icon-wrapper i {
        font-size: 36px;
        color: #ffffff;
    }

    .foundation-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        width: 45px;
        height: 45px;
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(10px);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        font-weight: 700;
        color: #ffffff;
        border: 2px solid rgba(255, 255, 255, 0.5);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        z-index: 2;
    }

    /* Card Body */
    .foundation-card-body {
        padding: 30px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .foundation-card-title {
        font-size: 22px;
        font-weight: 700;
        color: #1e3a5f;
        margin-bottom: 15px;
        line-height: 1.3;
        font-family: 'Merriweather', serif;
    }

    .foundation-card-description {
        font-size: 15px;
        line-height: 1.7;
        color: #555;
        margin-bottom: 20px;
        flex-grow: 1;
    }

    /* Meta Section */
    .foundation-meta {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 15px;
        margin-bottom: 20px;
    }

    .meta-item {
        display: flex;
        align-items: center;
        font-size: 14px;
        font-weight: 600;
        color: #1e3a5f;
    }

    .meta-item i {
        color: #0c63d4;
    }

    /* Read More Link */
    .foundation-link {
        display: inline-flex;
        align-items: center;
        color: #1e3a5f;
        font-weight: 600;
        font-size: 15px;
        text-decoration: none;
        transition: all 0.3s ease;
        margin-top: auto;
    }

    .foundation-link:hover {
        color: #0c63d4;
        transform: translateX(5px);
    }

    .foundation-link i {
        transition: transform 0.3s ease;
    }

    .foundation-link:hover i {
        transform: translateX(5px);
    }

    /* Responsive */
    @media (max-width: 767px) {
        .foundation-card-header {
            padding: 30px 20px;
        }

        .foundation-icon-wrapper {
            width: 60px;
            height: 60px;
        }

        .foundation-icon-wrapper i {
            font-size: 28px;
        }

        .foundation-card-body {
            padding: 20px;
        }

        .foundation-card-title {
            font-size: 20px;
        }
    }
    </style>
    @endpush
