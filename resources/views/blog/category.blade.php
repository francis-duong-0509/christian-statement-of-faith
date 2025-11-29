@extends('layouts.app')

@section('title', $category->name . ' - ' . __t('Bài Viết', 'Blog'))
@section('meta_description', $category->description)

@push('styles')
<style>
    /* Category Hero Section */
    .category-hero {
        position: relative;
        min-height: 400px;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 8rem 0 4rem;
        margin-bottom: 3rem;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        overflow: hidden;
    }

    .category-hero::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(135deg, rgba(30, 58, 95, 0.9) 0%, rgba(45, 90, 138, 0.85) 100%);
        z-index: 1;
    }

    .category-hero-content {
        position: relative;
        z-index: 2;
        color: #ffffff;
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .category-badge {
        display: inline-block;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        color: #ffffff;
        padding: 10px 20px;
        border-radius: 50px;
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 20px;
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    .category-hero h1 {
        font-size: 3.5rem;
        font-weight: 900;
        margin-bottom: 1.5rem;
        text-shadow: 0 4px 20px rgba(0,0,0,0.5);
        letter-spacing: -0.02em;
        font-family: 'Merriweather', serif;
    }

    .category-hero-description {
        font-size: 1.25rem;
        opacity: 0.95;
        line-height: 1.8;
        text-shadow: 0 2px 10px rgba(0,0,0,0.3);
        margin-bottom: 20px;
    }

    .category-meta {
        display: flex;
        gap: 30px;
        justify-content: center;
        align-items: center;
        margin-top: 30px;
    }

    .category-meta-item {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 16px;
        color: rgba(255, 255, 255, 0.9);
    }

    .category-meta-item i {
        font-size: 20px;
    }

    /* Posts Section */
    .category-posts-section {
        padding: 3rem 0;
    }

    /* Blog Post Card */
    .blog-post-card {
        background: #ffffff;
        border-radius: 16px;
        overflow: hidden;
        transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        height: 100%;
        display: flex;
        flex-direction: column;
    }

    .blog-post-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 40px rgba(30, 58, 95, 0.15);
    }

    .blog-post-image {
        position: relative;
        width: 100%;
        height: 220px;
        overflow: hidden;
    }

    .blog-post-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .blog-post-card:hover .blog-post-image img {
        transform: scale(1.1);
    }

    .post-category-badge {
        position: absolute;
        top: 15px;
        left: 15px;
        background: linear-gradient(135deg, #1e3a5f 0%, #2d5a8a 100%);
        color: #ffffff;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .blog-post-content {
        padding: 25px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .blog-post-meta {
        display: flex;
        gap: 20px;
        margin-bottom: 15px;
        font-size: 14px;
        color: #6c757d;
    }

    .blog-post-meta span {
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .blog-post-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1e3a5f;
        margin-bottom: 15px;
        line-height: 1.4;
        font-family: 'Merriweather', serif;
        transition: color 0.3s ease;
    }

    .blog-post-card:hover .blog-post-title {
        color: #0c63d4;
    }

    .blog-post-excerpt {
        font-size: 15px;
        line-height: 1.7;
        color: #555;
        margin-bottom: 20px;
        flex-grow: 1;
    }

    .blog-post-link {
        display: inline-flex;
        align-items: center;
        color: #1e3a5f;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s ease;
        margin-top: auto;
    }

    .blog-post-link:hover {
        color: #0c63d4;
        transform: translateX(5px);
    }

    .blog-post-link i {
        transition: transform 0.3s ease;
    }

    .blog-post-link:hover i {
        transform: translateX(5px);
    }

    /* Sidebar */
    .category-sidebar {
        position: sticky;
        top: 100px;
    }

    .sidebar-widget {
        background: #ffffff;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        margin-bottom: 30px;
    }

    .sidebar-widget-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1e3a5f;
        margin-bottom: 20px;
        font-family: 'Merriweather', serif;
    }

    .category-list {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .category-list-item {
        border-bottom: 1px solid #e9ecef;
        padding: 15px 0;
    }

    .category-list-item:last-child {
        border-bottom: none;
    }

    .category-list-link {
        display: flex;
        justify-content: space-between;
        align-items: center;
        text-decoration: none;
        color: #333;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .category-list-link:hover {
        color: #0c63d4;
        transform: translateX(5px);
    }

    .category-list-link.active {
        color: #0c63d4;
        font-weight: 700;
    }

    .category-post-count {
        background: #f8f9fa;
        color: #6c757d;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 80px 20px;
    }

    .empty-state-icon {
        font-size: 80px;
        color: #dee2e6;
        margin-bottom: 20px;
    }

    .empty-state-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: #6c757d;
        margin-bottom: 15px;
    }

    .empty-state-text {
        font-size: 1rem;
        color: #adb5bd;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .category-sidebar {
            position: relative;
            top: 0;
            margin-top: 40px;
        }
    }

    @media (max-width: 767px) {
        .category-hero h1 {
            font-size: 2.5rem;
        }

        .category-hero-description {
            font-size: 1rem;
        }

        .category-meta {
            flex-direction: column;
            gap: 15px;
        }

        .blog-post-title {
            font-size: 1.25rem;
        }
    }
</style>
@endpush

@section('content')
<!-- Category Hero Section -->
<section class="category-hero" style="background-image: url('{{ 
$category->image ?? asset('uploads/images/blog_hero_banner.jpg') }}');">
    <div class="category-hero-content">
        <div class="category-badge">
            <i class="fas fa-folder-open me-2"></i>
            {{ __t('Danh Mục', 'Category') }}
        </div>
        <h1>{{ $category->name }}</h1>
        <p class="category-hero-description">
            {{ $category->description }}
        </p>
        <div class="category-meta">
            <div class="category-meta-item">
                <i class="fas fa-file-alt"></i>
                <span>{{ $posts->count() }} {{ __t('bài viết', 'articles') }}</span>
            </div>
        </div>
    </div>
