{{-- ============================================
    STATEMENT OF FAITH PAGE - MODERN REDESIGN
    Clean, Professional, Easy to Read
    ============================================ --}}

@extends('layouts.app')

@section('title', __t('Tuyên Bố Đức Tin', 'Statement of Faith') . ' - ' . config('app.name'))

@section('meta_description', __t('Khám phá những chân lý thiêng liêng về đức tin Cơ Đốc dựa trên Kinh Thánh, được trình bày một cách rõ ràng và đầy đủ.', 'Explore the sacred truths about Christian faith based on Scripture, presented clearly and comprehensively.'))

@push('head')
<!-- JSON-LD Structured Data for SEO -->
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "Article",
    "name": "{{ __t('Tuyên Bố Đức Tin', 'Statement of Faith') }}",
    "description": "{{ __t('Những chân lý thiêng liêng về đức tin Cơ Đốc', 'Sacred truths about Christian faith') }}",
    "url": "{{ route('faith.index') }}",
    "inLanguage": "{{ app()->getLocale() }}"
}
</script>

<!-- Open Graph Tags -->
<meta property="og:title" content="{{ __t('Tuyên Bố Đức Tin', 'Statement of Faith') }} - {{ config('app.name') }}">
<meta property="og:description" content="{{ __t('Khám phá những chân lý thiêng liêng về đức tin Cơ Đốc dựa trên Kinh Thánh', 'Explore the sacred truths about Christian faith based on Scripture') }}">
<meta property="og:url" content="{{ route('faith.index') }}">
<meta property="og:type" content="website">
<meta property="og:image" content="https://images.unsplash.com/photo-1501003878151-d3cb87799705?w=1200&q=80">
@endpush

@section('content')

{{-- ============================================
    HERO SECTION - REDUCED HEIGHT (Like Home)
    ============================================ --}}
<section class="hero-section hero-reduced" style="background-image: url('https://images.unsplash.com/photo-1504052434569-70ad5836ab65?w=1920&q=80');">
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h1 class="hero-title" data-aos="fade-up" data-aos-duration="1000">
                    {{ __t('Tuyên Bố Đức Tin', 'Statement of Faith') }}
                </h1>
                <p class="hero-subtitle" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    {{ __t('Những chân lý thiêng liêng được khẳng định từ Lời Chúa, định hình niềm tin và hướng dẫn chức vụ của chúng tôi', 'Sacred truths affirmed from God\'s Word, shaping our beliefs and guiding our ministry') }}
                </p>
                <div class="hero-cta" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <a href="#main-content" class="btn btn-hero-primary btn-lg me-3 smooth-scroll">
                        <span>{{ __t('Khám Phá', 'Explore') }}</span>
                        <i class="fas fa-arrow-down ms-2"></i>
                    </a>
                    <a href="{{ route('home') }}" class="btn btn-hero-secondary btn-lg">
                        <span>{{ __t('Trang Chủ', 'Home') }}</span>
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

{{-- ============================================
    BREADCRUMB
    ============================================ --}}
<div class="container my-4">
    <x-breadcrumb :items="[
        ['url' => route('home'), 'label' => __t('Trang Chủ', 'Home')],
        ['label' => __t('Tuyên Bố Đức Tin', 'Statement of Faith')]
    ]" />
</div>

{{-- ============================================
    MAIN CONTENT - STATEMENT CATEGORIES
    ============================================ --}}
