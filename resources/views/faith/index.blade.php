{{-- ============================================
    STATEMENT OF FAITH PAGE - ULTRA MODERN REDESIGN
    Clean, Compact, Easy to Read, Mobile-First
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
    HERO SECTION - COMPACT
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
                    {{ __t('Những chân lý thiêng liêng được khẳng định từ Lời Chúa', 'Sacred truths affirmed from God\'s Word') }}
                </p>
                <div class="hero-cta" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="400">
                    <a href="#main-content" class="btn btn-hero-primary btn-lg me-3 smooth-scroll">
                        <span>{{ __t('Khám Phá', 'Explore') }}</span>
                        <i class="fas fa-arrow-down ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

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
    MAIN CONTENT - MODERN GRID LAYOUT
    ============================================ --}}
<section id="main-content" class="faith-modern-section py-5">
    <div class="container">
        @forelse($categories as $categoryIndex => $category)
            {{-- Category Block --}}
            <div class="faith-category-modern mb-5" id="category-{{ $category->slug }}" data-aos="fade-up">

                {{-- Category Header Compact --}}
                <div class="category-header-compact">
                    <div class="category-number-small">{{ $category->order }}</div>
                    <div class="category-info-compact">
                        <h2 class="category-title-compact">{{ $category->name }}</h2>
                        <p class="category-desc-compact">{{ $category->description }}</p>
                    </div>
                </div>

                {{-- Statements Modern Grid (2 columns desktop, 1 mobile) --}}
                @if($category->statements->count() > 0)
                    <div class="statements-modern-grid">
                        @foreach($category->statements as $statementIndex => $statement)
                        <div class="statement-card-modern" data-aos="fade-up" data-aos-delay="{{ 100 * ($statementIndex % 2) }}">

                            {{-- Compact Image --}}
                            @php
                                $images = [
                                    'https://images.unsplash.com/photo-1504052434569-70ad5836ab65?w=600&q=80',
                                    'https://images.unsplash.com/photo-1501003878151-d3cb87799705?w=600&q=80',
                                    'https://images.unsplash.com/photo-1490730141103-6cac27aaab94?w=600&q=80',
                                    'https://images.unsplash.com/photo-1438232992991-995b7058bbb3?w=600&q=80',
                                    'https://images.unsplash.com/photo-1507692049790-de58290a4334?w=600&q=80',
                                    'https://images.unsplash.com/photo-1544568104-5b7eb8189dd4?w=600&q=80',
                                ];
                                $imageUrl = $images[($categoryIndex * 10 + $statementIndex) % count($images)];
                            @endphp
                            <div class="statement-img-compact">
                                <img src="{{ $imageUrl }}" alt="{{ $statement->title }}" loading="lazy">
                                <div class="statement-badge-float">{{ $category->order }}.{{ $statement->order }}</div>
                            </div>

                            {{-- Content Compact --}}
                            <div class="statement-content-compact">
                                <h3 class="statement-title-modern">{{ $statement->title }}</h3>

                                <div class="statement-text-modern">
                                    {!! $statement->content !!}
                                </div>

                                {{-- Scripture Compact --}}
                                @if($statement->scripture_references && count($statement->scripture_references) > 0)
                                <div class="scripture-compact">
                                    <div class="scripture-icon-label">
                                        <i class="fas fa-book-bible"></i>
                                    </div>
                                    <div class="scripture-tags-compact">
                                        @foreach($statement->scripture_references as $reference)
                                            <button class="scripture-tag-modern" type="button" data-reference="{{ $reference }}" title="{{ __t('Nhấn để sao chép', 'Click to copy') }}">
                                                {{ $reference }}
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
                    <div class="empty-compact">
                        <i class="fas fa-inbox"></i>
                        <p>{{ __t('Chưa có tuyên bố', 'No statements yet') }}</p>
                    </div>
                @endif
            </div>

            {{-- Divider --}}
            @if(!$loop->last)
                <div class="category-divider-modern" data-aos="fade"></div>
            @endif
        @empty
            {{-- Empty State --}}
            <div class="empty-state-center text-center py-5" data-aos="fade-up">
                <i class="fas fa-cross fa-3x mb-3 text-muted"></i>
                <h3>{{ __t('Chưa Có Nội Dung', 'No Content Yet') }}</h3>
                <p class="text-muted">{{ __t('Các tuyên bố đức tin đang được cập nhật.', 'Statements are being updated.') }}</p>
                <a href="{{ route('home') }}" class="btn btn-primary mt-3">
                    <i class="fas fa-home me-2"></i>{{ __t('Về Trang Chủ', 'Back to Home') }}
                </a>
            </div>
        @endforelse
    </div>
