@extends('layouts.app')

@section('title', 'Giảng Giải Kinh - Biblical Dictionary')
@section('meta_description', 'Giảng Giải Kinh - Biblical Dictionary')

@push('styles')
<style>
    :root {
        --primary: #1e3a5f;
        --secondary: #8b4513;
        --gray-50: #f8f9fa;
        --gray-100: #f3f4f6;
        --gray-600: #4b5563;
        --white: #ffffff;
    }

    /* Dictionary Hero Section - Compact and Modern */
    .dictionary-hero {
        background: var(--primary);
        padding: 4rem 0 3rem;
        margin-bottom: 3rem;
    }

    .dictionary-hero-content {
        color: var(--white);
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
    }

    .dictionary-hero h1 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
        line-height: 1.3;
    }

    .dictionary-hero p {
        font-size: 1.125rem;
        opacity: 0.9;
        line-height: 1.7;
    }

    /* Lookup Card */
    .lookup-card {
        background: var(--white);
        border-radius: 16px;
        padding: 3rem;
        box-shadow: 0 4px 24px rgba(0,0,0,0.08);
        margin-bottom: 4rem;
    }

    .lookup-card-title {
        font-size: 1.5rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 2rem;
    }

    /* Form Styling */
    .form-label {
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 0.75rem;
        font-size: 1rem;
    }

    .form-check-label {
        font-weight: 500;
        color: #4b5563;
    }

    .testament-selector {
        display: flex;
        gap: 1rem;
        margin-bottom: 2rem;
    }

    .testament-option {
        flex: 1;
        position: relative;
    }

    .testament-option input[type="radio"] {
        position: absolute;
        opacity: 0;
    }

    .testament-option label {
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 1.75rem 1.5rem;
        background: #f8f9fa;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
    }

    .testament-option label:hover {
        background: #e9ecef;
    }

    .testament-option input[type="radio"]:checked + label {
        background: var(--primary);
        box-shadow: 0 4px 16px rgba(30, 58, 95, 0.2);
    }

    .testament-icon {
        font-size: 2.5rem;
        margin-bottom: 0.75rem;
        color: var(--secondary);
    }

    .testament-option input[type="radio"]:checked + label .testament-icon {
        color: var(--white);
    }

    .testament-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 0.25rem;
    }

    .testament-subtitle {
        font-size: 0.875rem;
        color: #6b7280;
    }

    .testament-option input[type="radio"]:checked + label .testament-title,
    .testament-option input[type="radio"]:checked + label .testament-subtitle {
        color: var(--white);
    }

    /* Reference Input */
    .reference-input-group {
        position: relative;
    }

    .reference-input {
        border: 2px solid #e5e7eb;
        border-radius: 12px;
        padding: 1.25rem 1.5rem;
        padding-left: 3.5rem;
        font-size: 1.125rem;
        transition: all 0.3s ease;
    }

    .reference-input:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(30, 58, 95, 0.1);
        outline: none;
    }

    .reference-icon {
        position: absolute;
        left: 1.25rem;
        top: 50%;
        transform: translateY(-50%);
        font-size: 1.25rem;
        color: #9ca3af;
    }

    .reference-input:focus ~ .reference-icon {
        color: var(--primary);
    }

    /* Help Text */
    .help-text {
        margin-top: 1rem;
        padding: 1.25rem;
        background: #f8f9fa;
        border-radius: 12px;
    }

    .help-text-content {
        flex: 1;
    }

    .help-text strong {
        color: var(--primary);
        display: block;
        margin-bottom: 0.5rem;
        font-size: 1rem;
    }

    .help-text p {
        margin: 0;
        font-size: 0.9375rem;
        color: #4b5563;
        line-height: 1.7;
    }

    .help-examples {
        display: flex;
        gap: 0.75rem;
        margin-top: 1rem;
        flex-wrap: wrap;
    }

    .help-example {
        background: var(--white);
        color: var(--primary);
        padding: 0.5rem 1rem;
        border-radius: 8px;
        font-size: 0.875rem;
        font-weight: 600;
        font-family: 'Courier New', monospace;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    /* Submit Button */
    .btn-lookup {
        background: var(--primary);
        border: none;
        padding: 1rem 2rem;
        border-radius: 12px;
        font-size: 1.0625rem;
        font-weight: 700;
        color: var(--white);
        transition: all 0.3s ease;
        width: 100%;
        margin-top: 2rem;
        position: relative;
    }

    .btn-lookup:hover:not(:disabled) {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(30, 58, 95, 0.25);
        background: #2d5a8a;
    }

    .btn-lookup:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }

    .btn-lookup i {
        margin-right: 0.5rem;
    }

    .btn-lookup .spinner {
        display: inline-block;
        width: 1rem;
        height: 1rem;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-top-color: white;
        border-radius: 50%;
        animation: spin 0.8s linear infinite;
        margin-right: 0.5rem;
    }

    @keyframes spin {
        to { transform: rotate(360deg); }
    }

    .btn-text-loading {
        display: none;
    }

    .btn-lookup.loading .btn-text-normal {
        display: none;
    }

    .btn-lookup.loading .btn-text-loading {
        display: inline;
    }

    /* Info Cards */
    .info-cards {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 2rem;
        margin-bottom: 4rem;
    }

    .info-card {
        background: var(--white);
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 4px 16px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
    }

    .info-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.12);
    }

    .info-card-icon {
        width: 56px;
        height: 56px;
        background: var(--primary);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.25rem;
    }

    .info-card-icon i {
        font-size: 1.5rem;
        color: var(--white);
    }

    .info-card h3 {
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 0.75rem;
    }

    .info-card p {
        color: #6b7280;
        line-height: 1.7;
        margin: 0;
        font-size: 0.9375rem;
    }

    /* Responsive */
    @media (max-width: 767px) {
        .dictionary-hero {
            padding: 3rem 0 2rem;
        }

        .dictionary-hero h1 {
            font-size: 2rem;
        }

        .dictionary-hero p {
            font-size: 1rem;
        }

        .lookup-card {
            padding: 2rem 1.5rem;
        }

        .testament-selector {
            flex-direction: column;
        }

        .testament-option label {
            flex-direction: row;
            justify-content: start;
            padding: 1.25rem;
        }

        .testament-icon {
            font-size: 2rem;
            margin-bottom: 0;
            margin-right: 1rem;
        }
    }
