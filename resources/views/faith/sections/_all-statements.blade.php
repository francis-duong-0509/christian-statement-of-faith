<!-- All Statements Section -->
<section class="all-statements-section py-5" id="all-statements">
    <div class="container">
        @forelse($categories as $category)
            <!-- Category Section -->
            <div class="category-section mb-5" id="category-{{ $category->slug }}" data-aos="fade-up">
                <!-- Category Header -->
                <div class="category-section-header mb-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-3">
                            <div class="category-number-badge">
                                {{ $category->order }}
                            </div>
                            <div>
                                <h2 class="category-section-title mb-1">{{ $category->name }}</h2>
                                <p class="category-section-description mb-0">{{ $category->description }}</p>
                            </div>
                        </div>
                        <div class="category-count-badge">
                            {{ $category->statements_count }}
                        </div>
                    </div>
                </div>

                <!-- Statements Grid -->
                @if($category->statements->count() > 0)
                    <div class="row g-4">
                        @foreach($category->statements as $statement)
                        <div class="col-lg-6" data-aos="fade-up" data-aos-delay="{{ 100 * $loop->iteration }}">
                            <div class="statement-item">
                                <!-- Statement Header -->
                                <div class="d-flex align-items-start gap-3 mb-3">
                                    <div class="statement-number">{{ $category->order }}.{{ $statement->order }}</div>
                                    <div class="flex-grow-1">
                                        <h3 class="statement-title mb-0">{{ $statement->title }}</h3>
                                    </div>
                                </div>

                                <!-- Statement Content -->
                                <div class="statement-content">
                                    {!! Str::limit(strip_tags($statement->content), 280, '...') !!}
                                </div>

                                <!-- Scripture References -->
                                @if($statement->scripture_references && count($statement->scripture_references) > 0)
                                <div class="scripture-references mt-3">
                                    <i class="fas fa-book-bible"></i>
                                    <div class="scripture-list">
                                        @foreach($statement->scripture_references as $reference)
                                            <span class="scripture-ref">{{ $reference }}</span>{{ !$loop->last ? ',' : '' }}
                                        @endforeach
                                    </div>
                                </div>
                                @endif

                                <!-- Read More Link -->
                                <a href="{{ route('faith.show', [$category->slug, $statement->slug]) }}" class="btn btn-link btn-read-more p-0 mt-3">
                                    {{ __t('Đọc thêm', 'Read more') }}
                                    <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="text-center text-muted py-5">
                        <i class="fas fa-inbox fa-3x mb-3"></i>
                        <p>{{ __t('Chưa có tuyên bố nào trong danh mục này', 'No statements in this category yet') }}</p>
                    </div>
                @endif
            </div>

            @if(!$loop->last)
                <hr class="section-divider my-5">
            @endif
        @empty
            <div class="row">
                <div class="col-12">
                    <div class="empty-state" data-aos="fade-up">
                        <i class="fas fa-cross fa-4x mb-4 text-muted"></i>
                        <h3>{{ __t('Chưa Có Nội Dung', 'No Content Yet') }}</h3>
                        <p class="text-muted">{{ __t('Các tuyên bố đức tin đang được cập nhật. Vui lòng quay lại sau.', 'Statements of faith are being updated. Please check back later.') }}</p>
                        <a href="{{ route('home') }}" class="btn btn-primary mt-3">
                            <i class="fas fa-home me-2"></i>
                            {{ __t('Về Trang Chủ', 'Back to Home') }}
                        </a>
                    </div>
                </div>
            </div>
        @endforelse
    </div>
</section>