<section id="main-content" class="faith-content-section py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-11 col-xl-10">
                @forelse($categories as $categoryIndex => $category)
                    {{-- Category Wrapper --}}
                    <article class="faith-category-wrapper mb-5" id="category-{{ $category->slug }}" data-aos="fade-up">

                        {{-- Category Header --}}
                        <div class="faith-category-header">
                            <div class="category-number-badge">{{ $category->order }}</div>
                            <div class="category-header-content">
                                <h2 class="category-title">{{ $category->name }}</h2>
                                <p class="category-description">{{ $category->description }}</p>
                                <div class="category-meta">
                                    <span class="meta-badge">
                                        <i class="fas fa-book-open"></i>
                                        {{ $category->statements_count }} {{ __t('tuyên bố', 'statements') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- Statements List --}}
                        @if($category->statements->count() > 0)
                            <div class="faith-statements-grid">
                                @foreach($category->statements as $statementIndex => $statement)
                                <div class="faith-statement-card" data-aos="fade-up" data-aos-delay="{{ 100 * ($statementIndex % 3) }}">
                                    {{-- Statement Image --}}
                                    @php
                                        // Beautiful Christian imagery for each statement
                                        $images = [
                                            'https://images.unsplash.com/photo-1504052434569-70ad5836ab65?w=800&q=80', // Open Bible
                                            'https://images.unsplash.com/photo-1501003878151-d3cb87799705?w=800&q=80', // Cross sunset
                                            'https://images.unsplash.com/photo-1490730141103-6cac27aaab94?w=800&q=80', // Praying hands
                                            'https://images.unsplash.com/photo-1438232992991-995b7058bbb3?w=800&q=80', // Church window
                                            'https://images.unsplash.com/photo-1507692049790-de58290a4334?w=800&q=80', // Dove
                                            'https://images.unsplash.com/photo-1544568104-5b7eb8189dd4?w=800&q=80', // Bible on table
                                            'https://images.unsplash.com/photo-1520013817300-1f4c1cb245fb?w=800&q=80', // Cross in nature
                                            'https://images.unsplash.com/photo-1505168125601-4ddfdea4c322?w=800&q=80', // Open Bible with light
                                        ];
                                        $imageUrl = $images[($categoryIndex * 10 + $statementIndex) % count($images)];
                                    @endphp
                                    <div class="statement-image">
                                        <img src="{{ $imageUrl }}" alt="{{ $statement->title }}" loading="lazy">
                                        <div class="statement-image-overlay">
                                            <i class="fas fa-cross"></i>
                                        </div>
                                    </div>

                                    {{-- Statement Header --}}
                                    <div class="statement-header-simple">
                                        <span class="statement-badge">{{ $category->order }}.{{ $statement->order }}</span>
                                        <h3 class="statement-title-simple">{{ $statement->title }}</h3>
                                    </div>

                                    {{-- Statement Content --}}
                                    <div class="statement-body">
                                        {!! $statement->content !!}
                                    </div>

                                    {{-- Scripture References --}}
                                    @if($statement->scripture_references && count($statement->scripture_references) > 0)
                                    <div class="scripture-box">
                                        <div class="scripture-label">
                                            <i class="fas fa-book-bible"></i>
                                            <strong>{{ __t('Kinh Thánh Tham Khảo', 'Scripture References') }}</strong>
                                        </div>
                                        <div class="scripture-pills">
                                            @foreach($statement->scripture_references as $reference)
                                                <button class="scripture-pill" type="button" data-reference="{{ $reference }}" title="{{ __t('Nhấn để sao chép', 'Click to copy') }}">
                                                    {{ $reference }}
                                                </button>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="empty-message">
                                <i class="fas fa-inbox fa-2x mb-3"></i>
                                <p>{{ __t('Chưa có tuyên bố nào trong danh mục này', 'No statements in this category yet') }}</p>
                            </div>
                        @endif
                    </article>

                    {{-- Divider --}}
                    @if(!$loop->last)
                        <div class="faith-section-divider" data-aos="fade"></div>
                    @endif
                @empty
                    {{-- Empty State --}}
                    <div class="empty-state-main text-center py-5" data-aos="fade-up">
                        <div class="empty-icon-large mb-4">
                            <i class="fas fa-cross fa-4x"></i>
                        </div>
                        <h3>{{ __t('Chưa Có Nội Dung', 'No Content Yet') }}</h3>
                        <p class="text-muted">{{ __t('Các tuyên bố đức tin đang được cập nhật. Vui lòng quay lại sau.', 'Statements of faith are being updated. Please check back later.') }}</p>
                        <a href="{{ route('home') }}" class="btn btn-primary btn-lg mt-3">
                            <i class="fas fa-home me-2"></i>
                            {{ __t('Về Trang Chủ', 'Back to Home') }}
                        </a>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

