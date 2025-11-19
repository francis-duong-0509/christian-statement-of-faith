@extends('layouts.app')

@section('title', (app()->getLocale() == 'vi' ? 'Tuyên Bố Đức Tin' : 'Statement of Faith') . ' - ' . config('app.name'))

@section('meta_description', app()->getLocale() == 'vi'
    ? 'Khám phá các tuyên bố đức tin Cơ Đốc giáo về Ba Ngôi, Kinh Thánh, Sự Cứu Rỗi, Hội Thánh và Ngày Sau Rốt'
    : 'Explore Christian faith statements about the Trinity, Scripture, Salvation, Church and Last Things')

@section('content')
<!-- PAGE HERO -->
<div class="page-hero">
    <div class="container">
        <h1>{{ app()->getLocale() == 'vi' ? 'Tuyên Bố Đức Tin' : 'Statement of Faith' }}</h1>
        <p>
            {{ app()->getLocale() == 'vi'
                ? 'Những niềm tin cốt lõi của chúng tôi dựa trên Lời Chúa'
                : 'Our core beliefs based on the Word of God' }}
        </p>
    </div>
</div>

<!-- BREADCRUMB -->
<div class="container" style="margin-top: 1.5rem;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ app()->getLocale() == 'vi' ? 'Trang Chủ' : 'Home' }}</a></li>
            <li class="breadcrumb-item active">{{ app()->getLocale() == 'vi' ? 'Tuyên Bố Đức Tin' : 'Statement of Faith' }}</li>
        </ol>
    </nav>
</div>

<!-- CATEGORIES SECTION -->
<section class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">{{ app()->getLocale() == 'vi' ? 'Các Chủ Đề' : 'Topics' }}</h2>
            <p class="section-subtitle">
                {{ app()->getLocale() == 'vi'
                    ? 'Khám phá các khía cạnh khác nhau của đức tin Cơ Đốc'
                    : 'Explore different aspects of the Christian faith' }}
            </p>
        </div>

        <div class="grid grid-3">
            @forelse($categories as $category)
            <div class="card category-card">
                <div class="category-number">{{ $category->order }}</div>
                <div class="card-body">
                    <h3 class="category-title">
                        {{ app()->getLocale() == 'vi' ? $category->name_vi : $category->name_en }}
                    </h3>
                    <p class="category-description">
                        {{ app()->getLocale() == 'vi' ? $category->description_vi : $category->description_en }}
                    </p>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="{{ route('faith.category', app()->getLocale() == 'vi' ? $category->slug_vi : $category->slug_en) }}"
                           class="btn btn-primary">
                            {{ app()->getLocale() == 'vi' ? 'Xem Chi Tiết' : 'View Details' }}
                        </a>
                        <span class="badge badge-primary">
                            {{ $category->statements_count }} {{ app()->getLocale() == 'vi' ? 'bài' : 'items' }}
                        </span>
                    </div>
                </div>
            </div>
            @empty
            <div style="grid-column: 1 / -1;">
                <div class="card" style="text-align: center; padding: 3rem 2rem; background: linear-gradient(135deg, #eff6ff 0%, #f5f3ff 100%);">
                    <p style="margin: 0; color: var(--text-secondary); font-size: 1.1rem;">
                        {{ app()->getLocale() == 'vi'
                            ? 'Chưa có danh mục nào được công bố.'
                            : 'No categories have been published yet.' }}
                    </p>
                </div>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- INFO SECTION -->
<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card" style="text-align: center; padding: 3rem 2rem;">
                    <div style="width: 64px; height: 64px; border-radius: 50%; background: var(--primary); color: white; display: flex; align-items: center; justify-content: center; font-size: 2rem; margin: 0 auto 1.5rem;">
                        📖
                    </div>
                    <h3 style="font-size: 1.75rem; font-weight: 800; color: var(--text-primary); margin-bottom: 1rem;">
                        {{ app()->getLocale() == 'vi' ? 'Về Tuyên Bố Đức Tin Của Chúng Tôi' : 'About Our Statement of Faith' }}
                    </h3>
                    <p style="font-size: 1.1rem; line-height: 1.7; color: var(--text-secondary); margin: 0;">
                        {{ app()->getLocale() == 'vi'
                            ? 'Tuyên bố đức tin này tóm tắt những niềm tin cốt lõi của chúng tôi dựa trên Kinh Thánh Thánh. Chúng tôi tin rằng Kinh Thánh là Lời Chúa được thần cảm, hoàn toàn đáng tin cậy, và là thẩm quyền cuối cùng trong mọi vấn đề đức tin và đời sống.'
                            : 'This statement of faith summarizes our core beliefs based on Holy Scripture. We believe the Bible is the inspired Word of God, completely trustworthy, and the final authority in all matters of faith and practice.' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
