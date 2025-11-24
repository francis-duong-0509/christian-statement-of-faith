<div class="statement-item" style="cursor: pointer;" onclick="window.location.href='{{ route('faith.category', $category->slug) }}'">
    <div class="statement-number">{{ $category->order }}</div>
    <h3 class="statement-title" style="margin-bottom: var(--spacing-sm);">
        <span style="color: var(--primary); font-size: 20px; font-family: var(--font-serif);">{{ $category->name }}</span>
    </h3>
    <p class="statement-description" style="margin-bottom: var(--spacing-md);">
        {{ $category->description }}
    </p>

    <div class="scripture-references" style="display: flex; align-items: center; justify-content: space-between;">
        <a href="{{ route('faith.category', $category->slug) }}" class="btn btn-primary" style="font-size: 14px; padding: 8px 20px;" onclick="event.stopPropagation();">
            {{ __t('Xem Chi Tiết', 'View Details') }} <i class="fas fa-arrow-right ms-1"></i>
        </a>
        <span style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); color: white; padding: 6px 16px; border-radius: var(--radius-full); font-size: 12px; font-weight: 600;">
            {{ $category->statements_count }} {{ __t('bài', 'items') }}
        </span>
    </div>
</div>
