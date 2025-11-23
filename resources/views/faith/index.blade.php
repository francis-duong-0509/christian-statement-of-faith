@extends('layouts.app')

@section('title', __t('Tuyên Bố Đức Tin', 'Statement of Faith') . ' - ' . config('app.name'))

@section('meta_description', __t('Khám phá những chân lý thiêng liêng về đức tin Cơ Đốc dựa trên Kinh Thánh, được trình bày một cách rõ ràng và đầy đủ.', 'Explore the sacred truths about Christian faith based on Scripture, presented clearly and comprehensively.'))

@push('head')
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
<meta property="og:title" content="{{ __t('Tuyên Bố Đức Tin', 'Statement of Faith') }} - {{ config('app.name') }}">
<meta property="og:description" content="{{ __t('Khám phá những chân lý thiêng liêng về đức tin Cơ Đốc dựa trên Kinh Thánh', 'Explore the sacred truths about Christian faith based on Scripture') }}">
<meta property="og:url" content="{{ route('faith.index') }}">
<meta property="og:type" content="website">
<meta property="og:image" content="https://images.unsplash.com/photo-1501003878151-d3cb87799705?w=1200&q=80">
@endpush

@section('content')

{{-- ============================================
    BREADCRUMB
    ============================================ --}}
<div class="container my-3">
    <x-breadcrumb :items="[
        ['url' => route('home'), 'label' => __t('Trang Chủ', 'Home')],
        ['label' => __t('Tuyên Bố Đức Tin', 'Statement of Faith')]
    ]" />
</div>

{{-- ============================================
    MAIN CONTENT - PREMIUM SHOWCASE
    ============================================ --}}
<section id="main-content" class="faith-showcase-section py-5">
    <div class="container-fluid px-lg-5">
        @forelse($categories as $categoryIndex => $category)
            {{-- Category Showcase Block --}}
            <div class="category-showcase-block mb-5" id="category-{{ $category->slug }}" data-aos="fade-up">

                {{-- Category Header with Featured Image --}}
                <div class="category-hero-header">
                    @php
                        $categoryImageUrl = $category->banner_image ? asset($category->banner_image) : null;
                    @endphp
                    <div class="category-hero-bg" style="background-image: url('{{ $categoryImageUrl }}');"></div>
                    <div class="category-hero-overlay"></div>
                    <div class="category-hero-content">
                        <div class="category-badge-hero">
                            <span class="badge-number-hero">{{ $category->order }}</span>
                        </div>
                        <h2 class="category-title-hero">{{ $category->name }}</h2>
                        <p class="category-desc-hero">{{ $category->description }}</p>
                        <div class="category-stats-hero">
                            <span class="stat-item-hero">
                                <i class="fas fa-book-open"></i>
                                {{ $category->statements_count }} {{ __t('tuyên bố', 'statements') }}
                            </span>
                        </div>
                    </div>
                </div>

                {{-- Statements Masonry Grid --}}
                @if($category->statements->count() > 0)
                    <div class="statements-showcase-grid">
                        @foreach($category->statements as $statementIndex => $statement)
                        <div class="statement-showcase-card" data-aos="fade-up" data-aos-delay="{{ 100 * ($statementIndex % 3) }}">

                            {{-- Featured Image with Overlay Badge --}}
                            @php
                                $statementImageUrl = $statement->image ? asset($statement->image) : null;
                            @endphp
                            <div class="statement-featured-img">
                                <img src="{{ $statementImageUrl }}" alt="{{ $statement->title }}" loading="lazy">
                                <div class="statement-img-overlay">
                                    <div class="overlay-badge">{{ $category->order }}.{{ $statement->order }}</div>
                                    <div class="overlay-icon"><i class="fas fa-cross"></i></div>
                                </div>
                            </div>

                            {{-- Content Rich --}}
                            <div class="statement-content-rich">
                                <h3 class="statement-title-showcase">{{ $statement->title }}</h3>

                                <div class="statement-text-rich">
                                    {!! $statement->content !!}
                                </div>

                                {{-- Scripture References Rich --}}
                                @if($statement->hasScriptureReferences())
                                    <div class="scripture-showcase-box">
                                        <div class="scripture-header-rich">
                                            <i class="fas fa-book-bible"></i>
                                            <strong>{{ __t('Kinh Thánh Tham Khảo', 'Scripture References') }}</strong>
                                        </div>
                                        <div class="scripture-pills-rich">
                                            @foreach($statement->scripture_references as $scripture)
                                                <button
                                                    class="scripture-pill-showcase"
                                                    type="button"
                                                    data-tippy-content="{{ $scripture['text'] ?? '' }}"
                                                    data-ref="{{ $scripture['ref'] ?? '' }}" >
                                                    <i class="fas fa-bookmark me-1"></i>{{ $scripture['ref'] ?? '' }}
                                                </button>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="empty-showcase">
                        <i class="fas fa-inbox fa-3x mb-3"></i>
                        <p>{{ __t('Chưa có tuyên bố', 'No statements yet') }}</p>
                    </div>
                @endif
            </div>

            {{-- Decorative Divider --}}
            @if(!$loop->last)
                <div class="category-divider-showcase" data-aos="fade">
                    <div class="divider-ornament">
                        <i class="fas fa-cross"></i>
                    </div>
                </div>
            @endif
        @empty
            <div class="empty-state-center text-center py-5" data-aos="fade-up">
                <i class="fas fa-cross fa-4x mb-4 text-muted"></i>
                <h3>{{ __t('Chưa Có Nội Dung', 'No Content Yet') }}</h3>
                <p class="text-muted">{{ __t('Các tuyên bố đức tin đang được cập nhật.', 'Statements are being updated.') }}</p>
                <a href="{{ route('home') }}" class="btn btn-primary btn-lg mt-3">
                    <i class="fas fa-home me-2"></i>{{ __t('Về Trang Chủ', 'Back to Home') }}
                </a>
            </div>
        @endforelse
    </div>
