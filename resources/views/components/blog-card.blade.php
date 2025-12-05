@props(['post', 'featured' => false])

<article class="card h-100 shadow-sm hover-lift">
      {{-- Featured Image --}}
      @if($post->featured_image)
          <a href="{{ route('blog.show', $post->slug) }}">
            <img
              src="{{ asset($post->featured_image_url) }}"
              class="card-img-top"
              alt="{{ $post->title }}"
              style="height: {{ $featured ? '250px' : '200px' }}; object-fit: cover;" >
          </a>
      @else
          <div
              class="card-img-top bg-secondary d-flex align-items-center justify-content-center"
              style="height: {{ $featured ? '250px' : '200px' }};" >
              <i class="bi bi-image text-white" style="font-size: 3rem;"></i>
          </div>
      @endif

      <div class="card-body d-flex flex-column">
          {{-- Category Badge --}}
          <div class="mb-2">
              <a
                  href="{{ route('blog.index', ['category_id' => $post->category->id]) }}"
                  class="badge bg-primary text-decoration-none" >
                  {{ $post->category->name }}
              </a>

              @if($post->is_outstanding)
                  <span class="badge bg-warning text-dark">
                      <i class="bi bi-star-fill"></i> {{ __t('Nổi bật', 'Featured') }}
                  </span>
              @endif
          </div>

          {{-- Title --}}
          <h3 class="blog-title {{ $featured ? 'h4' : 'h5' }} mb-2" style="color: #2A5080">
              <a href="{{ route('blog.show', $post->slug) }}" class="text-decoration-none text-dark">
                  {{ $post->title }}
              </a>
          </h3>

          {{-- Excerpt --}}
          <p class="card-text text-muted flex-grow-1">
              {{ Str::limit($post->excerpt, 120) }}
          </p>

          {{-- Meta Info --}}
          <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
              <small class="text-muted">
                  <i class="bi bi-calendar3"></i>
                  {{ $post->formatted_date }}
              </small>
              <small class="text-muted">
                      <i class="bi bi-person"></i>
                      {{ __t('Tác giả: ', 'By') }} <span style="font-weight: bold; color: #2A5080">{{ $post->author->name }}</span>
                  </small>
          </div>

          {{-- Views Count --}}
          <div class="mt-2">
              <small class="text-muted">
                  <i class="bi bi-eye"></i>
                  {{ number_format($post->views_count) }} {{ __t('Lượt xem', 'views') }}
              </small>
          </div>
      </div>
  </article>

  <style>
  .hover-lift {
      transition: transform 0.3s ease, box-shadow 0.3s ease;
  }

  .hover-lift:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.15) !important;
  }
  </style>