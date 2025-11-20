@extends('layouts.app')

@section('title', __t('Tuyên Bố Đức Tin', 'Statement of Faith') . ' - ' . config('app.name'))

@section('meta_description', __t('Khám phá những chân lý thiêng liêng về đức tin Cơ Đốc dựa trên Kinh Thánh', 'Explore the sacred truths about Christian faith based on Scripture'))

@push('head')
@if($categories->count() > 0)
<!-- JSON-LD Structured Data for SEO -->
<script type="application/ld+json">
{
    "@@context": "https://schema.org",
    "@@type": "ItemList",
    "name": "{{ __t('Tuyên Bố Đức Tin', 'Statement of Faith') }}",
    "description": "{{ __t('Những chân lý thiêng liêng về đức tin Cơ Đốc được xây dựng trên nền tảng Kinh Thánh', 'Sacred truths about Christian faith built on the foundation of Scripture') }}",
    "url": "{{ route('faith.index') }}",
    "numberOfItems": {{ $categories->sum('statements_count') }},
    "itemListElement": [
@php
$position = 1;
$items = [];
foreach($categories as $category) {
    foreach($category->statements as $statement) {
        $item = [
            '@@type' => 'ListItem',
            'position' => $position++,
            'item' => [
                '@@type' => 'Article',
                '@@id' => route('faith.show', [$category->slug, $statement->slug]),
                'name' => $statement->title,
                'description' => strip_tags(Str::limit($statement->content, 150)),
                'url' => route('faith.show', [$category->slug, $statement->slug]),
                'inLanguage' => app()->getLocale(),
                'isPartOf' => [
                    '@@type' => 'CreativeWork',
                    'name' => $category->name
                ]
            ]
        ];
        if ($statement->scripture_references && count($statement->scripture_references) > 0) {
            $item['item']['citation'] = $statement->scripture_references;
        }
        $items[] = json_encode($item, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }
}
if (!empty($items)) {
    echo implode(",\n", $items);
}
@endphp
    ]
}
</script>
@endif

<!-- Open Graph Tags -->
<meta property="og:title" content="{{ __t('Tuyên Bố Đức Tin', 'Statement of Faith') }} - {{ config('app.name') }}">
<meta property="og:description" content="{{ __t('Khám phá những chân lý thiêng liêng về đức tin Cơ Đốc dựa trên Kinh Thánh', 'Explore the sacred truths about Christian faith based on Scripture') }}">
<meta property="og:url" content="{{ route('faith.index') }}">
<meta property="og:type" content="website">
<meta property="og:locale" content="{{ app()->getLocale() === 'vi' ? 'vi_VN' : 'en_US' }}">

<!-- Twitter Card Tags -->
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="{{ __t('Tuyên Bố Đức Tin', 'Statement of Faith') }} - {{ config('app.name') }}">
<meta name="twitter:description" content="{{ __t('Khám phá những chân lý thiêng liêng về đức tin Cơ Đốc dựa trên Kinh Thánh', 'Explore the sacred truths about Christian faith based on Scripture') }}">
@endpush

@section('content')

<!-- BREADCRUMB -->
<x-breadcrumb :items="[
    ['url' => route('home'), 'label' => __t('Trang Chủ', 'Home')],
    ['label' => __t('Tuyên Bố Đức Tin', 'Statement of Faith')]
]" />

