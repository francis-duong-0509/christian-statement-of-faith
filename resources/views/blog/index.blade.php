@extends('layouts.app')

@section('title', __t('Bài Viết - Thần Học Cơ Đốc', 'Blog - Christian Statement of Faith'))
@section('meta_description', __t('Bài Viết - Thần Học Cơ Đốc', 'Explore articles about faith, theology, and Christian living.'))

@section('content')
<div class="container py-5">
    {{-- Page Header --}}
    <div class="row mb-5">
        <div class="col-12">
            <h1 class="display-4 mb-3">{{ __t('Bài Viết', 'Blog') }}</h1>
            <p class="lead text-muted">{{ __t('Khám phá các bài viết về đức tin, thần học và đời sống Cơ Đốc', 'Explore articles about faith, theology, and Christian living.') }}</p>
        </div>
    </div>

    {{-- Search & Filter Bar --}}
    <div class="row mb-4">
        <div class="col-md-8">
            <form action="{{ route('blog.index') }}" method="GET" class="mb-0">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="{{ __t('Tìm kiếm bài viết', 'Search articles...') }}" value="{{ request('search') }}">
                    <button class="btn btn-primary" type="submit">
                        <i class="bi bi-search"></i> {{ __t('Tìm kiếm', 'Search') }}
                    </button>
                </div>
            </form>
        </div>
        <div class="col-md-4">
            <select class="form-select" onchange="window.location.href='{{ route('blog.index') }}?category=' + this.value">
                <option value="">{{ __t('Tất cả danh mục', 'All Categories') }}</option>
                @foreach($data['categories'] as $cat)
                    <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }} ({{ $cat->published_posts_count }})
                    </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="row">
        {{-- Main Content --}}
        <div class="col-lg-8">
            {{-- Featured Posts --}}
            @if($data['featured_posts']->isNotEmpty() && !request('search') && !request('category'))
                <div class="mb-5">
                    <h2 class="h4 mb-4">{{ __t('Bài viết nổi bật', 'Featured Articles') }}</h2>
                    <div class="row">
                        @foreach($data['featured_posts'] as $post)
                            <div class="col-md-6 mb-4">
                                <x-blog-card :post="$post" featured />
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            {{-- All Posts --}}
            <div class="mb-4">
                <h2 class="h4 mb-4">
                    @if(request('search'))
                        {{ __t('Kết quả tìm kiếm cho', 'Search Results for') }} "{{ request('search') }}"
                    @elseif(request('category'))
                        {{ $data['categories']->firstWhere('id', request('category'))->name ?? 'Category' }}
                    @else
                        {{ __t('Bài viết mới nhất', 'Latest Articles') }}
                    @endif
                </h2>
            </div>

            @if($data['posts']->count() > 0)
                <div class="row">
                    @foreach($data['posts'] as $post)
                        <div class="col-md-6 mb-4">
                            <x-blog-card :post="$post" />
                        </div>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-4">
                    {{ $data['posts']->links() }}
                </div>
            @else
                <div class="alert alert-info">
                    {{ __t('Không tìm thấy bài viết', 'No articles found. Try a different search or category.') }}
                </div>
            @endif
        </div>

        {{-- Sidebar --}}
        <div class="col-lg-4">
            <x-blog-sidebar :categories="$data['categories']" :popular-posts="$data['popular_posts']" />
        </div>
    </div>
</div>
@endsection