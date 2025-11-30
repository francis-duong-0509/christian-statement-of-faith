@extends('layouts.app')

@section('title', 'Kết Quả Tra Cứu: ' . $reference . ' - Biblical Dictionary')
@section('meta_description', 'Giải thích ý nghĩa gốc từ tiếng Do Thái và Hy Lạp cho đoạn Kinh Thánh: ' . $reference)

@push('styles')
<style>
    :root {
        --primary: #1e3a5f;
        --secondary: #8b4513;
        --gray-50: #f8f9fa;
        --gray-100: #f3f4f6;
        --gray-600: #4b5563;
        --white: #ffffff;
        --verse-number: #3b82f6;
    }

    /* Result Hero - Compact and Modern */
    .result-hero {
        background: linear-gradient(135deg, var(--primary) 0%, #2d5a8a 100%);
        padding: 4rem 0 3rem;
        margin-bottom: 3rem;
        position: relative;
        overflow: hidden;
    }

    .result-hero::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 600px;
        height: 600px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
    }

    .result-hero-content {
        position: relative;
        z-index: 2;
        color: var(--white);
    }

    .testament-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        padding: 0.5rem 1.25rem;
        border-radius: 50px;
        font-size: 0.875rem;
        font-weight: 600;
        margin-bottom: 1rem;
        border: 2px solid rgba(255, 255, 255, 0.3);
    }

    .result-hero h1 {
        font-size: 2.5rem;
        font-weight: 900;
        margin-bottom: 0.75rem;
        text-shadow: 0 4px 20px rgba(0,0,0,0.3);
    }

    .verse-range-display {
        font-size: 1rem;
        opacity: 0.95;
        margin-bottom: 1rem;
    }

    .verse-count-badge {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        background: rgba(255, 255, 255, 0.15);
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-size: 0.875rem;
    }

    /* Breadcrumb */
    .dictionary-breadcrumb {
        background: var(--white);
        padding: 1rem 0;
        margin-bottom: 2rem;
        border-bottom: 1px solid #e5e7eb;
    }

    .dictionary-breadcrumb .breadcrumb {
        margin: 0;
        background: transparent;
        padding: 0;
    }

    .dictionary-breadcrumb .breadcrumb-item a {
        color: var(--primary);
        text-decoration: none;
        transition: opacity 0.3s ease;
    }

    .dictionary-breadcrumb .breadcrumb-item a:hover {
        opacity: 0.7;
    }

    .dictionary-breadcrumb .breadcrumb-item.active {
        color: #6b7280;
    }

    /* Modern Card Design - NO BORDERS */
    .content-card {
        background: var(--white);
        border-radius: 20px;
        padding: 2.5rem;
        box-shadow: 0 4px 24px rgba(0,0,0,0.06);
        margin-bottom: 2rem;
        transition: all 0.3s ease;
    }

    .content-card:hover {
        box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        transform: translateY(-2px);
    }

    /* Card Header - Clean Design */
    .card-header-custom {
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-bottom: 2rem;
        padding-bottom: 1.5rem;
        border-bottom: 3px solid var(--gray-100);
    }

    .card-icon {
        width: 56px;
        height: 56px;
        background: linear-gradient(135deg, var(--primary), #3b82f6);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }

    .card-icon.exegesis-icon {
        background: linear-gradient(135deg, var(--secondary), #a55a1a);
        box-shadow: 0 4px 12px rgba(139, 69, 19, 0.3);
    }

    .card-icon i {
        font-size: 1.5rem;
        color: var(--white);
    }

    .card-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: #1f2937;
        margin: 0;
        flex: 1;
    }

    .card-label {
        background: linear-gradient(135deg, #dbeafe, #bfdbfe);
        color: #1e40af;
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-size: 0.875rem;
        font-weight: 600;
    }

    /* Vietnamese Text with Colored Verse Numbers */
    .scripture-text {
        font-size: 1.125rem;
        line-height: 2;
        color: #1f2937;
        font-family: 'Merriweather', serif;
    }

    /* VERSE NUMBER STYLING - Blue Gradient */
    .verse-number {
        display: inline-block;
        background: linear-gradient(135deg, #3b82f6, #2563eb);
        color: white;
        padding: 0.125rem 0.5rem;
        border-radius: 6px;
        font-size: 0.875rem;
        font-weight: 700;
        margin-right: 0.5rem;
        font-family: 'Inter', sans-serif;
        box-shadow: 0 2px 8px rgba(59, 130, 246, 0.3);
        vertical-align: baseline;
    }

    /* Exegesis Content - Beautiful Typography */
    .exegesis-content {
        font-size: 1.0625rem;
        line-height: 1.9;
        color: #374151;
    }

    .exegesis-content p {
        margin-bottom: 1.5rem;
    }

    .exegesis-content p:last-child {
        margin-bottom: 0;
    }

    .exegesis-content strong {
        color: var(--primary);
        font-weight: 700;
    }

    .exegesis-content ul,
    .exegesis-content ol {
        margin: 1.25rem 0;
        padding-left: 1.75rem;
    }

    .exegesis-content li {
        margin-bottom: 0.75rem;
    }

    /* Info Alert - Soft Design */
    .info-alert {
        background: linear-gradient(135deg, #eff6ff, #dbeafe);
        border-radius: 16px;
        padding: 1.5rem;
        margin-bottom: 2rem;
        display: flex;
        align-items: start;
        gap: 1rem;
        box-shadow: 0 2px 12px rgba(59, 130, 246, 0.1);
    }

    .info-alert i {
        color: #3b82f6;
        font-size: 1.5rem;
        margin-top: 0.25rem;
    }

    .info-alert-content {
        flex: 1;
    }

    .info-alert h4 {
        font-size: 1.125rem;
        font-weight: 700;
        color: #1e40af;
        margin-bottom: 0.5rem;
    }

    .info-alert p {
        color: #1e3a8a;
        margin: 0;
        line-height: 1.7;
    }

    /* Action Buttons - Modern Design */
    .action-buttons {
        display: flex;
        gap: 1rem;
        margin-top: 3rem;
        flex-wrap: wrap;
    }

    .btn-new-lookup {
        background: linear-gradient(135deg, var(--primary), #2d5a8a);
        border: none;
        padding: 1rem 2.5rem;
        border-radius: 12px;
        font-size: 1.0625rem;
        font-weight: 700;
        color: var(--white);
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
        box-shadow: 0 4px 16px rgba(30, 58, 95, 0.3);
    }

    .btn-new-lookup:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(30, 58, 95, 0.4);
        color: var(--white);
    }

    .btn-share {
        background: var(--white);
        border: 2px solid var(--primary);
        padding: 1rem 2.5rem;
        border-radius: 12px;
        font-size: 1.0625rem;
        font-weight: 700;
        color: var(--primary);
        transition: all 0.3s ease;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 0.75rem;
    }

    .btn-share:hover {
        background: var(--primary);
        color: var(--white);
        transform: translateY(-2px);
    }

    /* Responsive */
    @media (max-width: 767px) {
        .result-hero {
            padding: 3rem 0 2rem;
        }

        .result-hero h1 {
            font-size: 1.75rem;
        }

        .content-card {
            padding: 1.75rem;
        }

        .card-header-custom {
            flex-direction: column;
            align-items: flex-start;
        }

        .action-buttons {
            flex-direction: column;
        }

        .btn-new-lookup,
        .btn-share {
            width: 100%;
            justify-content: center;
        }

        .scripture-text {
            font-size: 1rem;
        }
    }
</style>
@endpush

@section('content')
<!-- Breadcrumb -->
<div class="dictionary-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="{{ route('home') }}">
                        <i class="fas fa-home me-1"></i>Trang Chủ
                    </a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('dictionary.index') }}">
                        <i class="fas fa-book-bible me-1"></i>Tra Cứu Kinh Thánh
                    </a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ $reference }}</li>
            </ol>
        </nav>
    </div>
</div>

<!-- Result Hero -->
<section class="result-hero">
    <div class="container">
        <div class="result-hero-content" data-aos="fade-up">
            <div class="testament-badge">
                @if($testament === 'old')
                    <i class="fas fa-scroll"></i>
                    <span>Cựu Ước - Tiếng Do Thái</span>
                @else
                    <i class="fas fa-cross"></i>
                    <span>Tân Ước - Tiếng Hy Lạp</span>
                @endif
            </div>

            <h1>{{ $reference }}</h1>

            <div class="verse-range-display">
                <i class="fas fa-book-open me-2"></i>
                {{ $book }} {{ $chapter }}:{{ $verseStart }}-{{ $verseEnd }}
            </div>

            <div class="verse-count-badge">
                <i class="fas fa-list-ol"></i>
                <span>{{ $verseCount }} câu Kinh Thánh</span>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<div class="container">
    <!-- Info Alert -->
    <div class="info-alert" data-aos="fade-up">
        <i class="fas fa-lightbulb"></i>
        <div class="info-alert-content">
            <h4>Giải Thích Từ Ngôn Ngữ Gốc</h4>
            <p>
                Phần giải thích dưới đây dựa trên văn bản nguyên gốc
                @if($testament === 'old')
                    <strong>tiếng Do Thái</strong> của Cựu Ước,
                @else
                    <strong>tiếng Hy Lạp</strong> của Tân Ước,
                @endif
                nhằm truyền đạt ý nghĩa thuần túy nhất của Lời Chúa trong ngữ cảnh thần học và lịch sử.
            </p>
        </div>
    </div>

    <!-- Vietnamese Text Section -->
    <div class="content-section" data-aos="fade-up" data-aos-delay="100">
        <div class="content-card">
            <div class="card-header-custom">
                <div class="card-icon">
                    <i class="fas fa-book-open"></i>
                </div>
                <h2 class="card-title">Bản Dịch Tiếng Việt</h2>
                <span class="card-label">Kinh Thánh 1934</span>
            </div>
            <div class="scripture-text" id="vietnameseText">
                {{ $vietnameseText }}
            </div>
        </div>
    </div>

    <!-- Exegesis Section - Renamed to "Phân Tích Bối Cảnh" -->
    <div class="content-section" data-aos="fade-up" data-aos-delay="200">
        <div class="content-card">
            <div class="card-header-custom">
                <div class="card-icon exegesis-icon">
                    <i class="fas fa-book-reader"></i>
                </div>
                <h2 class="card-title">Phân Tích Bối Cảnh</h2>
            </div>
            <div class="exegesis-content">
                {!! nl2br(e($exegesis)) !!}
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="action-buttons" data-aos="fade-up" data-aos-delay="300">
        <a href="{{ route('dictionary.index') }}" class="btn-new-lookup">
            <i class="fas fa-search"></i>
            Tra Cứu Đoạn Khác
        </a>
        <button type="button" class="btn-share" onclick="shareResult()">
            <i class="fas fa-share-alt"></i>
            Chia Sẻ Kết Quả
        </button>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Add colored verse numbers to Vietnamese text
    document.addEventListener('DOMContentLoaded', function() {
        const vietnameseTextElement = document.getElementById('vietnameseText');
        if (vietnameseTextElement) {
            let text = vietnameseTextElement.innerHTML;

            // Replace verse numbers (pattern: "12 text" -> "<span class='verse-number'>12</span> text")
            // This regex matches: digit(s) followed by space
            text = text.replace(/\b(\d+)\s+/g, '<span class="verse-number">$1</span> ');

            vietnameseTextElement.innerHTML = text;
        }
    });

    // Share functionality
    function shareResult() {
        const url = window.location.href;
        const title = 'Kết Quả Tra Cứu: {{ $reference }}';

        // Check if Web Share API is available
        if (navigator.share) {
            navigator.share({
                title: title,
                url: url
            }).then(() => {
                console.log('Shared successfully');
            }).catch((error) => {
                console.log('Error sharing:', error);
                fallbackShare(url);
            });
        } else {
            // Fallback: Copy to clipboard
            fallbackShare(url);
        }
    }

    function fallbackShare(url) {
        navigator.clipboard.writeText(url).then(() => {
            alert('Đã sao chép liên kết vào clipboard!');
        }).catch((error) => {
            console.error('Error copying to clipboard:', error);
            alert('Không thể sao chép liên kết. Vui lòng sao chép thủ công: ' + url);
        });
    }
</script>
@endpush
