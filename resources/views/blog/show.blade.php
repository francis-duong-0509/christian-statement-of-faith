@extends('layouts.app')

@section('title', $post->meta_title ?? $post->title)
@section('meta_description', $post->meta_description ?? $post->excerpt)

@push('head')
    {{-- Open Graph for social sharing --}}
    <meta property="og:title" content="{{ $post->title }}">
    <meta property="og:description" content="{{ $post->excerpt }}">
    <meta property="og:image" content="{{ asset('storage/' . ($post->og_image ?? $post->featured_image)) }}">
    <meta property="og:url" content="{{ route('blog.show', $post->slug) }}">
    <meta property="og:type" content="article">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $post->title }}">
    <meta name="twitter:description" content="{{ $post->excerpt }}">
    <meta name="twitter:image" content="{{ asset('storage/' . ($post->og_image ?? $post->featured_image)) }}">
@endpush

@push('styles')
<style>
    :root {
        --primary: #1e3a5f;
        --secondary: #8b4513;
        --gray-50: #f8f9fa;
        --gray-100: #f3f4f6;
        --gray-600: #4b5563;
        --white: #ffffff;
    }

    /* Post Hero Section */
    .post-hero {
        position: relative;
        min-height: 600px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10rem 0 6rem;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        overflow: hidden;
    }

    .post-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(180deg, rgba(30, 58, 95, 0.7) 0%, rgba(139, 69, 19, 0.8) 100%);
        z-index: 1;
    }

    .post-hero-content {
        position: relative;
        z-index: 2;
        color: var(--white);
        text-align: center;
        max-width: 900px;
        margin: 0 auto;
    }

    .post-category-badge {
        display: inline-block;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        color: var(--white);
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        font-size: 0.875rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        border: 2px solid rgba(255, 255, 255, 0.3);
        transition: all 0.3s ease;
    }

    .post-category-badge:hover {
        background: rgba(255, 255, 255, 0.3);
        text-decoration: none;
        color: var(--white);
    }

    .post-hero h1 {
        font-size: 4rem;
        font-weight: 900;
        margin-bottom: 1.5rem;
        line-height: 1.2;
        text-shadow: 0 4px 20px rgba(0,0,0,0.5);
        letter-spacing: -0.02em;
    }

    .post-meta {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
        gap: 2rem;
        font-size: 1rem;
        margin-top: 2rem;
    }

    .post-meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: rgba(255, 255, 255, 0.95);
    }

    .post-meta-item i {
        color: rgba(255, 255, 255, 0.8);
        font-size: 1.125rem;
    }

    /* Breadcrumb */
    .post-breadcrumb {
        background: var(--gray-50);
        padding: 1.5rem 0;
        border-bottom: 1px solid #e5e7eb;
    }

    .breadcrumb {
        background: transparent;
        margin-bottom: 0;
        padding: 0;
    }

    .breadcrumb-item a {
        color: var(--primary);
        text-decoration: none;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .breadcrumb-item a:hover {
        color: var(--secondary);
    }

    .breadcrumb-item.active {
        color: var(--gray-600);
    }

    /* Post Content */
    .post-content-wrapper {
        background: var(--white);
        padding: 4rem 0;
    }

    .post-content {
        font-size: 1.125rem;
        line-height: 1.9;
        color: #1f2937;
    }

    .post-content h2 {
        font-size: 2rem;
        font-weight: 700;
        color: var(--primary);
        margin-top: 3rem;
        margin-bottom: 1.5rem;
        line-height: 1.3;
    }

    .post-content h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary);
        margin-top: 2.5rem;
        margin-bottom: 1.25rem;
    }

    .post-content p {
        margin-bottom: 1.5rem;
    }

    .post-content ul, .post-content ol {
        margin-bottom: 1.5rem;
        padding-left: 2rem;
    }

    .post-content li {
        margin-bottom: 0.75rem;
    }

    .post-content blockquote {
        border-left: 4px solid var(--secondary);
        padding-left: 1.5rem;
        margin: 2rem 0;
        font-style: italic;
        color: var(--gray-600);
        background: var(--gray-50);
        padding: 1.5rem;
        border-radius: 8px;
    }

    .post-content strong {
        color: var(--primary);
        font-weight: 700;
    }

    .post-content a {
        color: var(--secondary);
        text-decoration: underline;
    }

    .post-content a:hover {
        color: #a55a1a;
    }

    /* Featured Image in Content */
    .featured-image-wrapper {
        margin: -4rem 0 4rem;
        position: relative;
        z-index: 10;
    }

    .featured-image-wrapper img {
        width: 100%;
        border-radius: 16px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.2);
    }

    /* Social Sharing */
    .social-sharing {
        background: linear-gradient(135deg, var(--gray-50) 0%, var(--white) 100%);
        padding: 2.5rem;
        border-radius: 16px;
        margin: 3rem 0;
        border: 2px solid #e5e7eb;
    }

    .social-sharing h5 {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 1.5rem;
    }

    .social-buttons {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    .btn-social {
        flex: 1;
        min-width: 140px;
        padding: 0.875rem 1.5rem;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.9375rem;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .btn-social i {
        margin-right: 0.5rem;
    }

    .btn-facebook {
        background: #1877f2;
        color: white;
        border-color: #1877f2;
    }

    .btn-facebook:hover {
        background: #0c5ccc;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(24, 119, 242, 0.4);
    }

    .btn-twitter {
        background: #1da1f2;
        color: white;
        border-color: #1da1f2;
    }

    .btn-twitter:hover {
        background: #0c85d0;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(29, 161, 242, 0.4);
    }

    .btn-linkedin {
        background: #0077b5;
        color: white;
        border-color: #0077b5;
    }

    .btn-linkedin:hover {
        background: #005885;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 119, 181, 0.4);
    }

    /* Related Posts Section */
    .related-posts-section {
        background: var(--gray-50);
        padding: 4rem 0;
        margin-top: 4rem;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 3rem;
        text-align: center;
        position: relative;
        padding-bottom: 1rem;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, var(--primary), var(--secondary));
        border-radius: 2px;
    }

    .related-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 2rem;
    }

    /* Sidebar Sticky */
    .post-sidebar {
        position: sticky;
        top: 100px;
    }

    .sidebar-widget {
        background: var(--white);
        border-radius: 12px;
        padding: 2rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 16px rgba(0,0,0,0.08);
        border: 1px solid #e5e7eb;
    }

    .sidebar-widget-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #e5e7eb;
    }

    .popular-post {
        display: flex;
        gap: 1rem;
        margin-bottom: 1.5rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid #f3f4f6;
    }

    .popular-post:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .popular-post-number {
        flex-shrink: 0;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, var(--primary), #2d5a8a);
        color: var(--white);
        border-radius: 8px;
        font-weight: 700;
        font-size: 0.875rem;
    }

    .popular-post-content h6 {
        font-size: 0.9375rem;
        font-weight: 600;
        margin-bottom: 0.5rem;
    }

    .popular-post-content h6 a {
        color: #1f2937;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .popular-post-content h6 a:hover {
        color: var(--primary);
    }

    .popular-post-meta {
        display: flex;
        gap: 1rem;
        font-size: 0.8125rem;
        color: #6b7280;
    }

    .popular-post-meta i {
        color: var(--secondary);
    }

    /* Reading Progress Bar */
    .reading-progress {
        position: fixed;
        top: 0;
        left: 0;
        width: 0%;
        height: 4px;
        background: linear-gradient(90deg, var(--primary), var(--secondary));
        z-index: 9999;
        transition: width 0.2s ease;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .post-hero {
            min-height: 500px;
            padding: 8rem 0 5rem;
        }

        .post-hero h1 {
            font-size: 3rem;
        }

        .post-sidebar {
            position: static;
            margin-top: 3rem;
        }

        .related-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 767px) {
        .post-hero {
            min-height: 450px;
            padding: 6rem 0 4rem;
        }

        .post-hero h1 {
            font-size: 2.25rem;
        }

        .post-meta {
            gap: 1rem;
        }

        .featured-image-wrapper {
            margin: -2rem 0 3rem;
        }

        .post-content {
            font-size: 1rem;
        }

        .post-content h2 {
            font-size: 1.75rem;
        }

        .post-content h3 {
            font-size: 1.375rem;
        }

        .social-buttons {
            flex-direction: column;
        }

        .btn-social {
            min-width: 100%;
        }

        .section-title {
            font-size: 2rem;
        }
    }
