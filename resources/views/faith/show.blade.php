@extends('layouts.app')

@section('title', $statement->title . ' - ' . config('app.name'))

@section('meta_description', $statement->meta_description ?? Str::limit(strip_tags($statement->content), 160))

@section('content')
<!-- HERO SECTION -->
<section class="hero-section hero-reduced" style="background-image: url('https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=1920&q=80');">
    <div class="hero-overlay"></div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <div style="margin-bottom: 1.5rem;" data-aos="fade-up" data-aos-duration="1000">
                    <span style="display: inline-block; background: rgba(255, 255, 255, 0.15); backdrop-filter: blur(10px); color: white; padding: 8px 24px; border-radius: var(--radius-full); font-size: 14px; font-weight: 600; border: 2px solid rgba(255, 255, 255, 0.3);">
                        {{ $category->name }}
                    </span>
                </div>
                <h1 class="hero-title" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100" style="font-size: 3rem;">
                    {{ $statement->title }}
                </h1>
            </div>
        </div>
    </div>
</section>

<!-- BREADCRUMB -->
<x-breadcrumb :items="[
    ['url' => route('home'), 'label' => __t('Trang Chủ', 'Home')],
    ['url' => route('faith.index'), 'label' => __t('Tuyên Bố Đức Tin', 'Statement of Faith')],
    ['url' => route('faith.category', $category->slug), 'label' => $category->name],
    ['label' => $statement->title]
]" />

<!-- STATEMENT CONTENT -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Main Content -->
            <div class="col-lg-8">
                <article style="background: var(--white); border-radius: var(--radius-lg); padding: 3rem; box-shadow: var(--shadow-lg); border: 1px solid var(--gray-200);" data-aos="fade-up">
                    <!-- Content -->
                    <div class="statement-content" style="color: var(--text-primary); font-size: 1.1rem; line-height: 1.8;">
                        {!! $statement->content !!}
                    </div>

                    <!-- Scripture References -->
                    @if($statement->scripture_references && count($statement->scripture_references) > 0)
                    <div style="margin-top: 3rem; padding-top: 2rem; border-top: 2px solid var(--gray-200);">
                        <h4 style="font-size: 1.25rem; font-weight: 700; color: var(--primary); margin-bottom: 1rem; font-family: var(--font-serif); display: flex; align-items: center; gap: 10px;">
                            <i class="fas fa-book-bible" style="color: var(--accent);"></i>
                            {{ __t('Các Câu Kinh Thánh Tham Khảo', 'Scripture References') }}
                        </h4>
                        <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                            @foreach($statement->scripture_references as $reference)
                            <span class="scripture-ref" style="background: var(--gray-50); padding: 8px 16px; border-radius: var(--radius-md); font-weight: 600; color: var(--primary); border: 1px solid var(--gray-200); transition: var(--transition);">{{ $reference }}</span>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <!-- Navigation -->
                    <div class="d-flex justify-content-between gap-3 flex-wrap" style="margin-top: 3rem; padding-top: 2rem; border-top: 2px solid var(--gray-200);">
                        <a href="{{ route('faith.category', $category->slug) }}" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left me-2"></i> {{ __t('Quay Lại Danh Mục', 'Back to Category') }}
                        </a>
                        <a href="{{ route('faith.index') }}" class="btn btn-outline-primary">
                            {{ __t('Tất Cả Danh Mục', 'All Categories') }} <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </article>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Category Info -->
                <div style="background: linear-gradient(135deg, #eff6ff 0%, #f5f3ff 100%); border-radius: var(--radius-lg); padding: 1.5rem; margin-bottom: 1.5rem; box-shadow: var(--shadow-md); border: 1px solid var(--gray-200);" data-aos="fade-up" data-aos-delay="100">
                    <h5 style="font-size: 0.8rem; font-weight: 700; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 1.25rem;">
                        {{ __t('Danh Mục', 'Category') }}
                    </h5>
                    <div class="d-flex align-items-start gap-3" style="margin-bottom: 1.5rem;">
                        <span style="display: flex; align-items: center; justify-content: center; width: 50px; height: 50px; border-radius: 50%; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); color: white; font-size: 1.5rem; font-weight: 900; box-shadow: 0 6px 20px rgba(30, 58, 95, 0.4); font-family: var(--font-serif); flex-shrink: 0;">
                            {{ $category->order }}
                        </span>
                        <div>
                            <h6 style="font-size: 1.15rem; font-weight: 700; color: var(--primary); margin-bottom: 0.5rem; font-family: var(--font-serif);">
                                {{ $category->name }}
                            </h6>
                            <p style="font-size: 0.9rem; color: var(--text-secondary); margin: 0; line-height: 1.5;">
                                {{ $category->description }}
                            </p>
                        </div>
                    </div>
                    <a href="{{ route('faith.category', $category->slug) }}" class="btn btn-outline-primary w-100">
                        {{ __t('Xem Tất Cả Tuyên Bố', 'View All Statements') }}
                    </a>
                </div>

                <!-- Related Statements -->
                @if($relatedStatements->count() > 0)
                <div style="background: var(--white); border-radius: var(--radius-lg); padding: 1.5rem; box-shadow: var(--shadow-md); border: 1px solid var(--gray-200);" data-aos="fade-up" data-aos-delay="200">
                    <h5 style="font-size: 0.8rem; font-weight: 700; color: var(--text-secondary); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 1.25rem;">
                        {{ __t('Tuyên Bố Liên Quan', 'Related Statements') }}
                    </h5>
                    <div class="d-flex flex-column gap-3">
                        @foreach($relatedStatements as $related)
                        <a href="{{ route('faith.show', [$category->slug, $related->slug]) }}"
                           class="d-block"
                           style="padding: 1rem; border-radius: var(--radius-md); background: linear-gradient(135deg, #f8fafc 0%, #f0f9ff 100%); border: 1px solid var(--gray-200); text-decoration: none; transition: var(--transition);"
                           onmouseover="this.style.borderColor='var(--primary)'; this.style.transform='translateY(-2px)'; this.style.boxShadow='var(--shadow-md)';"
                           onmouseout="this.style.borderColor='var(--gray-200)'; this.style.transform='translateY(0)'; this.style.boxShadow='none';">
                            <div class="d-flex align-items-start gap-2">
                                <span style="display: flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 50%; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); color: white; font-size: 0.85rem; font-weight: 700; flex-shrink: 0; font-family: var(--font-serif);">
                                    {{ $related->order }}
                                </span>
                                <div>
                                    <h6 style="font-size: 0.95rem; font-weight: 700; color: var(--primary); margin-bottom: 0.25rem; font-family: var(--font-serif);">
                                        {{ $related->title }}
                                    </h6>
                                    <p style="font-size: 0.8rem; color: var(--text-secondary); margin: 0; line-height: 1.4;">
                                        {{ Str::limit(strip_tags($related->content), 80) }}
                                    </p>
                                </div>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- CALL TO ACTION -->
