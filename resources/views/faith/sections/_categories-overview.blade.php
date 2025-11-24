<!-- Categories Overview Section -->
<section class="categories-overview-section py-5 bg-light" id="categories">
    <div class="container">
        <!-- Section Header -->
        <div class="row text-center mb-5">
            <div class="col-lg-10 mx-auto">
                <h2 class="section-title-main" data-aos="fade-up"
                    data-lang-en="Explore by Category"
                    data-lang-vi="Khám Phá Theo Danh Mục">
                    {{ __t('Khám Phá Theo Danh Mục', 'Explore by Category') }}
                </h2>
                <p class="section-intro" data-aos="fade-up" data-aos-delay="100"
                   data-lang-en="Our beliefs organized by theological themes"
                   data-lang-vi="Đức tin của chúng tôi được sắp xếp theo chủ đề thần học">
                    {{ __t('Đức tin của chúng tôi được sắp xếp theo chủ đề thần học', 'Our beliefs organized by theological themes') }}
                </p>
            </div>
        </div>

        <!-- Category Cards -->
        @if($categories->count() > 0)
            <div class="row g-4">
                @foreach($categories as $category)
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 * $loop->iteration }}">
                    <a href="#category-{{ $category->slug }}" class="category-card-link smooth-scroll">
                        <div class="category-card">
                            <div class="category-icon-wrapper">
                                @if($category->icon)
                                    <i class="{{ $category->icon }}"></i>
                                @else
                                    <i class="fas fa-cross"></i>
                                @endif
                            </div>
                            <h3 class="category-card-title">{{ $category->name }}</h3>
                            <p class="category-card-description">{{ $category->description }}</p>
                            <div class="category-card-meta">
                                <span class="badge bg-primary">
                                    {{ $category->statements_count }} {{ __t('tuyên bố', 'statements') }}
                                </span>
                            </div>
                            <div class="category-card-arrow">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
        @else
            <div class="row">
                <div class="col-12">
                    <div class="empty-state" data-aos="fade-up">
                        <i class="fas fa-cross fa-4x mb-4 text-muted"></i>
                        <h3>{{ __t('Chưa Có Danh Mục', 'No Categories Yet') }}</h3>
                        <p class="text-muted">{{ __t('Các danh mục đang được cập nhật', 'Categories are being updated') }}</p>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
