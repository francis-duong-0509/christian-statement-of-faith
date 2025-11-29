    <!-- Latest Blog Posts Section -->
    <section class="blog-section py-5">
        <div class="container">
            <div class="row text-center mb-5">
                <div class="col-lg-8 mx-auto">
                    <h2 class="section-title" data-aos="fade-up">
                        {{ __t('Bài Viết Mới Nhất', 'Latest Articles') }}
                    </h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        {{ __t('Đọc các bài viết và chia sẻ của chúng tôi về chủ đề thần học Kinh Thánh', 'Discover our most recent theological insights and biblical teachings') }}
                    </p>
                </div>
            </div>
            <div class="row g-4">
                @forelse($latestPosts as $index => $post)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ 100 * ($index + 1) }}">
                        <article class="blog-card h-100 d-flex flex-column">
                            <div class="blog-image">
                                <img src="{{ $post->featured_image ?? 'https://images.unsplash.com/photo-1438232992991-995b7058bbb3?w=600&h=400&fit=crop' }}"
                                     alt="{{ $post->title }}" loading="lazy">
                                @if($post->category)
                                    <span class="blog-category">{{ $post->category->name ?? '' }}</span>
                                @endif
                            </div>
                            <div class="blog-content flex-grow-1 d-flex flex-column">
                                <div class="blog-meta">
                                    <span><i class="far fa-calendar"></i> {{ $post->formatted_date }}</span>
                                    <span><i class="far fa-clock"></i> {{ $post->reading_time }}</span>
                                </div>
                                <h3 class="blog-title">{{ $post->title }}</h3>
                                <p class="blog-excerpt flex-grow-1">
                                    {{ Str::limit($post->excerpt, 120) }}
                                </p>
                                <a href="{{ route('blog.show', $post->slug) }}" class="blog-link mt-auto">
                                    <span>{{ __t('Đọc Thêm', 'Read More') }}</span> <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p class="text-muted">{{ __t('Chưa có bài viết nào', 'No blog posts available') }}</p>
                    </div>
                @endforelse
            </div>
            @if($latestPosts->count() > 0)
                <div class="row mt-5">
                    <div class="col text-center" data-aos="fade-up">
                        <a href="{{ route('blog.index') }}" class="btn btn-outline-primary btn-lg">
                            <span>{{ __t('Xem Tất Cả Bài Viết', 'View All Articles') }}</span> <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </section>