</section>

@endsection

{{-- ============================================
    SHOWCASE STYLES - PREMIUM & RICH
    ============================================ --}}
@push('styles')
<style>
/* ============================================
   FAITH SHOWCASE - PREMIUM EXPERIENCE
   ============================================ */

/* === SECTION === */
.faith-showcase-section {
    background: linear-gradient(180deg, var(--gray-50) 0%, var(--white) 100%);
    min-height: 60vh;
}

/* === CATEGORY SHOWCASE BLOCK === */
.category-showcase-block {
    margin-bottom: 5rem;
}

/* === CATEGORY HERO HEADER === */
.category-hero-header {
    position: relative;
    min-height: 400px;
    border-radius: 20px;
    overflow: hidden;
    margin-bottom: 3rem;
    box-shadow: var(--shadow-xl);
}

.category-hero-bg {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
    transition: transform 0.5s ease;
}

.category-showcase-block:hover .category-hero-bg {
    transform: scale(1.05);
}

.category-hero-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(180deg, rgba(0, 0, 0, 0.25) 0%, rgba(0, 0, 0, 0.55) 100%);
}

.category-hero-content {
    position: relative;
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    padding: 3rem;
    color: var(--white);
}

.category-badge-hero {
    margin-bottom: 1.5rem;
}

.badge-number-hero {
    width: 80px;
    height: 80px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(20px);
    border: 3px solid rgba(255, 255, 255, 0.4);
    color: var(--white);
    border-radius: 16px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 2.5rem;
    font-weight: 900;
    font-family: var(--font-serif);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
}

.category-title-hero {
    font-size: 3rem;
    font-weight: 800;
    color: var(--white);
    margin-bottom: 1rem;
    font-family: var(--font-serif);
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.9), 0 4px 20px rgba(0, 0, 0, 0.6);
}