</style>
@endpush

@section('content')
<section class="hero-section hero-reduced" style="background-image: url({{ asset('uploads/images/blog_image.jpg') }});">
    <div class="container">
        <div class="blog-hero-content">
            <h1 class="hero-title text-center" data-aos="fade-up" data-aos-duration="1000">
                {{ __t('Giảng Giải Kinh', 'Scripture Lectures') }}
            </h1>
            <p class="hero-subtitle" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                {{ __t('Mục tiêu của chúng tôi là thực hiện Đại Mạng Lệnh của Đức Chúa Jesus bằng cách chia sẻ phúc âm nguyên chất và giảng dạy Kinh Thánh theo phương pháp giảng giải kinh', 'Our goal is to implement God’s Great Commission by sharing the original meaning of Scripture and teaching the Bible through the method of Scripture lectures.') }}
            </p>
        </div>
    </div>
</section>

<!-- Lookup Form -->
<div class="container">
    <div class="lookup-card" data-aos="fade-up" id="lookupCard">
        <h2 class="lookup-card-title">
            Bắt Đầu Tra Cứu
        </h2>

        <form action="{{ route('dictionary.lookup') }}" method="POST" id="lookupForm">
            @csrf

            <!-- Error Display -->
            @if($errors->has('lookup_error'))
                <div class="alert alert-danger mb-4" role="alert" style="background: linear-gradient(135deg, #fee2e2, #fecaca); border-left: 4px solid #dc2626; border-radius: 12px; padding: 1.25rem;">
                    <div style="display: flex; align-items: start; gap: 1rem;">
                        <i class="fas fa-exclamation-triangle" style="color: #dc2626; font-size: 1.5rem; margin-top: 0.25rem;"></i>
                        <div style="flex: 1;">
                            <strong style="color: #991b1b; font-size: 1.125rem;">Lỗi Tra Cứu</strong>
                            <p style="color: #7f1d1d; margin: 0.5rem 0 0 0; line-height: 1.6;">
                                {{ $errors->first('lookup_error') }}
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            @if(old('reference'))
                <div class="alert alert-info mb-4" role="alert" style="background: linear-gradient(135deg, #dbeafe, #bfdbfe); border-left: 4px solid #3b82f6; border-radius: 12px; padding: 1.25rem;">
                    <div style="display: flex; align-items: start; gap: 1rem;">
                        <i class="fas fa-info-circle" style="color: #3b82f6; font-size: 1.5rem; margin-top: 0.25rem;"></i>
                        <div style="flex: 1;">
                            <p style="color: #1e40af; margin: 0; line-height: 1.6;">
                                Đã giữ lại thông tin bạn nhập: <strong>{{ old('reference') }}</strong>
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Testament Selector -->
            <div class="mb-4">
                <label class="form-label">
                    <i class="fas fa-book-open me-2"></i>
                    Chọn Giao Ước
                </label>
                <div class="testament-selector">
                    <div class="testament-option">
                        <input type="radio" name="testament" id="testament-old" value="old" checked>
                        <label for="testament-old">
                            <div class="testament-icon">
                                <i class="fas fa-scroll"></i>
                            </div>
                            <div class="testament-title">Cựu Ước</div>
                            <div class="testament-subtitle">Tiếng Do Thái</div>
                        </label>
                    </div>
                    <div class="testament-option">
                        <input type="radio" name="testament" id="testament-new" value="new">
                        <label for="testament-new">
                            <div class="testament-icon">
                                <i class="fas fa-cross"></i>
                            </div>
                            <div class="testament-title">Tân Ước</div>
                            <div class="testament-subtitle">Tiếng Hy Lạp</div>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Scripture Reference Input -->
            <div class="mb-3">
                <label for="reference" class="form-label">
                    <i class="fas fa-map-marker-alt me-2"></i>
                    Nhập Câu Kinh Thánh
                </label>
                <div class="reference-input-group">
                    <input 
                        type="text" 
                        class="form-control reference-input" 
                        id="reference" 
                        name="reference" 
                        placeholder="Ví dụ: Giăng 3:12-16"
                        required
                    >
                    <i class="fas fa-bible reference-icon"></i>
                </div>
            </div>

            <!-- Help Text -->
            <div class="help-text">
                <div class="help-text-content">
                    <strong>Lưu ý quan trọng:</strong>
                    <p>
                        Vui lòng nhập ít nhất <strong>4-6 câu</strong> để đảm bảo ngữ cảnh đầy đủ và ý nghĩa thần học chính xác.
                        Tra cứu từng câu riêng lẻ có thể dẫn đến hiểu sai nghĩa.
                    </p>
                    <div class="help-examples">
                        <span class="help-example">Giăng 3:12-16</span>
                        <span class="help-example">Sáng Thế Ký 1:1-5</span>
                        <span class="help-example">Rô-ma 8:28-32</span>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-lookup" id="btnLookup">
                <span class="btn-text-normal">
                    <i class="fas fa-search"></i>
                    {{ __t('Giảng kinh', 'dictionary') }}
                </span>
                <span class="btn-text-loading">
                    <span class="spinner"></span>
                    {{ __t('Đang giảng kinh, tùy vào phân đoạn. Nếu ít tầm 30s - 1 phút, nếu nhiều có thể từ 2 - 3 phút', 'Exploring...') }}
                </span>
            </button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Smooth scroll to lookup card on page load if there's an error
        @if($errors->has('lookup_error') || old('reference'))
            setTimeout(function() {
                document.getElementById('lookupCard').scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }, 100);
        @endif

        // Form validation and smooth scroll on submit
        const form = document.getElementById('lookupForm');
        const btnLookup = document.getElementById('btnLookup');

        form.addEventListener('submit', function(e) {
            const reference = document.getElementById('reference').value.trim();

            if (!reference) {
                e.preventDefault();
                alert('Vui lòng nhập câu Kinh Thánh cần tra cứu.');
                return false;
            }

            // Basic format validation
            if (reference.length < 3) {
                e.preventDefault();
                alert('Vui lòng nhập câu Kinh Thánh hợp lệ (ví dụ: Giăng 3:12-16).');
                return false;
            }

            // Show loading state
            btnLookup.classList.add('loading');
            btnLookup.disabled = true;

            // Form will submit normally (no scrolling needed)
        });
    });
</script>
@endpush