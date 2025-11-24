@extends('layouts.app')

@section('title', $category->name . ' - ' . config('app.name'))

@section('meta_description', $category->description)

@section('content')
<!-- HERO SECTION -->
<section class="hero-section hero-reduced" style="background-image: url('https://images.unsplash.com/photo-1519791883288-dc8bd696e667?w=1920&q=80');">
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <div style="margin-bottom: 1.5rem;" data-aos="fade-up" data-aos-duration="1000">
                    <span style="display: inline-flex; align-items: center; justify-content: center; width: 90px; height: 90px; border-radius: 50%; background: rgba(255, 255, 255, 0.15); backdrop-filter: blur(10px); border: 3px solid rgba(255, 255, 255, 0.3); color: white; font-size: 2.5rem; font-weight: 900; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3); font-family: var(--font-serif);">
                        {{ $category->order }}
                    </span>
                </div>
                <h1 class="hero-title" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                    {{ $category->name }}
                </h1>
                <p class="hero-subtitle" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                    {{ $category->description }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- BREADCRUMB -->
<x-breadcrumb :items="[
    ['url' => route('home'), 'label' => __t('Trang Chủ', 'Home')],
    ['url' => route('faith.index'), 'label' => __t('Tuyên Bố Đức Tin', 'Statement of Faith')],
    ['label' => $category->name]
]" />

<!-- STATEMENTS LIST -->
<section class="py-5">
    <div class="container">
        <!-- Section Header -->
        <div class="row text-center mb-5">
            <div class="col-lg-10 mx-auto">
                <h2 class="section-title" data-aos="fade-up">
                    {{ __t('Các Tuyên Bố', 'Statements') }}
                    <span style="background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); color: white; padding: 8px 20px; border-radius: var(--radius-full); font-size: 18px; font-weight: 600; margin-left: 1rem;">{{ $statements->count() }}</span>
                </h2>
            </div>
        </div>

        <!-- Statements List -->
        @forelse($statements as $statement)
        <div class="row mb-4" data-aos="fade-up" data-aos-delay="{{ 100 * $loop->iteration }}">
            <div class="col-12">
                <div class="statement-item" style="display: flex; gap: var(--spacing-md); align-items: flex-start;">
                    <div class="statement-number" style="flex-shrink: 0;">{{ $statement->order }}</div>
                    <div style="flex: 1;">
                        <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--primary); margin-bottom: 1rem; font-family: var(--font-serif);">
                            {{ $statement->title }}
                        </h3>
                        <p style="font-size: 1rem; line-height: 1.8; color: var(--text-secondary); margin-bottom: 1.5rem;">
                            {!! Str::limit(strip_tags($statement->content), 300) !!}
                        </p>

                        @if($statement->scripture_references && count($statement->scripture_references) > 0)
                        <div class="scripture-references" style="margin-bottom: 1.5rem;">
                            <i class="fas fa-book-bible"></i>
                            <div class="scripture-list" style="font-size: 13px; color: var(--text-secondary); font-style: italic;">
                                @foreach($statement->scripture_references as $reference)
                                    <span class="scripture-ref" style="margin-right: 8px;">{{ $reference }}</span>@if(!$loop->last),@endif
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <a href="{{ route('faith.show', [$category->slug, $statement->slug]) }}" class="btn btn-primary">
                            {{ __t('Đọc Đầy Đủ', 'Read Full') }} <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="row">
            <div class="col-12">
                <x-empty-state :message="__t('Chưa có tuyên bố nào trong danh mục này.', 'No statements in this category yet.')" />
            </div>
        </div>
        @endforelse

        <!-- BACK BUTTON -->
        <div class="row mt-5">
            <div class="col text-center" data-aos="fade-up">
                <a href="{{ route('faith.index') }}" class="btn btn-outline-primary btn-lg">
                    <i class="fas fa-arrow-left me-2"></i> {{ __t('Quay Lại Tất Cả Danh Mục', 'Back to All Categories') }}
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
