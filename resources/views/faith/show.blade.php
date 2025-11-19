@extends('layouts.app')

@section('title', (app()->getLocale() == 'vi' ? $statement->title_vi : $statement->title_en) . ' - ' . config('app.name'))

@section('meta_description', app()->getLocale() == 'vi' ? ($statement->meta_description_vi ?? Str::limit(strip_tags($statement->content_vi), 160)) : ($statement->meta_description_en ?? Str::limit(strip_tags($statement->content_en), 160)))

@section('content')
<!-- BREADCRUMB -->
<div class="container" style="margin-top: 1.5rem;">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ app()->getLocale() == 'vi' ? 'Trang Chủ' : 'Home' }}</a></li>
            <li class="breadcrumb-item"><a href="{{ route('faith.index') }}">{{ app()->getLocale() == 'vi' ? 'Tuyên Bố Đức Tin' : 'Statement of Faith' }}</a></li>
            <li class="breadcrumb-item">
                <a href="{{ route('faith.category', app()->getLocale() == 'vi' ? $category->slug_vi : $category->slug_en) }}">
                    {{ app()->getLocale() == 'vi' ? $category->name_vi : $category->name_en }}
                </a>
            </li>
            <li class="breadcrumb-item active">{{ app()->getLocale() == 'vi' ? $statement->title_vi : $statement->title_en }}</li>
        </ol>
    </nav>
</div>

