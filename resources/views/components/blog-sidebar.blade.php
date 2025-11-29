@props(['categories' => null, 'popularPosts'])

<aside>
    {{-- Categories --}}
    @if($categories)
        <div class="sidebar-widget" data-aos="fade-up">
            <h3 class="sidebar-widget-title">
                <i class="fas fa-folder-open me-2"></i>{{ __t('Danh Mục', 'Categories') }}
            </h3>
            <ul class="category-list">
                <li class="category-item {{ !request('category') ? 'active' : '' }}">
                    <a href="{{ route('blog.index') }}">
                        <span>{{ __t('Tất cả bài viết', 'All Articles') }}</span>
                        <span class="category-count">{{ $categories->sum('published_posts_count') }}</span>
                    </a>
                </li>
                @foreach($categories as $category)
                    <li class="category-item {{ request('category') == $category->id ? 'active' : '' }}">
                        <a href="{{ route('blog.index', ['category' => $category->id]) }}">
                            <span>{{ $category->name }}</span>
                            <span class="category-count">{{ $category->published_posts_count }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Popular Posts --}}
    @if($popularPosts->isNotEmpty())
        <div class="sidebar-widget" data-aos="fade-up" data-aos-delay="100">
            <h3 class="sidebar-widget-title">
                <i class="fas fa-fire me-2"></i>{{ __t('Phổ Biến', 'Popular') }}
            </h3>
            @foreach($popularPosts as $index => $post)
                <div class="popular-post">
                    <div class="popular-post-number">{{ $index + 1 }}</div>
                    <div class="popular-post-content">
                        <h6>
                            <a href="{{ route('blog.show', $post->slug) }}">
                                {{ $post->title }}
                            </a>
                        </h6>
                        <div class="popular-post-meta">
                            <span><i class="fas fa-eye me-1"></i>{{ number_format($post->views_count) }}</span>
                            <span><i class="fas fa-calendar me-1"></i>{{ $post->formatted_date }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</aside>
