@props(['categories' => null, 'popularPosts'])

<aside>
    {{-- Categories --}}
    @if($categories)
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">{{ __t('Danh mục', 'Categories') }}</h5>
            </div>
            <div class="list-group list-group-flush">
                <a href="{{ route('blog.index') }}" class="list-group-item list-group-item-action {{ !request('category') ? 'active' : '' }}">
                    {{ __t('Tất cả', 'All') }}
                </a>
                @foreach($categories as $category)
                    <a href="{{ route('blog.index', ['category' => $category->id]) }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ request('category') == $category->id ? 'active' : '' }}">
                        {{ $category->name }}
                        <span class="badge bg-secondary rounded-pill">
                            {{ $category->published_posts_count }}
                        </span>
                    </a>
                @endforeach
            </div>
        </div>
    @endif

    {{-- Popular Posts --}}
    @if($popularPosts->isNotEmpty())
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">{{ __t('Bài viết phổ biến', 'Popular Articles') }}</h5>
            </div>
            <div class="card-body">
                @foreach($popularPosts as $post)
                    <div class="mb-3 {{ !$loop->last ? 'pb-3 border-bottom' : '' }}">
                        <h6>
                            <a href="{{ route('blog.show', $post->slug) }}" class="text-decoration-none">
                                {{ $post->title }}
                            </a>
                        </h6>
                        <small class="text-muted d-block">
                            <i class="bi bi-eye"></i> {{ number_format($post->views_count) }} {{ __t('Lượt xem', 'views') }}
                        </small>
                        <small class="text-muted">
                            <i class="bi bi-calendar3"></i> {{ $post->formatted_date }}
                        </small>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</aside>