<!-- STATEMENT CONTENT -->
<section class="section">
    <div class="container">
        <div class="row g-5">
            <!-- Main Content -->
            <div class="col-lg-8">
                <article class="card">
                    <div class="card-body" style="padding: 3rem;">
                        <span class="badge badge-primary" style="margin-bottom: 1rem;">
                            {{ app()->getLocale() == 'vi' ? $category->name_vi : $category->name_en }}
                        </span>
                        <h1 style="font-size: 2.25rem; font-weight: 900; color: var(--text-primary); margin-bottom: 2rem; line-height: 1.2;">
                            {{ app()->getLocale() == 'vi' ? $statement->title_vi : $statement->title_en }}
                        </h1>

                        <!-- Content -->
                        <div class="statement-content" style="color: var(--text-secondary); font-size: 1.1rem; line-height: 1.8;">
                            {!! app()->getLocale() == 'vi' ? $statement->content_vi : $statement->content_en !!}
                        </div>

                        <!-- Scripture References -->
                        @if($statement->scripture_references && count($statement->scripture_references) > 0)
                        <div style="margin-top: 3rem; padding-top: 2rem; border-top: 2px solid var(--gray-200);">
                            <h4 style="font-size: 1.25rem; font-weight: 700; color: var(--text-primary); margin-bottom: 1rem;">
                                📖 {{ app()->getLocale() == 'vi' ? 'Các Câu Kinh Thánh Tham Khảo' : 'Scripture References' }}
                            </h4>
                            <div>
                                @foreach($statement->scripture_references as $reference)
                                <span class="scripture-reference">{{ $reference }}</span>
                                @endforeach
                            </div>
                        </div>
                        @endif

                        <!-- Navigation -->
                        <div class="d-flex justify-content-between gap-3" style="margin-top: 3rem; padding-top: 2rem; border-top: 2px solid var(--gray-200);">
                            <a href="{{ route('faith.category', app()->getLocale() == 'vi' ? $category->slug_vi : $category->slug_en) }}"
                               class="btn btn-outline">
                                ← {{ app()->getLocale() == 'vi' ? 'Quay Lại Danh Mục' : 'Back to Category' }}
                            </a>
                            <a href="{{ route('faith.index') }}" class="btn btn-outline">
                                {{ app()->getLocale() == 'vi' ? 'Tất Cả Danh Mục' : 'All Categories' }} →
                            </a>
                        </div>
                    </div>
                </article>
            </div>

            <!-- Sidebar -->
            <div class="col-lg-4">
                <!-- Category Info -->
                <div class="card" style="background: linear-gradient(135deg, #eff6ff 0%, #f5f3ff 100%); margin-bottom: 1.5rem;">
                    <div class="card-body" style="padding: 1.5rem;">
                        <h5 style="font-size: 0.8rem; font-weight: 700; color: var(--text-tertiary); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 1.25rem;">
                            {{ app()->getLocale() == 'vi' ? 'Danh Mục' : 'Category' }}
                        </h5>
                        <div class="d-flex align-items-start gap-3" style="margin-bottom: 1.5rem;">
                            <span style="display: flex; align-items: center; justify-content: center; width: 50px; height: 50px; border-radius: 50%; background: linear-gradient(135deg, var(--accent) 0%, #f59e0b 100%); color: white; font-size: 1.5rem; font-weight: 900; box-shadow: 0 6px 20px rgba(212, 175, 55, 0.4); font-family: 'Playfair Display', serif; flex-shrink: 0;">
                                {{ $category->order }}
                            </span>
                            <div>
                                <h6 style="font-size: 1.15rem; font-weight: 800; color: var(--text-primary); margin-bottom: 0.5rem;">
                                    {{ app()->getLocale() == 'vi' ? $category->name_vi : $category->name_en }}
                                </h6>
                                <p style="font-size: 0.9rem; color: var(--text-secondary); margin: 0; line-height: 1.5;">
                                    {{ app()->getLocale() == 'vi' ? $category->description_vi : $category->description_en }}
                                </p>
                            </div>
                        </div>
                        <a href="{{ route('faith.category', app()->getLocale() == 'vi' ? $category->slug_vi : $category->slug_en) }}"
                           class="btn btn-outline w-100">
                            {{ app()->getLocale() == 'vi' ? 'Xem Tất Cả Tuyên Bố' : 'View All Statements' }}
                        </a>
                    </div>
                </div>

                <!-- Related Statements -->
                @if($relatedStatements->count() > 0)
                <div class="card">
                    <div class="card-body" style="padding: 1.5rem;">
                        <h5 style="font-size: 0.8rem; font-weight: 700; color: var(--text-tertiary); text-transform: uppercase; letter-spacing: 0.05em; margin-bottom: 1.25rem;">
                            {{ app()->getLocale() == 'vi' ? 'Tuyên Bố Liên Quan' : 'Related Statements' }}
                        </h5>
                        <div class="d-flex flex-column gap-3">
                            @foreach($relatedStatements as $related)
                            <a href="{{ route('faith.show', [
                                    app()->getLocale() == 'vi' ? $category->slug_vi : $category->slug_en,
                                    app()->getLocale() == 'vi' ? $related->slug_vi : $related->slug_en
                                ]) }}"
                               class="d-block"
                               style="padding: 1rem; border-radius: 8px; background: linear-gradient(135deg, #f8fafc 0%, #f0f9ff 100%); border: 1px solid var(--gray-200); text-decoration: none; transition: all 0.2s;"
                               onmouseover="this.style.borderColor='var(--primary)'; this.style.background='linear-gradient(135deg, #eff6ff 0%, #f5f3ff 100%)';"
                               onmouseout="this.style.borderColor='var(--gray-200)'; this.style.background='linear-gradient(135deg, #f8fafc 0%, #f0f9ff 100%)';">
                                <div class="d-flex align-items-start gap-2">
                                    <span style="display: flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 50%; background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%); color: white; font-size: 0.85rem; font-weight: 900; flex-shrink: 0;">
                                        {{ $related->order }}
                                    </span>
                                    <div>
                                        <h6 style="font-size: 0.95rem; font-weight: 700; color: var(--text-primary); margin-bottom: 0.25rem;">
                                            {{ app()->getLocale() == 'vi' ? $related->title_vi : $related->title_en }}
                                        </h6>
                                        <p style="font-size: 0.8rem; color: var(--text-tertiary); margin: 0; line-height: 1.4;">
                                            {{ Str::limit(strip_tags(app()->getLocale() == 'vi' ? $related->content_vi : $related->content_en), 80) }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- CALL TO ACTION -->
<section class="section bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card" style="text-align: center; padding: 3rem 2rem;">
                    <h3 style="font-size: 1.75rem; font-weight: 900; color: var(--text-primary); margin-bottom: 1rem;">
                        {{ app()->getLocale() == 'vi' ? 'Khám Phá Thêm' : 'Explore More' }}
                    </h3>
                    <p style="font-size: 1.1rem; line-height: 1.7; color: var(--text-secondary); margin-bottom: 2rem;">
                        {{ app()->getLocale() == 'vi'
                            ? 'Tìm hiểu thêm về những niềm tin cốt lõi của đức tin Cơ Đốc'
                            : 'Learn more about the core beliefs of the Christian faith' }}
                    </p>
                    <a href="{{ route('faith.index') }}" class="btn btn-primary" style="font-size: 1.1rem; padding: 0.75rem 2rem;">
                        {{ app()->getLocale() == 'vi' ? 'Xem Tất Cả Tuyên Bố Đức Tin' : 'View All Statements of Faith' }}
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