{{-- Back to Top Button --}}
<button class="back-to-top-modern" id="backToTopBtn" aria-label="{{ __t('Lên đầu trang', 'Back to top') }}">
    <i class="fas fa-arrow-up"></i>
</button>

@endsection

{{-- ============================================
    CUSTOM STYLES - CLEAN & MODERN
    ============================================ --}}
@push('styles')
<style>
/* ============================================
   FAITH PAGE STYLES - CLEAN & PROFESSIONAL
   ============================================ */

/* === CONTENT SECTION === */
.faith-content-section {
    background: linear-gradient(180deg, var(--gray-50) 0%, var(--white) 100%);
    min-height: 60vh;
}

/* === CATEGORY WRAPPER === */
.faith-category-wrapper {
    background: var(--white);
    border-radius: var(--radius-lg);
    padding: 3rem;
    box-shadow: var(--shadow-lg);
    margin-bottom: 3rem;
}

/* === CATEGORY HEADER === */
.faith-category-header {
    display: flex;
    align-items: flex-start;
    gap: 2rem;
    margin-bottom: 3rem;
    padding-bottom: 2rem;
}

.category-number-badge {
    flex-shrink: 0;
    width: 80px;
    height: 80px;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: var(--white);
    border-radius: var(--radius-md);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    font-weight: 900;
    font-family: var(--font-serif);
    box-shadow: var(--shadow-md);
}

.category-header-content {
    flex: 1;
}

.category-title {
    font-size: 2.5rem;
    font-weight: 800;
    color: var(--primary);
    margin-bottom: 1rem;
    font-family: var(--font-serif);
    line-height: 1.2;
}

.category-description {
    font-size: 1.25rem;
    line-height: 1.8;
    color: var(--text-secondary);
    margin-bottom: 1rem;
}

.category-meta {
    display: flex;
    gap: 1rem;
    align-items: center;
}

.meta-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1.25rem;
    background: linear-gradient(135deg, rgba(30, 58, 95, 0.1), rgba(30, 58, 95, 0.05));
    color: var(--primary);
    border-radius: var(--radius-full);
    font-size: 0.95rem;
    font-weight: 600;
}

.meta-badge i {
    color: var(--secondary);
}

/* === STATEMENTS GRID === */
.faith-statements-grid {
    display: grid;
    gap: 2rem;
}

/* === STATEMENT CARD === */
.faith-statement-card {
    background: var(--white);
    border-radius: var(--radius-md);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: all var(--transition);
}

.faith-statement-card:hover {
    box-shadow: var(--shadow-lg);
    transform: translateY(-4px);
}

/* === STATEMENT IMAGE === */
.statement-image {
    position: relative;
    width: 100%;
    height: 280px;
    overflow: hidden;
}

.statement-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.statement-image:hover img {
    transform: scale(1.08);
}

.statement-image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(30, 58, 95, 0.7), rgba(139, 69, 19, 0.7));
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.statement-image:hover .statement-image-overlay {
    opacity: 1;
}

.statement-image-overlay i {
    font-size: 3rem;
    color: var(--white);
    text-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
}

/* === STATEMENT HEADER === */
.statement-header-simple {
    display: flex;
    align-items: center;
    gap: 1.5rem;
    margin-bottom: 2rem;
    padding: 2.5rem 2.5rem 0;
}

.statement-badge {
    flex-shrink: 0;
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, var(--secondary), var(--accent));
    color: var(--white);
    border-radius: var(--radius-sm);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.25rem;
    font-weight: 800;
    font-family: var(--font-serif);
    box-shadow: var(--shadow-sm);
}