</section>

<!-- Posts Grid Section -->
<section class="category-posts-section">
    <div class="container">
        <div class="row">
            <!-- Main Content -->
            <div class="col-lg-8">
                @forelse($posts as $post)
                    <div class="mb-4" data-aos="fade-up">
                        <article class="blog-post-card">
                            @if($post->featured_image)
                                <div class="blog-post-image">
                                    <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" loading="lazy">
                                    @if($post->category)
                                        <span class="post-category-badge">{{ $post->category->name }}</span>
                                    @endif
                                </div>
                            @endif

                            <div class="blog-post-content">
                                <div class="blog-post-meta">
                                    <span>
                                        <i class="far fa-calendar"></i>
                                        {{ $post->formatted_date }}
                                    </span>
                                    <span>
                                        <i class="far fa-clock"></i>
                                        {{ $post->reading_time }}
                                    </span>
                                    @if($post->author)
                                        <span>
                                            <i class="far fa-user"></i>
                                            {{ $post->author->name }}
                                        </span>
                                    @endif
                                </div>

                                <h2 class="blog-post-title">{{ $post->title }}</h2>

                                <p class="blog-post-excerpt">
                                    {{ Str::limit($post->excerpt, 200) }}
                                </p>

                                <a href="{{ route('blog.show', $post->slug) }}" class="blog-post-link">
                                    <span>{{ __t('Đọc Thêm', 'Read More') }}</span>
                                    <i class="fas fa-arrow-right ms-2"></i>
                                </a>
                            </div>
                        </article>
                    </div>
                @empty
                    <div class="empty-state">
                        <div class="empty-state-icon">
                            <i class="fas fa-inbox"></i>
                        </div>
                        <h3 class="empty-state-title">
                            {{ __t('Chưa có bài viết', 'No Articles Yet') }}
                        </h3>
                        <p class="empty-state-text">
                            {{ __t('Danh mục này chưa có bài viết nào.', 'This category doesn\'t have any articles yet.') }}
                        </p>
                    </div>
                @endforelse
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <aside class="category-sidebar">
                    <!-- All Categories Widget -->
                    <div class="sidebar-widget">
                        <h3 class="sidebar-widget-title">
                            <i class="fas fa-folder me-2"></i>
                            {{ __t('Danh Mục Khác', 'Other Categories') }}
                        </h3>
                        <ul class="category-list">
                            @foreach($categories as $cat)
                                <li class="category-list-item">
                                    <a href="{{ route('blog.category', $cat->slug) }}" class="category-list-link {{ $cat->id === $category->id ? 'active' : '' }}">
                                        <span>{{ $cat->name }}</span>
                                        <span class="category-post-count">{{ $cat->published_posts_count }}</span>
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Back to All Posts -->
                    <div class="sidebar-widget text-center">
                        <a href="{{ route('blog.index') }}" class="btn btn-outline-primary btn-lg w-100">
                            <i class="fas fa-arrow-left me-2"></i>
                            {{ __t('Xem Tất Cả Bài Viết', 'View All Posts') }}
                        </a>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</section>
@endsection