</section>

{{-- Back to Top --}}
<button class="btn-back-top" id="btnBackTop" aria-label="{{ __t('Lên đầu trang', 'Back to top') }}">
    <i class="fas fa-arrow-up"></i>
</button>

@endsection

{{-- ============================================
    MODERN STYLES - COMPACT & CLEAN
    ============================================ --}}
@push('styles')
<style>
/* ============================================
   FAITH PAGE - ULTRA MODERN DESIGN
   ============================================ */

/* === SECTION === */
.faith-modern-section {
    background: var(--gray-50);
    min-height: 50vh;
}

/* === CATEGORY MODERN === */
.faith-category-modern {
    background: var(--white);
    border-radius: 12px;
    padding: 2rem;
    box-shadow: var(--shadow-md);
}

/* === CATEGORY HEADER COMPACT === */
.category-header-compact {
    display: flex;
    align-items: center;
    gap: 1.25rem;
    margin-bottom: 2rem;
    padding-bottom: 1.25rem;
    border-bottom: 2px solid var(--gray-100);
}

.category-number-small {
    flex-shrink: 0;
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: var(--white);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    font-weight: 900;
    font-family: var(--font-serif);
}

.category-info-compact {
    flex: 1;
}

.category-title-compact {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 0.5rem;
    font-family: var(--font-serif);
}

.category-desc-compact {
    font-size: 1rem;
    color: var(--text-secondary);
    margin: 0;
    line-height: 1.6;
}

/* === STATEMENTS MODERN GRID (2 columns) === */
.statements-modern-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 1.5rem;
}

/* === STATEMENT CARD MODERN === */
.statement-card-modern {
    background: var(--white);
    border-radius: 12px;
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
}

.statement-card-modern:hover {
    box-shadow: var(--shadow-lg);
    transform: translateY(-4px);
}

/* === IMAGE COMPACT === */
.statement-img-compact {
    position: relative;
    width: 100%;
    height: 180px;
    overflow: hidden;
}

.statement-img-compact img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.statement-card-modern:hover .statement-img-compact img {
    transform: scale(1.05);
}

.statement-badge-float {
    position: absolute;
    top: 12px;
    right: 12px;
    width: 40px;
    height: 40px;
    background: rgba(139, 69, 19, 0.95);
    backdrop-filter: blur(10px);
    color: var(--white);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.875rem;
    font-weight: 800;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
}

/* === CONTENT COMPACT === */
.statement-content-compact {
    padding: 1.5rem;
    flex: 1;
    display: flex;
    flex-direction: column;
}

.statement-title-modern {
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--primary);
    margin-bottom: 1rem;
    font-family: var(--font-serif);
    line-height: 1.4;
}

.statement-text-modern {
    font-size: 0.9375rem;
    line-height: 1.7;
    color: var(--text-primary);
    margin-bottom: 1.25rem;
    flex: 1;
}

.statement-text-modern p {
    margin-bottom: 0.75rem;
}

.statement-text-modern p:last-child {
    margin-bottom: 0;
}

.statement-text-modern strong {
    color: var(--primary);
    font-weight: 600;
}

.statement-text-modern em {
    color: var(--secondary);
}

/* === SCRIPTURE COMPACT === */
.scripture-compact {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
    padding-top: 1rem;
    border-top: 1px solid var(--gray-100);
}

.scripture-icon-label {
    flex-shrink: 0;
    width: 32px;
    height: 32px;
    background: linear-gradient(135deg, rgba(212, 165, 116, 0.15), rgba(212, 165, 116, 0.1));
    color: var(--secondary);
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 0.875rem;
}

.scripture-tags-compact {
    flex: 1;
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.scripture-tag-modern {
    padding: 0.375rem 0.875rem;
    background: var(--gray-50);
    color: var(--primary);
    font-size: 0.8125rem;
    font-weight: 600;
    border-radius: 20px;
    border: 1px solid var(--gray-200);
    cursor: pointer;
    transition: all 0.2s ease;
}

.scripture-tag-modern:hover {
    background: var(--secondary);
    color: var(--white);
    border-color: var(--secondary);
    transform: translateY(-1px);
}

/* === DIVIDER === */
.category-divider-modern {
    height: 1px;
    background: var(--gray-200);
    margin: 3rem 0;
}

/* === EMPTY STATES === */
.empty-compact {
    text-align: center;
    padding: 2rem;
    background: var(--gray-50);
    border-radius: 8px;
    color: var(--text-secondary);
}

.empty-compact i {
    font-size: 2rem;
    margin-bottom: 0.5rem;
    opacity: 0.3;
}

.empty-state-center {
    background: var(--white);
    border-radius: 12px;
    padding: 3rem 2rem;
}

/* === BACK TO TOP === */
.btn-back-top {
    position: fixed;
    bottom: 1.5rem;
    right: 1.5rem;
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, var(--primary), var(--primary-dark));
    color: var(--white);
    border: none;
    border-radius: 50%;
    font-size: 1.125rem;
    cursor: pointer;
    box-shadow: var(--shadow-lg);
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s ease;
    z-index: 999;
}