.statement-title-simple {
    flex: 1;
    font-size: 2rem;
    font-weight: 700;
    color: var(--primary);
    margin: 0;
    font-family: var(--font-serif);
    line-height: 1.3;
}

/* === STATEMENT BODY === */
.statement-body {
    font-size: 1.25rem;
    line-height: 1.9;
    color: var(--text-primary);
    margin-bottom: 2rem;
    padding: 0 2.5rem;
}

.statement-body p {
    margin-bottom: 1.5rem;
    line-height: 1.9;
}

.statement-body p:last-child {
    margin-bottom: 0;
}

.statement-body strong {
    color: var(--primary);
    font-weight: 700;
}

.statement-body em {
    color: var(--secondary);
    font-style: italic;
}

.statement-body ul,
.statement-body ol {
    margin: 1.5rem 0;
    padding-left: 2rem;
}

.statement-body li {
    margin-bottom: 0.75rem;
    line-height: 1.8;
}

.statement-body blockquote {
    margin: 2rem 0;
    padding: 1.5rem;
    background: linear-gradient(135deg, rgba(30, 58, 95, 0.05), rgba(139, 69, 19, 0.05));
    border-radius: var(--radius-sm);
    font-style: italic;
    color: var(--text-secondary);
}

/* === SCRIPTURE BOX === */
.scripture-box {
    background: linear-gradient(135deg, rgba(212, 165, 116, 0.1), rgba(212, 165, 116, 0.05));
    padding: 1.5rem 2.5rem 2.5rem;
    border-radius: 0 0 var(--radius-md) var(--radius-md);
}

.scripture-label {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1rem;
    color: var(--primary);
    font-size: 1.05rem;
}

.scripture-label i {
    color: var(--secondary);
    font-size: 1.25rem;
}

.scripture-pills {
    display: flex;
    flex-wrap: wrap;
    gap: 0.75rem;
}

.scripture-pill {
    padding: 0.625rem 1.25rem;
    background: var(--white);
    color: var(--primary);
    font-size: 1rem;
    font-weight: 600;
    border-radius: var(--radius-full);
    box-shadow: var(--shadow-sm);
    cursor: pointer;
    transition: all var(--transition);
    border: none;
}

.scripture-pill:hover {
    background: var(--secondary);
    color: var(--white);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

/* === DIVIDER === */
.faith-section-divider {
    height: 2px;
    background: linear-gradient(90deg, transparent 0%, var(--gray-200) 50%, transparent 100%);
    margin: 4rem 0;
}

/* === EMPTY STATES === */
.empty-message {
    text-align: center;
    padding: 3rem;
    background: var(--gray-50);
    border-radius: var(--radius-md);
    color: var(--text-secondary);
}

.empty-state-main {
    background: var(--gray-50);
    border-radius: var(--radius-lg);
    padding: 4rem 2rem;
}

.empty-icon-large {
    color: var(--gray-300);
}

/* === BACK TO TOP BUTTON === */
.back-to-top-modern {
    position: fixed;
    bottom: 2rem;
    right: 2rem;
    width: 56px;
    height: 56px;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: var(--white);
    border: none;
    border-radius: 50%;
    font-size: 1.25rem;
    cursor: pointer;
    box-shadow: var(--shadow-lg);
    opacity: 0;
    visibility: hidden;
    transition: all var(--transition);
    z-index: 999;
}

.back-to-top-modern.show {
    opacity: 1;
    visibility: visible;
}

.back-to-top-modern:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-xl);
    background: linear-gradient(135deg, var(--secondary), var(--accent));
}

/* === RESPONSIVE === */
@media (max-width: 991px) {
    .faith-category-wrapper {
        padding: 2.5rem;
    }

    .faith-category-header {
        flex-direction: column;
        gap: 1.5rem;
    }

    .category-number-badge {
        width: 70px;
        height: 70px;
        font-size: 2rem;
    }

    .category-title {
        font-size: 2rem;
    }

    .statement-title-simple {
        font-size: 1.75rem;
    }

    .statement-body {
        font-size: 1.125rem;
    }
}

