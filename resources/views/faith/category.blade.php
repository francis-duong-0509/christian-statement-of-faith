@extends('layouts.app')

@section('title', (app()->getLocale() == 'vi' ? $category->name_vi : $category->name_en) . ' - ' . config('app.name'))

@section('meta_description', app()->getLocale() == 'vi' ? $category->description_vi : $category->description_en)

@section('content')
<!-- PAGE HERO -->
<div class="page-hero">
    <div class="container">
        <div style="text-align: center; margin-bottom: 1.5rem;">
            <span style="display: inline-flex; align-items: center; justify-content: center; width: 80px; height: 80px; border-radius: 50%; background: linear-gradient(135deg, var(--accent) 0%, #f59e0b 100%); color: white; font-size: 2.5rem; font-weight: 900; box-shadow: 0 10px 30px rgba(212, 175, 55, 0.4); font-family: 'Playfair Display', serif;">
                {{ $category->order }}
            </span>
        </div>
        <h1>{{ app()->getLocale() == 'vi' ? $category->name_vi : $category->name_en }}</h1>
        <p>
            {{ app()->getLocale() == 'vi' ? $category->description_vi : $category->description_en }}
        </p>
    </div>
</div>

<!-- BREADCRUMB -->
<div class="container" style="margin-top: 1.5rem;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ app()->getLocale() == 'vi' ? 'Trang Chủ' : 'Home' }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('faith.index') }}">{{ app()->getLocale() == 'vi' ? 'Tuyên Bố Đức Tin' : 'Statement of Faith' }}</a></li>
            <li class="breadcrumb-item active">{{ app()->getLocale() == 'vi' ? $category->name_vi : $category->name_en }}</li>
        </ol>
    </nav>
</div>

<!-- STATEMENTS LIST -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">
                {{ app()->getLocale() == 'vi' ? 'Các Tuyên Bố' : 'Statements' }}
                <span class="badge badge-primary" style="margin-left: 0.75rem;">{{ $statements->count() }}</span>
            </h2>
        </div>

        @forelse($statements as $statement)
        <div class="statement-card" style="margin-bottom: 2rem;">
            <div class="statement-number">{{ $statement->order }}</div>
            <div class="flex-grow-1">
                <h3 style="font-size: 1.5rem; font-weight: 800; color: var(--text-primary); margin-bottom: 1rem;">
                    {{ app()->getLocale() == 'vi' ? $statement->title_vi : $statement->title_en }}
                </h3>
                <div style="font-size: 1.05rem; line-height: 1.7; color: var(--text-secondary); margin-bottom: 1.5rem;">
                    {!! Str::limit(strip_tags(app()->getLocale() == 'vi' ? $statement->content_vi : $statement->content_en), 300) !!}
                </div>

                @if($statement->scripture_references && count($statement->scripture_references) > 0)
                <div style="margin-bottom: 1.5rem;">
                    <div style="font-size: 0.875rem; font-weight: 600; color: var(--text-tertiary); margin-bottom: 0.5rem;">
                        {{ app()->getLocale() == 'vi' ? 'Tham khảo:' : 'References:' }}
                    </div>
                    <div>
                        @foreach($statement->scripture_references as $reference)
                        <span class="scripture-reference">{{ $reference }}</span>
                        @endforeach
                    </div>
                </div>
                @endif

                <a href="{{ route('faith.show', [
                        app()->getLocale() == 'vi' ? $category->slug_vi : $category->slug_en,
                        app()->getLocale() == 'vi' ? $statement->slug_vi : $statement->slug_en
                    ]) }}"
                   class="btn btn-primary">
                    {{ app()->getLocale() == 'vi' ? 'Đọc Đầy Đủ' : 'Read Full' }} →
                </a>
            </div>
        </div>
        @empty
        <div class="card" style="text-align: center; padding: 3rem 2rem; background: linear-gradient(135deg, #eff6ff 0%, #f5f3ff 100%);">
            <p style="margin: 0; color: var(--text-secondary); font-size: 1.1rem;">
                {{ app()->getLocale() == 'vi'
                    ? 'Chưa có tuyên bố nào trong danh mục này.'
                    : 'No statements in this category yet.' }}
            </p>
        </div>
        @endforelse

        <!-- BACK BUTTON -->
        <div style="margin-top: 3rem; text-align: center;">
            <a href="{{ route('faith.index') }}" class="btn btn-outline">
                ← {{ app()->getLocale() == 'vi' ? 'Quay Lại Tất Cả Danh Mục' : 'Back to All Categories' }}
            </a>
        </div>
    </div>
</section>
@endsection