.category-desc-hero {
    font-size: 1.375rem;
    line-height: 1.7;
    color: rgba(255, 255, 255, 0.95);
    max-width: 800px;
    margin-bottom: 1.5rem;
    text-shadow: 0 2px 6px rgba(0, 0, 0, 0.8), 0 3px 12px rgba(0, 0, 0, 0.5);
}

.category-stats-hero {
    display: flex;
    gap: 2rem;
    justify-content: center;
}

.stat-item-hero {
    padding: 0.75rem 1.5rem;
    background: rgba(255, 255, 255, 0.15);
    backdrop-filter: blur(10px);
    border-radius: 50px;
    font-size: 1.125rem;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.stat-item-hero i {
    color: var(--accent);
}

/* === STATEMENTS SHOWCASE GRID === */
.statements-showcase-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(450px, 1fr));
    gap: 2.5rem;
}

/* === STATEMENT SHOWCASE CARD === */
.statement-showcase-card {
    background: var(--white);
    border-radius: 16px;
    overflow: hidden;
    box-shadow: var(--shadow-md);
    transition: all 0.4s ease;
    display: flex;
    flex-direction: column;
}

.statement-showcase-card:hover {
    box-shadow: var(--shadow-xl);
    transform: translateY(-8px);
}

/* === FEATURED IMAGE === */
.statement-featured-img {
    position: relative;
    width: 100%;
    height: 280px;
    overflow: hidden;
}

.statement-featured-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.6s ease;
}

.statement-showcase-card:hover .statement-featured-img img {
    transform: scale(1.1);
}

.statement-img-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg, rgba(30, 58, 95, 0.75), rgba(139, 69, 19, 0.75));
    opacity: 0;
    transition: opacity 0.4s ease;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 1rem;
}

.statement-showcase-card:hover .statement-img-overlay {
    opacity: 1;
}

.overlay-badge {
    padding: 0.5rem 1.25rem;
    background: rgba(255, 255, 255, 0.25);
    backdrop-filter: blur(10px);
    color: var(--white);
    border-radius: 50px;
    font-size: 1.125rem;
    font-weight: 800;
    border: 2px solid rgba(255, 255, 255, 0.4);
}

.overlay-icon {
    font-size: 3rem;
    color: var(--white);
    text-shadow: 0 2px 6px rgba(0, 0, 0, 0.8), 0 3px 12px rgba(0, 0, 0, 0.5);
}