@media (max-width: 767px) {
    .faith-category-wrapper {
        padding: 2rem;
        margin-bottom: 2rem;
    }

    .category-number-badge {
        width: 60px;
        height: 60px;
        font-size: 1.75rem;
    }

    .category-title {
        font-size: 1.75rem;
    }

    .category-description {
        font-size: 1.125rem;
    }

    .faith-statements-grid {
        gap: 1.5rem;
    }

    .statement-image {
        height: 220px;
    }

    .statement-header-simple {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
        padding: 2rem 2rem 0;
    }

    .statement-badge {
        width: 50px;
        height: 50px;
        font-size: 1rem;
    }

    .statement-title-simple {
        font-size: 1.5rem;
    }

    .statement-body {
        font-size: 1.0625rem;
        padding: 0 2rem;
    }

    .scripture-box {
        padding: 1.5rem 2rem 2rem;
    }

    .back-to-top-modern {
        width: 50px;
        height: 50px;
        bottom: 1.5rem;
        right: 1.5rem;
        font-size: 1.125rem;
    }
}

/* === SMOOTH SCROLL === */
html {
    scroll-behavior: smooth;
}

/* === PRINT STYLES === */
@media print {
    .back-to-top-modern,
    .hero-section,
    .breadcrumb,
    nav,
    footer {
        display: none !important;
    }

    .faith-statement-card {
        page-break-inside: avoid;
        box-shadow: none;
    }
}
</style>
@endpush

{{-- ============================================
    INTERACTIVE JAVASCRIPT
    ============================================ --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {

    // ============================================
    // 1. SMOOTH SCROLL
    // ============================================
    document.querySelectorAll('a.smooth-scroll, a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#' || !targetId.startsWith('#')) return;

            const target = document.querySelector(targetId);
            if (target) {
                e.preventDefault();
                const offsetTop = target.offsetTop - 80;
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });

    // ============================================
    // 2. BACK TO TOP BUTTON
    // ============================================
    const backToTopBtn = document.getElementById('backToTopBtn');
    if (backToTopBtn) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 400) {
                backToTopBtn.classList.add('show');
            } else {
                backToTopBtn.classList.remove('show');
            }
        });

        backToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // ============================================
    // 3. READING PROGRESS BAR
    // ============================================
    const progressBar = document.createElement('div');
    progressBar.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 0%;
        height: 3px;
        background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
        z-index: 9999;
        transition: width 0.2s ease;
    `;
    document.body.appendChild(progressBar);

    window.addEventListener('scroll', function() {
        const windowHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (window.pageYOffset / windowHeight) * 100;
        progressBar.style.width = scrolled + '%';
    });

    // ============================================
    // 4. SCRIPTURE COPY TO CLIPBOARD
    // ============================================
    const scripturePills = document.querySelectorAll('.scripture-pill');
    scripturePills.forEach(pill => {
        pill.addEventListener('click', function() {
            const reference = this.getAttribute('data-reference');

            if (navigator.clipboard) {
                navigator.clipboard.writeText(reference).then(() => {
                    const originalText = this.textContent;
                    const originalBg = this.style.background;
                    const originalColor = this.style.color;

                    this.textContent = @json(__t('✓ Đã sao chép!', '✓ Copied!'));
                    this.style.background = '#28a745';
                    this.style.color = 'white';

                    setTimeout(() => {
                        this.textContent = originalText;
                        this.style.background = originalBg;
                        this.style.color = originalColor;
                    }, 1500);
                }).catch(err => {
                    console.error('Copy failed:', err);
                });
            }
        });

        // Keyboard accessibility
        pill.addEventListener('keypress', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            }
        });
    });
});
</script>
@endpush