</style>
@endpush

@section('content')
<!-- Reading Progress Bar -->
<div class="reading-progress" id="readingProgress"></div>

<!-- Post Hero -->
<section class="post-hero" style="background-image: url('{{ $post->featured_image ? asset('storage/' . $post->featured_image) : 'https://images.unsplash.com/photo-1501003878151-d3cb87799705?w=1920&q=80' }}');">
    <div class="container">
        <div class="post-hero-content">
            <a href="{{ route('blog.category', $post->category->slug) }}" class="post-category-badge" data-aos="fade-up">
                <i class="fas fa-folder-open me-2"></i>{{ $post->category->name }}
            </a>

            <h1 data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
                {{ $post->title }}
            </h1>

            <div class="post-meta" data-aos="fade-up" data-aos-delay="200">
                <div class="post-meta-item">
                    <i class="fas fa-calendar"></i>
                    <span>{{ $post->formatted_date }}</span>
                </div>
                <div class="post-meta-item">
                    <i class="fas fa-clock"></i>
                    <span>{{ $post->reading_time }}</span>
                </div>
                <div class="post-meta-item">
                    <i class="fas fa-eye"></i>
                    <span>{{ number_format($post->views_count) }} {{ __t('lượt xem', 'views') }}</span>
                </div>
                @if($post->author)
                    <div class="post-meta-item">
                        <i class="fas fa-user"></i>
                        <span>{{ $post->author->name }}</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Breadcrumb -->