/* === CONTENT RICH === */
.statement-content-rich {
    padding: 2rem;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.statement-title-showcase {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 1.25rem;
    font-family: var(--font-serif);
    line-height: 1.3;
}

.statement-text-rich {
    font-size: 1.0625rem;
    line-height: 1.8;
    color: var(--text-primary);
    margin-bottom: 2rem;
    flex: 1;
}

.statement-text-rich p {
    margin-bottom: 1rem;
}

.statement-text-rich p:last-child {
    margin-bottom: 0;
}

.statement-text-rich strong {
    color: var(--primary);
    font-weight: 700;
}

.statement-text-rich em {
    color: var(--secondary);
    font-style: italic;
}

/* === SCRIPTURE SHOWCASE BOX === */
.scripture-showcase-box {
    background: linear-gradient(135deg, rgba(212, 165, 116, 0.12), rgba(212, 165, 116, 0.05));
    padding: 1.5rem;
    border-radius: 12px;
    border-left: 4px solid var(--accent);
}

.scripture-header-rich {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    margin-bottom: 1rem;
    color: var(--primary);
    font-size: 1.0625rem;
}

.scripture-header-rich i {
    color: var(--secondary);
    font-size: 1.25rem;
}

.scripture-pills-rich {
    display: flex;
    flex-wrap: wrap;
    gap: 0.75rem;
}

.scripture-pill-showcase {
    padding: 0.625rem 1.25rem;
    background: var(--white);
    color: var(--primary);
    font-size: 0.9375rem;
    font-weight: 600;
    border-radius: 50px;
    border: 2px solid var(--accent);
    cursor: help !important;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
}

.scripture-pill-showcase:hover {
    background: var(--secondary);
    color: var(--white);
    border-color: var(--secondary);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.scripture-pill-showcase i {
    font-size: 0.75rem;
}

/* Scripture Reference Buttons - Enhanced (Homepage specific handled separately) */


/* === DIVIDER SHOWCASE === */
.category-divider-showcase {
    margin: 5rem 0;
    text-align: center;
}

.divider-ornament {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 60px;
    height: 60px;
    background: linear-gradient(135deg, rgba(30, 58, 95, 0.1), rgba(139, 69, 19, 0.1));
    border-radius: 50%;
}

.divider-ornament i {
    font-size: 1.5rem;
    color: var(--secondary);
}

/* === EMPTY STATES === */
.empty-showcase {
    text-align: center;
    padding: 4rem 2rem;
    background: var(--gray-50);
    border-radius: 16px;
    color: var(--text-secondary);
}

.empty-state-center {
    background: var(--white);
    border-radius: 20px;
    padding: 4rem 2rem;
}

/* === RESPONSIVE === */
@media (max-width: 1200px) {
    .statements-showcase-grid {
        grid-template-columns: repeat(auto-fill, minmax(380px, 1fr));
        gap: 2rem;
    }
}

@media (max-width: 991px) {
    .statements-showcase-grid {
        grid-template-columns: 1fr;
        gap: 2rem;
    }

    .category-hero-header {
        min-height: 350px;
    }

    .category-title-hero {
        font-size: 2.5rem;
    }

    .category-desc-hero {
        font-size: 1.25rem;
    }
}

@media (max-width: 767px) {
    .category-hero-header {
        min-height: 300px;
        margin-bottom: 2rem;
    }

    .category-hero-content {
        padding: 2rem;
    }

    .badge-number-hero {
        width: 60px;
        height: 60px;
        font-size: 2rem;
    }

    .category-title-hero {
        font-size: 2rem;
    }

    .category-desc-hero {
        font-size: 1.125rem;
    }

    .category-stats-hero {
        flex-direction: column;
        gap: 1rem;
    }

    .statements-showcase-grid {
        gap: 1.5rem;
    }

    .statement-featured-img {
        height: 220px;
    }

    .statement-content-rich {
        padding: 1.5rem;
    }

    .statement-title-showcase {
        font-size: 1.5rem;
    }

    .statement-text-rich {
        font-size: 1rem;
    }

    .scripture-showcase-box {
        padding: 1.25rem;
    }
}

@media (max-width: 575px) {
    .category-hero-header {
        min-height: 260px;
        border-radius: 12px;
    }

    .badge-number-hero {
        width: 50px;
        height: 50px;
        font-size: 1.75rem;
    }

    .category-title-hero {
        font-size: 1.75rem;
    }

    .category-desc-hero {
        font-size: 1rem;
    }

    .statement-featured-img {
        height: 200px;
    }

    .statement-content-rich {
        padding: 1.25rem;
    }

    .statement-title-showcase {
        font-size: 1.375rem;
    }

    .statement-text-rich {
        font-size: 0.9375rem;
    }

    .scripture-pill-showcase {
        font-size: 0.875rem;
        padding: 0.5rem 1rem;
    }
}

/* === SMOOTH SCROLL === */
html {
    scroll-behavior: smooth;
}

/* === TIPPY.JS CUSTOM STYLING FOR SCRIPTURE TOOLTIPS === */
.tippy-box[data-theme~='custom-scripture-pills'] {
    background: linear-gradient(135deg, #1e3a5f 0%, #2d5a8a 100%);
    color: #ffffff;
    font-size: 17px;
    line-height: 1.8;
    padding: 24px 28px;
    border-radius: 14px;
    box-shadow: 0 15px 50px rgba(0, 0, 0, 0.35),
                0 0 0 1px rgba(255, 255, 255, 0.15) inset;
    max-width: 550px;
    font-family: Georgia, 'Times New Roman', serif;
}

.tippy-box[data-theme~='custom-scripture-pills'] .tippy-content {
    font-style: normal;
    text-align: left;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.25);
}

.tippy-box[data-theme~='custom-scripture-pills'] .tippy-arrow {
    color: #1e3a5f;
}

.tippy-box[data-theme~='custom-scripture-pills'][data-placement^='top'] > .tippy-arrow::before {
    border-top-color: #1e3a5f;
}

.tippy-box[data-theme~='custom-scripture-pills'][data-placement^='bottom'] > .tippy-arrow::before {
    border-bottom-color: #1e3a5f;
}

.tippy-box[data-theme~='custom-scripture-pills'][data-placement^='left'] > .tippy-arrow::before {
    border-left-color: #1e3a5f;
}

.tippy-box[data-theme~='custom-scripture-pills'][data-placement^='right'] > .tippy-arrow::before {
    border-right-color: #1e3a5f;
}

/* Responsive - Optimized tooltips on mobile */
@media (max-width: 767px) {
    .tippy-box[data-theme~='custom-scripture-pills'] {
        font-size: 15px;
        padding: 18px 22px;
        max-width: calc(100vw - 40px);
    }
}

/* === PRINT === */
@media print {
    .hero-section,
    .breadcrumb,
    nav,
    footer {
        display: none !important;
    }

    .statement-showcase-card {
        page-break-inside: avoid;
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

    // Initialize Tippy.js for scripture pills with enhanced custom theme
    if (typeof tippy !== 'undefined') {
        tippy('.scripture-pill-showcase', {
            theme: 'custom-scripture-pills',
            placement: 'top',
            arrow: true,
            animation: 'scale',
            duration: [350, 250],
            maxWidth: 550,
            interactive: false,
            trigger: 'mouseenter focus click',
            hideOnClick: true,
            allowHTML: false,
            offset: [0, 14],
            zIndex: 9999,
            onShow(instance) {
                instance.popper.classList.add('scripture-tooltip');
            }
        });
    } else {
        console.warn('Tippy.js not loaded. Scripture tooltips will not work.');
    }

    // Smooth Scroll
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

    // Reading Progress
    const progress = document.createElement('div');
    progress.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 0%;
        height: 4px;
        background: linear-gradient(90deg, var(--primary), var(--secondary), var(--accent));
        z-index: 9999;
        transition: width 0.2s ease;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    `;
    document.body.appendChild(progress);

    window.addEventListener('scroll', function() {
        const winHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (window.pageYOffset / winHeight) * 100;
        progress.style.width = scrolled + '%';
    });

    // Scripture Copy
    const scripturePills = document.querySelectorAll('.scripture-pill-showcase');
    scripturePills.forEach(pill => {
        pill.addEventListener('click', function() {
            const ref = this.getAttribute('data-reference');

            if (navigator.clipboard) {
                navigator.clipboard.writeText(ref).then(() => {
                    const origText = this.innerHTML;
                    const origBg = this.style.background;
                    const origColor = this.style.color;

                    this.innerHTML = '<i class="fas fa-check me-1"></i>' + @json(__t('Đã sao chép!', 'Copied!'));
                    this.style.background = '#28a745';
                    this.style.color = 'white';
                    this.style.borderColor = '#28a745';

                    setTimeout(() => {
                        this.innerHTML = origText;
                        this.style.background = origBg;
                        this.style.color = origColor;
                        this.style.borderColor = '';
                    }, 2000);
                }).catch(err => {
                    console.error('Copy failed:', err);
                });
            }
        });

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
