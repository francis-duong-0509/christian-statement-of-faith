@extends('layouts.app')

@section('title', $post->meta_title ?? $post->title)
@section('meta_description', $post->meta_description ?? $post->excerpt)

@push('meta')
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

@section('content')
<article class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            {{-- Breadcrumb --}}
            <nav aria-label="breadcrumb" class="mb-4">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __t('Trang chủ', 'Home') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('blog.index') }}">{{ __t('Bài viết', 'Blog') }}</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('blog.category', $post->category->slug) }}">{{ $post->category->name }}</a></li>
                    <li class="breadcrumb-item active">{{ $post->title }}</li>
                </ol>
            </nav>

            {{-- Post Header --}}
            <header class="mb-5">
                <h1 class="display-4 mb-3">{{ $post->title }}</h1>
                
                <div class="d-flex flex-wrap gap-3 align-items-center text-muted mb-4">
                    <span>
                        <i class="bi bi-calendar3"></i>
                        {{ $post->formatted_date }}
                    </span>
                    <span>
                        <i class="bi bi-clock"></i>
                        {{ $post->reading_time }}
                    </span>
                    <span>
                        <i class="bi bi-eye"></i>
                        {{ number_format($post->views_count) }} {{ __t('Lượt xem', 'views') }}
                    </span>
                    @if($post->author)
                        <span>
                            <i class="bi bi-person"></i>
                            {{ __t('Tác giả', 'By') }} {{ $post->author->name }}
                        </span>
                    @endif
                </div>

                <a href="{{ route('blog.category', $post->category->slug) }}" class="badge bg-primary text-decoration-none">
                    {{ $post->category->name }}
                </a>
            </header>

            {{-- Featured Image --}}
            @if($post->featured_image)
                <figure class="mb-5">
                    <img
                        src="{{ asset('storage/' . $post->featured_image) }}"
                        alt="{{ $post->title }}"
                        class="img-fluid rounded shadow" >
                </figure>
            @endif

            {{-- Post Content --}}
            <div class="post-content mb-5">
                {!! $post->content !!}
            </div>

            {{-- Social Sharing --}}
            <div class="border-top border-bottom py-4 mb-5">
                <h5 class="mb-3">{{ __t('Chia sẻ bài viết', 'Share this article:') }}</h5>
                <div class="d-flex gap-2">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $post->slug)) }}"
                        target="_blank"
                        class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-facebook"></i> Facebook
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $post->slug)) }}&text={{ urlencode($post->title) }}"
                        target="_blank"
                        class="btn btn-outline-info btn-sm">
                        <i class="bi bi-twitter"></i> Twitter
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('blog.show', $post->slug)) }}"
                        target="_blank"
                        class="btn btn-outline-primary btn-sm">
                        <i class="bi bi-linkedin"></i> LinkedIn
                    </a>
                </div>
            </div>

            {{-- Related Posts --}}
            @if($related_posts->isNotEmpty())
                <div class="mb-5">
                    <h3 class="h4 mb-4">{{ __t('Bài viết liên quan', 'Related Articles') }}</h3>
                    <div class="row">
                        @foreach($related_posts as $relatedPost)
                            <div class="col-md-4 mb-3">
                                <x-blog-card :post="$relatedPost" />
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>

        {{-- Sidebar --}}
        <div class="col-lg-4">
            <x-blog-sidebar :popular-posts="$popular_posts" />
        </div>
    </div>
</article>
@endsection