<!-- PAGE HEADER -->
<section class="py-5" style="background: linear-gradient(135deg, #f8fafc 0%, #eff6ff 100%); border-bottom: 1px solid var(--gray-200);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center" data-aos="fade-up">
                <div style="display: inline-flex; align-items: center; gap: 8px; background: white; padding: 8px 20px; border-radius: 50px; margin-bottom: 1.5rem; box-shadow: 0 2px 8px rgba(0,0,0,0.08); border: 1px solid var(--gray-200);">
                    <i class="fas fa-cross" style="color: var(--accent); font-size: 14px;"></i>
                    <span style="font-size: 14px; font-weight: 600; color: var(--primary);">{{ __t('Nền Tảng Đức Tin', 'Foundation of Faith') }}</span>
                </div>
                <h1 style="font-size: 3rem; font-weight: 800; color: var(--primary); margin-bottom: 1.5rem; font-family: var(--font-serif); line-height: 1.2;">
                    {{ __t('Tuyên Bố Đức Tin', 'Statement of Faith') }}
                </h1>
                <p style="font-size: 1.2rem; line-height: 1.8; color: var(--text-secondary); max-width: 700px; margin: 0 auto;">
                    {{ __t('Những chân lý thiêng liêng về đức tin Cơ Đốc được xây dựng trên nền tảng Kinh Thánh', 'Sacred truths about Christian faith built on the foundation of Scripture') }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- SEARCH & FILTER BAR -->
<section class="py-4" style="background: white; border-bottom: 1px solid var(--gray-200); position: sticky; top: 0; z-index: 999;" x-data="faithFilter">
    <div class="container">
        <div class="row align-items-center g-3">
            <!-- Search Box -->
            <div class="col-lg-6 col-md-12">
                <div class="position-relative">
                    <i class="fas fa-search position-absolute" style="left: 16px; top: 50%; transform: translateY(-50%); color: var(--gray-400); font-size: 14px;"></i>
                    <input
                        type="text"
                        class="form-control"
                        x-model="searchQuery"
                        @input.debounce.300ms="filterStatements"
                        :placeholder="'{{ __t('Tìm kiếm tuyên bố đức tin...', 'Search faith statements...') }}'"
                        style="padding-left: 45px; padding-right: 45px; border-radius: 50px; border: 2px solid var(--gray-200); font-size: 0.95rem;"
                        aria-label="{{ __t('Tìm kiếm tuyên bố', 'Search statements') }}"
                    >
                    <button
                        type="button"
                        class="btn btn-link position-absolute"
                        style="right: 8px; top: 50%; transform: translateY(-50%); padding: 4px 8px; text-decoration: none;"
                        x-show="searchQuery.length > 0"
                        @click="clearSearch"
                        aria-label="{{ __t('Xóa tìm kiếm', 'Clear search') }}"
                    >
                        <i class="fas fa-times" style="color: var(--gray-500);"></i>
                    </button>
                </div>
            </div>

            <!-- Category Filter Chips -->
            <div class="col-lg-6 col-md-12">
                <div class="d-flex align-items-center gap-2" style="overflow-x: auto; -webkit-overflow-scrolling: touch; scrollbar-width: none;">
                    <button
                        type="button"
                        class="btn btn-sm flex-shrink-0"
                        :class="selectedCategory === null ? 'btn-primary' : 'btn-outline-secondary'"
                        @click="selectCategory(null)"
                        style="border-radius: 50px; font-weight: 600; font-size: 0.85rem; padding: 8px 20px; white-space: nowrap;"
                    >
                        <i class="fas fa-layer-group me-1" style="font-size: 12px;"></i>
                        {{ __t('Tất cả', 'All') }}
                        <span class="badge" :class="selectedCategory === null ? 'bg-white text-primary' : 'bg-secondary'" style="margin-left: 6px;">{{ $categories->sum('statements_count') }}</span>
                    </button>
                    @foreach($categories as $cat)
                    <button
                        type="button"
                        class="btn btn-sm flex-shrink-0"
                        :class="selectedCategory === {{ $cat->id }} ? 'btn-primary' : 'btn-outline-secondary'"
                        @click="selectCategory({{ $cat->id }})"
                        style="border-radius: 50px; font-weight: 600; font-size: 0.85rem; padding: 8px 20px; white-space: nowrap;"
                        data-category-id="{{ $cat->id }}"
                    >
                        {{ $cat->name }}
                        <span class="badge" :class="selectedCategory === {{ $cat->id }} ? 'bg-white text-primary' : 'bg-secondary'" style="margin-left: 6px;">{{ $cat->statements_count }}</span>
                    </button>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Results Counter -->
        <div class="row mt-3" x-show="searchQuery.length > 0 || selectedCategory !== null">
            <div class="col-12">
                <p class="text-secondary mb-0" style="font-size: 0.9rem;">
                    <i class="fas fa-filter me-2" style="color: var(--accent);"></i>
                    <span x-text="getResultText()"></span>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- MAIN CONTENT - ALL CATEGORIES & STATEMENTS -->
<section class="py-5">
    <div class="container">
        @forelse($categories as $index => $category)
        <!-- CATEGORY SECTION -->
        <div class="category-section" id="category-{{ $category->slug }}" style="margin-bottom: 5rem;" data-aos="fade-up" data-category-id="{{ $category->id }}">

            <!-- Category Header -->
            <div class="row mb-4">
                <div class="col-12">
                    <div style="display: flex; align-items: center; gap: 1.5rem; padding: 2rem; background: linear-gradient(135deg, #eff6ff 0%, #f5f3ff 100%); border-radius: 20px; border: 1px solid var(--gray-200); box-shadow: 0 4px 15px rgba(0,0,0,0.05);">
                        <!-- Category Number Badge -->
                        <div style="width: 70px; height: 70px; border-radius: 50%; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); color: white; display: flex; align-items: center; justify-content: center; font-size: 2rem; font-weight: 900; font-family: var(--font-serif); box-shadow: 0 8px 24px rgba(30, 58, 95, 0.25); flex-shrink: 0;">
                            {{ $category->order }}
                        </div>

                        <!-- Category Info -->
                        <div style="flex: 1;">
                            <h2 style="font-size: 2rem; font-weight: 800; color: var(--primary); margin-bottom: 0.5rem; font-family: var(--font-serif);">
                                {{ $category->name }}
                            </h2>
                            <p style="font-size: 1.1rem; color: var(--text-secondary); margin-bottom: 0.75rem; line-height: 1.6;">
                                {{ $category->description }}
                            </p>
                            <div style="display: flex; align-items: center; gap: 8px; font-size: 0.95rem; color: var(--text-secondary);">
                                <i class="fas fa-file-lines" style="color: var(--accent);"></i>
                                <span style="font-weight: 600;">{{ $category->statements_count }}</span>
                                <span>{{ __t('tuyên bố', 'statements') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Statements List -->
            @if($category->statements->count() > 0)
            <div class="row g-4">
                @foreach($category->statements as $statement)
                <div class="col-12 statement-item"
                     data-aos="fade-up"
                     data-aos-delay="{{ 100 * $loop->iteration }}"
                     data-statement-id="{{ $statement->id }}"
                     data-category-id="{{ $category->id }}"
                     data-search-text="{{ strtolower($statement->title . ' ' . strip_tags($statement->content)) }}">
                    <div class="statement-card"
                         style="background: white; border-radius: 16px; padding: 2rem; border: 1px solid var(--gray-200); box-shadow: 0 2px 12px rgba(0,0,0,0.05); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);"
                         onmouseover="this.style.boxShadow='0 8px 30px rgba(30, 58, 95, 0.12)'; this.style.transform='translateY(-4px)'; this.style.borderColor='var(--primary)';"
                         onmouseout="this.style.boxShadow='0 2px 12px rgba(0,0,0,0.05)'; this.style.transform='translateY(0)'; this.style.borderColor='var(--gray-200)';">

                        <!-- Statement Header -->
                        <div style="display: flex; align-items: start; gap: 1.5rem; margin-bottom: 1.5rem;">
                            <!-- Statement Number -->
                            <div style="width: 48px; height: 48px; border-radius: 12px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); color: white; display: flex; align-items: center; justify-content: center; font-size: 1.25rem; font-weight: 700; font-family: var(--font-serif); flex-shrink: 0; box-shadow: 0 4px 12px rgba(30, 58, 95, 0.2);">
                                {{ $category->order }}.{{ $statement->order }}
                            </div>

                            <!-- Statement Title -->
                            <div style="flex: 1;">
                                <h3 style="font-size: 1.5rem; font-weight: 700; color: var(--primary); margin-bottom: 0; font-family: var(--font-serif); line-height: 1.3;">
                                    {{ $statement->title }}
                                </h3>
                            </div>
                        </div>

                        <!-- Statement Content (Collapsible) -->
                        <div x-data="{ expanded: false }">
                            <div class="statement-content"
                                 :class="!expanded && 'statement-collapsed'"
                                 style="font-size: 1.05rem; line-height: 1.8; color: var(--text-secondary); margin-bottom: 1.5rem; position: relative; transition: max-height 0.3s ease;">
                                {!! $statement->content !!}
                            </div>

                            <!-- Read More / Read Less Button -->
                            <button
                                type="button"
                                class="btn btn-link text-primary p-0 mb-3"
                                @click="expanded = !expanded"
                                style="font-weight: 600; text-decoration: none; font-size: 0.95rem;"
                            >
                                <span x-show="!expanded">
                                    <i class="fas fa-chevron-down me-1"></i>
                                    {{ __t('Đọc thêm', 'Read more') }}
                                </span>
                                <span x-show="expanded" style="display: none;">
                                    <i class="fas fa-chevron-up me-1"></i>
                                    {{ __t('Thu gọn', 'Read less') }}
                                </span>
                            </button>
                        </div>

                        <!-- Scripture References -->
                        @if($statement->scripture_references && count($statement->scripture_references) > 0)
                        <div style="padding-top: 1.5rem; border-top: 2px solid var(--gray-100);">
                            <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 1rem;">
                                <i class="fas fa-book-bible" style="color: var(--accent); font-size: 1.1rem;"></i>
                                <h4 style="font-size: 0.9rem; font-weight: 700; color: var(--primary); margin: 0; text-transform: uppercase; letter-spacing: 0.05em;">
                                    {{ __t('Các Câu Kinh Thánh Tham Khảo', 'Scripture References') }}
                                </h4>
                            </div>
                            <div style="display: flex; flex-wrap: wrap; gap: 8px;">
                                @foreach($statement->scripture_references as $reference)
                                <span style="background: linear-gradient(135deg, #eff6ff 0%, #f0f9ff 100%); padding: 6px 14px; border-radius: 8px; font-weight: 600; font-size: 0.9rem; color: var(--primary); border: 1px solid var(--gray-200); transition: all 0.2s;" onmouseover="this.style.background='linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%)'; this.style.color='white'; this.style.borderColor='var(--primary)';" onmouseout="this.style.background='linear-gradient(135deg, #eff6ff 0%, #f0f9ff 100%)'; this.style.color='var(--primary)'; this.style.borderColor='var(--gray-200)';">
                                    {{ $reference }}
                                </span>
                                @endforeach
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="row">
                <div class="col-12">
                    <div style="background: white; border-radius: 16px; padding: 3rem; text-align: center; border: 1px solid var(--gray-200);">
                        <i class="fas fa-inbox" style="font-size: 3rem; color: var(--gray-300); margin-bottom: 1rem;"></i>
                        <p style="color: var(--text-secondary); margin: 0;">
                            {{ __t('Chưa có tuyên bố nào trong danh mục này.', 'No statements in this category yet.') }}
                        </p>
                    </div>
                </div>
            </div>
            @endif

            <!-- Category Divider (not for last item) -->
            @if(!$loop->last)
            <div style="margin-top: 4rem; margin-bottom: 1rem;">
                <div style="height: 2px; background: linear-gradient(90deg, transparent 0%, var(--gray-200) 50%, transparent 100%);"></div>
            </div>
            @endif
        </div>
        @empty
        <!-- Empty State -->
        <div class="row">
            <div class="col-12">
                <div style="background: white; border-radius: 20px; padding: 5rem 3rem; text-align: center; border: 1px solid var(--gray-200); box-shadow: 0 4px 20px rgba(0,0,0,0.05);" data-aos="fade-up">
                    <i class="fas fa-cross" style="font-size: 4rem; color: var(--gray-300); margin-bottom: 2rem;"></i>
                    <h3 style="font-size: 1.75rem; font-weight: 700; color: var(--primary); margin-bottom: 1rem; font-family: var(--font-serif);">
                        {{ __t('Chưa Có Nội Dung', 'No Content Yet') }}
                    </h3>
                    <p style="font-size: 1.1rem; color: var(--text-secondary); max-width: 500px; margin: 0 auto 2rem;">
                        {{ __t('Các tuyên bố đức tin đang được cập nhật. Vui lòng quay lại sau.', 'Statements of faith are being updated. Please check back later.') }}
                    </p>
                    <a href="{{ route('home') }}" class="btn btn-primary btn-lg">
                        <i class="fas fa-home me-2"></i>
                        {{ __t('Về Trang Chủ', 'Back to Home') }}
                    </a>
                </div>
            </div>
        </div>
        @endforelse
    </div>
</section>

<!-- QUICK NAVIGATION (Floating TOC for Categories) -->
@if($categories->count() > 0)
<div class="faith-toc" style="position: fixed; bottom: 30px; right: 30px; z-index: 1000; display: none;" id="faithTOC">
    <button type="button" style="width: 56px; height: 56px; border-radius: 50%; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); color: white; border: none; box-shadow: 0 8px 24px rgba(30, 58, 95, 0.3); cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 1.5rem; transition: all 0.3s;" onclick="toggleTOC()" id="tocButton">
        <i class="fas fa-list"></i>
    </button>

    <div class="toc-menu" id="tocMenu" style="position: absolute; bottom: 70px; right: 0; background: white; border-radius: 16px; padding: 1rem; box-shadow: 0 10px 40px rgba(0,0,0,0.15); min-width: 280px; max-height: 400px; overflow-y: auto; display: none; border: 1px solid var(--gray-200);">
        <div style="padding-bottom: 0.75rem; margin-bottom: 0.75rem; border-bottom: 2px solid var(--gray-100);">
            <h5 style="font-size: 0.9rem; font-weight: 700; color: var(--primary); margin: 0; text-transform: uppercase; letter-spacing: 0.05em;">
                {{ __t('Danh Mục', 'Categories') }}
            </h5>
        </div>
        @foreach($categories as $cat)
        <a href="#category-{{ $cat->slug }}" style="display: flex; align-items: center; gap: 12px; padding: 10px 12px; border-radius: 10px; text-decoration: none; transition: all 0.2s; margin-bottom: 6px;" onmouseover="this.style.background='linear-gradient(135deg, #eff6ff 0%, #f0f9ff 100%)';" onmouseout="this.style.background='transparent';" onclick="closeTOC()">
            <div style="width: 32px; height: 32px; border-radius: 8px; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); color: white; display: flex; align-items: center; justify-content: center; font-size: 0.9rem; font-weight: 700; font-family: var(--font-serif); flex-shrink: 0;">
                {{ $cat->order }}
            </div>
            <div style="flex: 1; min-width: 0;">
                <div style="font-size: 0.95rem; font-weight: 600; color: var(--primary); white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                    {{ $cat->name }}
                </div>
                <div style="font-size: 0.75rem; color: var(--text-secondary);">
                    {{ $cat->statements_count }} {{ __t('tuyên bố', 'statements') }}
                </div>
            </div>
        </a>
        @endforeach
    </div>
</div>
@endif

@endsection

@push('styles')
<style>
/* Collapsible Statement Content */
.statement-collapsed {
    max-height: 150px;
    overflow: hidden;
    position: relative;
}

.statement-collapsed::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    height: 80px;
    background: linear-gradient(to bottom, transparent, white);
    pointer-events: none;
}

/* Statement Content Styling */
.statement-content h1,
.statement-content h2,
.statement-content h3,
.statement-content h4,
.statement-content h5,
.statement-content h6 {
    color: var(--text-primary);
    font-weight: 700;
    margin-top: 1.5rem;
    margin-bottom: 1rem;
    font-family: var(--font-serif);
}

.statement-content h2 { font-size: 1.5rem; }
.statement-content h3 { font-size: 1.25rem; }
.statement-content h4 { font-size: 1.1rem; }

.statement-content p {
    margin-bottom: 1rem;
}

.statement-content ul,
.statement-content ol {
    margin-bottom: 1rem;
    padding-left: 1.5rem;
}

.statement-content li {
    margin-bottom: 0.5rem;
}

.statement-content strong {
    color: var(--text-primary);
    font-weight: 700;
}

.statement-content a {
    color: var(--primary);
    text-decoration: underline;
}

.statement-content a:hover {
    color: var(--accent);
}

.statement-content blockquote {
    border-left: 4px solid var(--accent);
    padding-left: 1.5rem;
    margin: 1.5rem 0;
    font-style: italic;
    color: var(--text-secondary);
    background: linear-gradient(135deg, #f8fafc 0%, #f0f9ff 100%);
    padding: 1.25rem 1.5rem;
    border-radius: 8px;
}

/* TOC Scrollbar */
.toc-menu::-webkit-scrollbar {
    width: 6px;
}

.toc-menu::-webkit-scrollbar-track {
    background: var(--gray-100);
    border-radius: 10px;
}

.toc-menu::-webkit-scrollbar-thumb {
    background: var(--primary);
    border-radius: 10px;
}

.toc-menu::-webkit-scrollbar-thumb:hover {
    background: var(--primary-dark);
}

/* Search Bar Animations */
.form-control:focus {
    border-color: var(--primary) !important;
    box-shadow: 0 0 0 0.2rem rgba(30, 58, 95, 0.15) !important;
}

/* Category Filter Chips Scroll */
.d-flex.gap-2::-webkit-scrollbar {
    height: 6px;
}

.d-flex.gap-2::-webkit-scrollbar-track {
    background: var(--gray-100);
    border-radius: 10px;
}

.d-flex.gap-2::-webkit-scrollbar-thumb {
    background: var(--primary);
    border-radius: 10px;
}

/* Smooth Scroll */
html {
    scroll-behavior: smooth;
}

/* Show TOC on scroll */
@media (min-width: 992px) {
    .faith-toc {
        display: block !important;
    }
}

@media (max-width: 991px) {
    .faith-toc {
        bottom: 20px;
        right: 20px;
    }

    .toc-menu {
        right: 0;
        left: auto;
        min-width: 260px;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Alpine.js Faith Filter Component
document.addEventListener('alpine:init', () => {
    Alpine.data('faithFilter', () => ({
        searchQuery: '',
        selectedCategory: null,
        visibleStatements: [],
        totalStatements: 0,

        init() {
            // Count total statements
            this.totalStatements = document.querySelectorAll('.statement-item').length;
            this.updateVisibility();
        },

        filterStatements() {
            this.updateVisibility();
        },

        selectCategory(categoryId) {
            this.selectedCategory = categoryId;
            this.updateVisibility();

            // Scroll to category if specific category selected
            if (categoryId !== null) {
                const categoryEl = document.querySelector(`[data-category-id="${categoryId}"].category-section`);
                if (categoryEl) {
                    setTimeout(() => {
                        const offset = 150; // Account for sticky header
                        const elementPosition = categoryEl.getBoundingClientRect().top;
                        const offsetPosition = elementPosition + window.pageYOffset - offset;
                        window.scrollTo({ top: offsetPosition, behavior: 'smooth' });
                    }, 100);
                }
            }
        },

        clearSearch() {
            this.searchQuery = '';
            this.updateVisibility();
        },

        updateVisibility() {
            const searchLower = this.searchQuery.toLowerCase();
            this.visibleStatements = [];

            // Update statement visibility
            document.querySelectorAll('.statement-item').forEach(item => {
                const statementId = item.dataset.statementId;
                const categoryId = parseInt(item.dataset.categoryId);
                const searchText = item.dataset.searchText || '';

                let visible = true;

                // Filter by category
                if (this.selectedCategory !== null && categoryId !== this.selectedCategory) {
                    visible = false;
                }

                // Filter by search
                if (searchLower && !searchText.includes(searchLower)) {
                    visible = false;
                }

                // Apply visibility
                if (visible) {
                    this.visibleStatements.push(statementId);
                    item.style.display = '';
                } else {
                    item.style.display = 'none';
                }
            });

            // Update category visibility
            document.querySelectorAll('.category-section').forEach(categoryEl => {
                const categoryId = parseInt(categoryEl.dataset.categoryId);
                const categoryVisible = this.isCategoryVisible(categoryId);
                categoryEl.style.display = categoryVisible ? '' : 'none';
            });
        },

        isCategoryVisible(categoryId) {
            if (this.selectedCategory !== null) {
                return categoryId === this.selectedCategory;
            }

            // Check if category has any visible statements
            if (this.searchQuery) {
                return this.visibleStatements.some(id => {
                    const item = document.querySelector(`.statement-item[data-statement-id="${id}"]`);
                    return item && parseInt(item.dataset.categoryId) === categoryId;
                });
            }

            return true;
        },

        getResultText() {
            const count = this.visibleStatements.length;
            const locale = '{{ app()->getLocale() }}';

            if (locale === 'vi') {
                if (this.selectedCategory !== null && this.searchQuery) {
                    return `Hiển thị ${count} tuyên bố phù hợp với bộ lọc và tìm kiếm`;
                } else if (this.selectedCategory !== null) {
                    return `Hiển thị ${count} tuyên bố trong danh mục này`;
                } else if (this.searchQuery) {
                    return `Tìm thấy ${count} tuyên bố cho "${this.searchQuery}"`;
                }
            } else {
                if (this.selectedCategory !== null && this.searchQuery) {
                    return `Showing ${count} statements matching filters and search`;
                } else if (this.selectedCategory !== null) {
                    return `Showing ${count} statements in this category`;
                } else if (this.searchQuery) {
                    return `Found ${count} statements for "${this.searchQuery}"`;
                }
            }

            return '';
        }
    }));
});

// TOC Toggle
function toggleTOC() {
    const menu = document.getElementById('tocMenu');
    const button = document.getElementById('tocButton');
    const icon = button.querySelector('i');

    if (menu.style.display === 'none' || menu.style.display === '') {
        menu.style.display = 'block';
        icon.className = 'fas fa-times';
    } else {
        menu.style.display = 'none';
        icon.className = 'fas fa-list';
    }
}

function closeTOC() {
    const menu = document.getElementById('tocMenu');
    const button = document.getElementById('tocButton');
    const icon = button.querySelector('i');

    menu.style.display = 'none';
    icon.className = 'fas fa-list';
}

// Close TOC when clicking outside
document.addEventListener('click', function(event) {
    const toc = document.getElementById('faithTOC');
    const menu = document.getElementById('tocMenu');

    if (toc && !toc.contains(event.target) && menu.style.display === 'block') {
        closeTOC();
    }
});

// Smooth scroll with offset for fixed header
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            const offsetTop = target.offsetTop - 100; // Adjust for fixed header
            window.scrollTo({
                top: offsetTop,
                behavior: 'smooth'
            });
        }
    });
});
</script>
@endpush