<div class="post-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __t('Trang chủ', 'Home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">{{ __t('Bài viết', 'Blog') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('blog.category', $post->category->slug) }}">{{ $post->category->name }}</a></li>
                <li class="breadcrumb-item active">{{ $post->title }}</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Post Content -->
<div class="post-content-wrapper">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <!-- Post Content -->
                <article class="post-content" data-aos="fade-up">
                    {!! $post->content !!}
                </article>

                <!-- Social Sharing -->
                <div class="social-sharing" data-aos="fade-up">
                    <h5><i class="fas fa-share-alt me-2"></i>{{ __t('Chia sẻ bài viết', 'Share this article') }}</h5>
                    <div class="social-buttons">
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $post->slug)) }}"
                           target="_blank"
                           class="btn btn-social btn-facebook">
                            <i class="fab fa-facebook-f"></i>Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $post->slug)) }}&text={{ urlencode($post->title) }}"
                           target="_blank"
                           class="btn btn-social btn-twitter">
                            <i class="fab fa-twitter"></i>Twitter
                        </a>
                        <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('blog.show', $post->slug)) }}"
                           target="_blank"
                           class="btn btn-social btn-linkedin">
                            <i class="fab fa-linkedin-in"></i>LinkedIn
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <div class="post-sidebar">
                    <x-blog-sidebar :popular-posts="$popular_posts" />
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Related Posts -->
@if($related_posts->isNotEmpty())
    <section class="related-posts-section">
        <div class="container">
            <h2 class="section-title" data-aos="fade-up">
                {{ __t('Bài viết liên quan', 'Related Articles') }}
            </h2>
            <div class="related-grid">
                @foreach($related_posts as $relatedPost)
                    <div data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                        <x-blog-card :post="$relatedPost" />
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
@endsection

@push('scripts')
<script>
    // Reading Progress Bar
    window.addEventListener('scroll', function() {
        const windowHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (window.pageYOffset / windowHeight) * 100;
        document.getElementById('readingProgress').style.width = scrolled + '%';
    });

    // Smooth Scroll for anchors
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const target = document.querySelector(targetId);
            if (target) {
                e.preventDefault();
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
</script>
@endpush
