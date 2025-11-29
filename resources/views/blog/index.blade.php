@extends('layouts.app')

@section('title', __t('Bài Viết - Thần Học Cơ Đốc', 'Blog - Christian Statement of Faith'))
@section('meta_description', __t('Bài Viết - Thần Học Cơ Đốc', 'Explore articles about faith, theology, and Christian living.'))

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

    /* Blog Hero Section - With Image Background */
    .blog-hero {
        position: relative;
        min-height: 500px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 8rem 0 5rem;
        margin-bottom: 3rem;
        background-size: cover;
        background-position: center center;
        background-repeat: no-repeat;
        overflow: hidden;
    }

    .blog-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(30, 58, 95, 0.4) 0%, rgba(139, 69, 19, 0.3) 100%);
        z-index: 1;
    }

    .blog-hero-content {
        position: relative;
        z-index: 2;
        color: var(--white);
        text-align: center;
    }

    .blog-hero h1 {
        font-size: 4rem;
        font-weight: 900;
        margin-bottom: 1.5rem;
        text-shadow: 0 4px 20px rgba(0,0,0,0.5);
        letter-spacing: -0.02em;
    }

    .blog-hero p {
        font-size: 1.5rem;
        opacity: 0.95;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.6;
        text-shadow: 0 2px 10px rgba(0,0,0,0.3);
    }

    /* Category Badge in Hero */
    .category-badge-hero {
        display: inline-block;
        background: rgba(255, 255, 255, 0.25);
        backdrop-filter: blur(10px);
        color: #ffffff;
        padding: 10px 24px;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        margin-bottom: 20px;
        border: 2px solid rgba(255, 255, 255, 0.4);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }

    /* Category Meta in Hero */
    .category-meta-hero {
        margin-top: 25px;
        font-size: 1.1rem;
        color: rgba(255, 255, 255, 0.95);
        font-weight: 600;
        text-shadow: 0 2px 10px rgba(0,0,0,0.3);
    }

    .category-meta-hero i {
        opacity: 0.9;
    }

    /* Scroll Indicator */
    .scroll-indicator {
        position: absolute;
        bottom: 2rem;
        left: 50%;
        transform: translateX(-50%);
        z-index: 2;
        animation: bounce 2s infinite;
    }

    .scroll-indicator i {
        color: var(--white);
        font-size: 2rem;
        opacity: 0.8;
    }

    @keyframes bounce {
        0%, 20%, 50%, 80%, 100% {
            transform: translateX(-50%) translateY(0);
        }
        40% {
            transform: translateX(-50%) translateY(-10px);
        }
        60% {
            transform: translateX(-50%) translateY(-5px);
        }
    }

    /* Search Bar */
    .blog-search-bar {
        background: var(--white);
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 10px 40px rgba(0,0,0,0.15);
        margin-top: -3rem;
        margin-bottom: 3rem;
        position: relative;
        z-index: 10;
    }

    .blog-search-bar .form-control {
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        padding: 0.875rem 1.25rem;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .blog-search-bar .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(30, 58, 95, 0.1);
    }

    .blog-search-bar .btn-primary {
        background: var(--primary);
        border: none;
        padding: 0.875rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .blog-search-bar .btn-primary:hover {
        background: #2d5a8a;
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(30, 58, 95, 0.3);
    }

    .blog-search-bar .form-select {
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        padding: 0.875rem 1.25rem;
        font-size: 1rem;
        transition: all 0.3s ease;
    }

    .blog-search-bar .form-select:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(30, 58, 95, 0.1);
    }

    /* Featured Section */
    .featured-section {
        margin-bottom: 4rem;
    }

    .featured-badge {
        display: inline-block;
        background: linear-gradient(135deg, var(--secondary), #a55a1a);
        color: var(--white);
        padding: 0.5rem 1.5rem;
        border-radius: 50px;
        font-size: 0.875rem;
        font-weight: 600;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 12px rgba(139, 69, 19, 0.3);
    }

    /* Section Title */
    .section-title {
        font-size: 2rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 2rem;
        position: relative;
        padding-bottom: 1rem;
    }

    .section-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 60px;
        height: 4px;
        background: linear-gradient(90deg, var(--primary), var(--secondary));
        border-radius: 2px;
    }

    /* Blog Grid */
    .blog-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }

    /* Sidebar */
    .blog-sidebar {
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

    /* Category List */
    .category-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .category-item {
        padding: 0.75rem 0;
        border-bottom: 1px solid #f3f4f6;
        transition: all 0.3s ease;
    }

    .category-item:last-child {
        border-bottom: none;
    }

    .category-item a {
        display: flex;
        justify-content: space-between;
        align-items: center;
        color: #4b5563;
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .category-item a:hover {
        color: var(--primary);
        padding-left: 8px;
    }

    .category-item.active a {
        color: var(--primary);
        font-weight: 600;
    }

    .category-count {
        background: #f3f4f6;
        color: #6b7280;
        padding: 0.25rem 0.75rem;
        border-radius: 12px;
        font-size: 0.875rem;
        font-weight: 600;
    }

    .category-item.active .category-count,
    .category-item:hover .category-count {
        background: var(--primary);
        color: var(--white);
    }

    /* Popular Posts */
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

    /* Pagination */
    .pagination {
        margin-top: 3rem;
        justify-content: center;
    }

    .pagination .page-link {
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        margin: 0 0.25rem;
        padding: 0.625rem 1.125rem;
        color: var(--primary);
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .pagination .page-link:hover {
        background: var(--primary);
        border-color: var(--primary);
        color: var(--white);
        transform: translateY(-2px);
    }

    .pagination .page-item.active .page-link {
        background: var(--primary);
        border-color: var(--primary);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 4rem 2rem;
        background: var(--gray-50);
        border-radius: 16px;
        margin: 3rem 0;
    }

    .empty-state i {
        font-size: 4rem;
        color: #d1d5db;
        margin-bottom: 1.5rem;
    }

    .empty-state h3 {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--gray-600);
        margin-bottom: 0.5rem;
    }

    .empty-state p {
        color: #9ca3af;
        font-size: 1rem;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .blog-hero {
            min-height: 400px;
            padding: 6rem 0 4rem;
        }

        .blog-hero h1 {
            font-size: 3rem;
        }

        .blog-hero p {
            font-size: 1.25rem;
        }

        .blog-sidebar {
            position: static;
            margin-top: 3rem;
        }

        .blog-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 767px) {
        .blog-hero {
            min-height: 350px;
            padding: 5rem 0 3rem;
        }

        .blog-hero h1 {
            font-size: 2.25rem;
        }

        .blog-hero p {
            font-size: 1.125rem;
        }

        .blog-search-bar {
            padding: 1.5rem;
            margin-top: -2rem;
        }

        .section-title {
            font-size: 1.5rem;
        }

        .scroll-indicator {
            display: none;
        }
    }
</style>
@endpush

@section('content')
@if($selectedCategory)
    <!-- Category Hero - With Category Image Background -->
    <section class="hero-section hero-reduced" style="background-image: url({{ $selectedCategory->image_url ? asset($selectedCategory->image_url) : asset('uploads/images/blog_image.jpg') }});">
        <div class="container">
            <div class="blog-hero-content">
                <div class="category-badge-hero" data-aos="fade-up" data-aos-duration="800">
                    <i class="fas fa-folder-open me-2"></i>
                    {{ __t('Danh Mục', 'Category') }}
                </div>
                <h1 class="hero-title" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                    {{ $selectedCategory->name }}
                </h1>
                @if($selectedCategory->description)
                    <p class="hero-subtitle" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                        {{ $selectedCategory->description }}
                    </p>
                @endif
                <div class="category-meta-hero" data-aos="fade-up" data-aos-delay="300">
                    <span>
                        <i class="fas fa-file-alt me-2"></i>
                        {{ $posts->total() }} {{ __t('bài viết', 'articles') }}
                    </span>
                </div>
            </div>
        </div>
    </section>
@else
    <!-- Blog Hero - With Image Background -->
    <section class="hero-section hero-reduced" style="background-image: url({{ asset('uploads/images/blog_image.jpg') }});">
        <div class="container">
            <div class="blog-hero-content">
                <h1 class="hero-title" data-aos="fade-up" data-aos-duration="1000">
                    {{ __t('Bài Viết', 'Blog') }}
                </h1>
                <p class="hero-subtitle" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    {{ __t('Khám phá các bài viết về đức tin, thần học và đời sống Cơ Đốc', 'Explore articles about faith, theology, and Christian living') }}
                </p>
            </div>
        </div>
    </section>
@endif

<!-- Search & Filter -->
<div class="container">
    <div class="blog-search-bar" data-aos="fade-up">
        <div class="row">
            <div class="col-md-8 mb-3 mb-md-0">
                <form action="{{ route('blog.index') }}" method="GET" class="mb-0">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="{{ __t('Tìm kiếm bài viết...', 'Search articles...') }}" value="{{ request('search') }}">
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-search me-2"></i>{{ __t('Tìm kiếm', 'Search') }}
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <select class="form-select" onchange="window.location.href='{{ route('blog.index') }}?category=' + this.value">
                    <option value="">{{ __t('Tất cả danh mục', 'All Categories') }}</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }} ({{ $cat->published_posts_count }})
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        {{-- Main Content --}}
        <div class="col-lg-8">
            {{-- Featured Posts --}}
            @if($featured_posts->isNotEmpty() && !request('search') && !request('category'))
                <div class="featured-section" data-aos="fade-up">
                    <span class="featured-badge">
                        <i class="fas fa-star me-2"></i>{{ __t('Nổi bật', 'Featured') }}
                    </span>
                    <div class="blog-grid">
                        @foreach($featured_posts as $post)
                            <x-blog-card :post="$post" featured />
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- All Posts --}}
            <div data-aos="fade-up" data-aos-delay="100">
                <h2 class="section-title">
                    @if(request('search'))
                        {{ __t('Kết quả tìm kiếm cho', 'Search Results for') }} "{{ request('search') }}"
                    @elseif(request('category'))
                        {{ $categories->firstWhere('id', request('category'))->name ?? __t('Danh mục', 'Category') }}
                    @else
                        {{ __t('Danh Sách Bài Viết', 'Latest Articles') }}
                    @endif
                </h2>

                @if($posts->count() > 0)
                    <div class="blog-grid">
                        @foreach($posts as $post)
                            <x-blog-card :post="$post" />
                        @endforeach
                    </div>

                    {{-- Pagination --}}
                    {{ $posts->links() }}
                @else
                    <div class="empty-state">
                        <i class="fas fa-inbox"></i>
                        <h3>{{ __t('Không tìm thấy bài viết', 'No Articles Found') }}</h3>
                        <p>{{ __t('Hãy thử từ khóa khác hoặc chọn danh mục khác', 'Try a different search or category') }}</p>
                    </div>
                @endif
            </div>
        </div>

        {{-- Sidebar --}}
        <div class="col-lg-4">
            <div class="blog-sidebar">
                <x-blog-sidebar :categories="$categories" :popular-posts="$popular_posts" />
            </div>
        </div>
    </div>
</div>
@endsection