<section class="py-5" style="background-color: var(--gray-50);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center" data-aos="fade-up">
                <div style="padding: 3rem 2rem;">
                    <div style="width: 80px; height: 80px; border-radius: 50%; background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%); color: white; display: flex; align-items: center; justify-content: center; font-size: 2.5rem; margin: 0 auto 1.5rem;">
                        <i class="fas fa-book-bible"></i>
                    </div>
                    <h3 style="font-size: 1.75rem; font-weight: 700; color: var(--primary); margin-bottom: 1rem; font-family: var(--font-serif);">
                        {{ __t('Khám Phá Thêm', 'Explore More') }}
                    </h3>
                    <p style="font-size: 1.1rem; line-height: 1.8; color: var(--text-secondary); margin-bottom: 2rem;">
                        {{ __t('Tìm hiểu thêm về những niềm tin cốt lõi của đức tin Cơ Đốc giáo dựa trên Kinh Thánh', 'Learn more about the core beliefs of the Christian faith based on Scripture') }}
                    </p>
                    <a href="{{ route('faith.index') }}" class="btn btn-primary btn-lg">
                        {{ __t('Xem Tất Cả Tuyên Bố Đức Tin', 'View All Statements of Faith') }}
                        <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('styles')
<style>
.statement-content h1,
.statement-content h2,
.statement-content h3,
.statement-content h4,
.statement-content h5,
.statement-content h6 {
    color: var(--text-primary);
    font-weight: 800;
    margin-top: 2rem;
    margin-bottom: 1rem;
}

.statement-content h2 { font-size: 1.75rem; }
.statement-content h3 { font-size: 1.5rem; }
.statement-content h4 { font-size: 1.25rem; }

.statement-content p {
    margin-bottom: 1.5rem;
}

.statement-content ul,
.statement-content ol {
    margin-bottom: 1.5rem;
    padding-left: 2rem;
}

.statement-content li {
    margin-bottom: 0.75rem;
    color: var(--text-secondary);
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
    color: var(--secondary);
}

.statement-content blockquote {
    border-left: 4px solid var(--accent);
    padding-left: 1.5rem;
    margin: 2rem 0;
    font-style: italic;
    color: var(--text-secondary);
    background: linear-gradient(135deg, #f8fafc 0%, #f0f9ff 100%);
    padding: 1.5rem;
    border-radius: 8px;
}
</style>
@endpush