.btn-back-top.show {
    opacity: 1;
    visibility: visible;
}

.btn-back-top:hover {
    transform: translateY(-3px);
    box-shadow: var(--shadow-xl);
}

/* === RESPONSIVE === */
@media (max-width: 991px) {
    .statements-modern-grid {
        grid-template-columns: 1fr;
        gap: 1.25rem;
    }
}

@media (max-width: 767px) {
    .faith-category-modern {
        padding: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .category-header-compact {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
        margin-bottom: 1.5rem;
        padding-bottom: 1rem;
    }

    .category-number-small {
        width: 40px;
        height: 40px;
        font-size: 1.25rem;
    }

    .category-title-compact {
        font-size: 1.5rem;
    }

    .category-desc-compact {
        font-size: 0.9375rem;
    }

    .statements-modern-grid {
        gap: 1rem;
    }

    .statement-img-compact {
        height: 160px;
    }

    .statement-content-compact {
        padding: 1.25rem;
    }

    .statement-title-modern {
        font-size: 1.125rem;
    }

    .statement-text-modern {
        font-size: 0.875rem;
    }

    .scripture-compact {
        flex-direction: column;
        gap: 0.5rem;
    }

    .btn-back-top {
        width: 44px;
        height: 44px;
        bottom: 1.25rem;
        right: 1.25rem;
    }
}

@media (max-width: 575px) {
    .faith-category-modern {
        padding: 1.25rem;
    }

    .statement-img-compact {
        height: 140px;
    }

    .statement-content-compact {
        padding: 1rem;
    }

    .statement-title-modern {
        font-size: 1.0625rem;
    }

    .statement-text-modern {
        font-size: 0.8125rem;
        line-height: 1.6;
    }

    .scripture-tag-modern {
        font-size: 0.75rem;
        padding: 0.3rem 0.75rem;
    }
}

/* === SMOOTH SCROLL === */
html {
    scroll-behavior: smooth;
}

/* === PRINT === */
@media print {
    .btn-back-top,
    .hero-section,
    .breadcrumb,
    nav,
    footer {
        display: none !important;
    }

    .statement-card-modern {
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

    // ============================================
    // SMOOTH SCROLL
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
    // BACK TO TOP
    // ============================================
    const backBtn = document.getElementById('btnBackTop');
    if (backBtn) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 400) {
                backBtn.classList.add('show');
            } else {
                backBtn.classList.remove('show');
            }
        });

        backBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // ============================================
    // READING PROGRESS
    // ============================================
    const progress = document.createElement('div');
    progress.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 0%;
        height: 3px;
        background: linear-gradient(90deg, var(--primary), var(--secondary));
        z-index: 9999;
        transition: width 0.2s ease;
    `;
    document.body.appendChild(progress);

    window.addEventListener('scroll', function() {
        const winHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (window.pageYOffset / winHeight) * 100;
        progress.style.width = scrolled + '%';
    });

    // ============================================
    // SCRIPTURE COPY
    // ============================================
    const scriptureTags = document.querySelectorAll('.scripture-tag-modern');
    scriptureTags.forEach(tag => {
        tag.addEventListener('click', function() {
            const ref = this.getAttribute('data-reference');

            if (navigator.clipboard) {
                navigator.clipboard.writeText(ref).then(() => {
                    const origText = this.textContent;
                    const origBg = this.style.background;
                    const origColor = this.style.color;

                    this.textContent = @json(__t('✓', '✓'));
                    this.style.background = '#28a745';
                    this.style.color = 'white';

                    setTimeout(() => {
                        this.textContent = origText;
                        this.style.background = origBg;
                        this.style.color = origColor;
                    }, 1500);
                }).catch(err => {
                    console.error('Copy failed:', err);
                });
            }
        });

        tag.addEventListener('keypress', function(e) {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                this.click();
            }
        });
    });
});
</script>
@endpush
