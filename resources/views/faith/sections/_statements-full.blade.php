<!-- All Statements Section - Clean & Modern Layout -->
<section class="statements-full-section py-5">
    <div class="container">
        @forelse($categories as $categoryIndex => $category)
            <!-- Category Section -->
            <div class="category-section-wrapper mb-5" id="category-{{ $category->slug }}" data-aos="fade-up">

                <!-- Category Header -->
                <div class="category-header-clean">
                    <div class="category-number-large">{{ $category->order }}</div>
                    <div class="category-info-clean">
                        <h2 class="category-title-clean">{{ $category->name }}</h2>
                        <p class="category-description-clean">{{ $category->description }}</p>
                        <div class="category-meta-clean">
                            <span class="meta-badge">
                                <i class="fas fa-file-lines me-2"></i>
                                {{ $category->statements_count }} {{ __t('tuyên bố', 'statements') }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Statements List - Full Content -->
                @if($category->statements->count() > 0)
                    <div class="statements-list-clean">
                        @foreach($category->statements as $statementIndex => $statement)
                        <div class="statement-card-full" data-aos="fade-up" data-aos-delay="{{ 100 * ($statementIndex % 3) }}">
                            <!-- Statement Header -->
                            <div class="statement-header-full">
                                <div class="statement-number-clean">{{ $category->order }}.{{ $statement->order }}</div>
                                <h3 class="statement-title-clean">{{ $statement->title }}</h3>
                            </div>

                            <!-- Statement Full Content -->
                            <div class="statement-content-full">
                                {!! $statement->content !!}
                            </div>

                            <!-- Scripture References -->
                            @if($statement->scripture_references && count($statement->scripture_references) > 0)
                            <div class="scripture-references-clean">
                                <div class="scripture-label">
                                    <i class="fas fa-book-bible me-2"></i>
                                    <strong>{{ __t('Các Câu Kinh Thánh Tham Khảo', 'Scripture References') }}</strong>
                                </div>
                                <div class="scripture-tags-clean">
                                    @foreach($statement->scripture_references as $reference)
                                        <span class="scripture-badge">{{ $reference }}</span>
                                    @endforeach
                                </div>
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-state-simple">
                        <i class="fas fa-inbox fa-3x mb-3 text-muted"></i>
                        <p class="text-muted">{{ __t('Chưa có tuyên bố nào trong danh mục này', 'No statements in this category yet') }}</p>
                    </div>
                @endif
            </div>

            <!-- Category Divider -->
            @if(!$loop->last)
                <div class="category-divider-clean" data-aos="fade-up">
                    <div class="divider-line-clean"></div>
                </div>
            @endif
        @empty
            <!-- Empty State -->
            <div class="empty-state-main" data-aos="fade-up">
                <div class="empty-icon-wrapper">
                    <i class="fas fa-cross"></i>
                </div>
                <h3>{{ __t('Chưa Có Nội Dung', 'No Content Yet') }}</h3>
                <p>{{ __t('Các tuyên bố đức tin đang được cập nhật. Vui lòng quay lại sau.', 'Statements of faith are being updated. Please check back later.') }}</p>
                <a href="{{ route('home') }}" class="btn btn-primary btn-lg mt-4">
                    <i class="fas fa-home me-2"></i>
                    {{ __t('Về Trang Chủ', 'Back to Home') }}
                </a>
            </div>
        @endforelse
    </div>
</section>

<!-- Back to Top Button -->
<button class="back-to-top-btn" id="backToTop" onclick="scrollToTop()" aria-label="Back to top">
    <i class="fas fa-arrow-up"></i>
</button>
