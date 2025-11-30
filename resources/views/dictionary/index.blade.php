@extends('layouts.app')

@section('title', 'Tra Cứu Kinh Thánh - Biblical Dictionary')
@section('meta_description', 'Tra cứu ý nghĩa gốc của Kinh Thánh từ tiếng Do Thái (Cựu Ước) và tiếng Hy Lạp (Tân Ước)')

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

    /* Dictionary Hero Section */
    .dictionary-hero {
        background: linear-gradient(135deg, var(--primary) 0%, #2d5a8a 100%);
        padding: 8rem 0 5rem;
        margin-bottom: 3rem;
        position: relative;
        overflow: hidden;
    }

    .dictionary-hero::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -20%;
        width: 600px;
        height: 600px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
    }

    .dictionary-hero-content {
        position: relative;
        z-index: 2;
        color: var(--white);
        text-align: center;
    }

    .dictionary-hero h1 {
        font-size: 3.5rem;
        font-weight: 900;
        margin-bottom: 1.5rem;
        text-shadow: 0 4px 20px rgba(0,0,0,0.3);
    }

    .dictionary-hero p {
        font-size: 1.25rem;
        opacity: 0.95;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.8;
    }

    .dictionary-hero .icon {
        font-size: 4rem;
        margin-bottom: 1.5rem;
        opacity: 0.9;
    }

    /* Lookup Card */
    .lookup-card {
        background: var(--white);
        border-radius: 16px;
        padding: 3rem;
        box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        margin-top: -5rem;
        margin-bottom: 4rem;
        position: relative;
        z-index: 10;
    }

    .lookup-card-title {
        font-size: 1.75rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 2rem;
        text-align: center;
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
        padding: 2rem 1.5rem;
        border: 3px solid #e5e7eb;
        border-radius: 12px;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
    }

    .testament-option label:hover {
        border-color: var(--primary);
        background: #f9fafb;
    }

    .testament-option input[type="radio"]:checked + label {
        border-color: var(--primary);
        background: linear-gradient(135deg, rgba(30, 58, 95, 0.05), rgba(30, 58, 95, 0.1));
        box-shadow: 0 4px 16px rgba(30, 58, 95, 0.15);
    }

    .testament-icon {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: var(--secondary);
    }

    .testament-option input[type="radio"]:checked + label .testament-icon {
        color: var(--primary);
    }

    .testament-title {
        font-size: 1.25rem;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 0.5rem;
    }

    .testament-subtitle {
        font-size: 0.875rem;
        color: #6b7280;
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
        display: flex;
        align-items: start;
        gap: 0.75rem;
        margin-top: 1rem;
        padding: 1rem;
        background: #fef3c7;
        border-left: 4px solid #f59e0b;
        border-radius: 8px;
    }

    .help-text i {
        color: #f59e0b;
        margin-top: 0.25rem;
    }

    .help-text-content {
        flex: 1;
    }

    .help-text strong {
        color: #92400e;
        display: block;
        margin-bottom: 0.25rem;
    }

    .help-text p {
        margin: 0;
        font-size: 0.9375rem;
        color: #78350f;
        line-height: 1.6;
    }

    .help-examples {
        display: flex;
        gap: 1rem;
        margin-top: 0.75rem;
        flex-wrap: wrap;
    }

    .help-example {
        background: #fbbf24;
        color: #78350f;
        padding: 0.375rem 0.875rem;
        border-radius: 6px;
        font-size: 0.875rem;
        font-weight: 600;
        font-family: 'Courier New', monospace;
    }

    /* Submit Button */
    .btn-lookup {
        background: linear-gradient(135deg, var(--primary), #2d5a8a);
        border: none;
        padding: 1.125rem 3rem;
        border-radius: 12px;
        font-size: 1.125rem;
        font-weight: 700;
        color: var(--white);
        transition: all 0.3s ease;
        width: 100%;
        margin-top: 2rem;
    }

    .btn-lookup:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 32px rgba(30, 58, 95, 0.3);
        background: linear-gradient(135deg, #2d5a8a, var(--primary));
    }

    .btn-lookup i {
        margin-right: 0.75rem;
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
        border-left: 4px solid var(--secondary);
        transition: all 0.3s ease;
    }

    .info-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0,0,0,0.12);
    }

    .info-card-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, var(--primary), #2d5a8a);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 1.5rem;
    }

    .info-card-icon i {
        font-size: 1.75rem;
        color: var(--white);
    }

    .info-card h3 {
        font-size: 1.25rem;
        font-weight: 700;
        color: var(--primary);
        margin-bottom: 0.75rem;
    }

    .info-card p {
        color: #6b7280;
        line-height: 1.7;
        margin: 0;
    }

    /* Responsive */
    @media (max-width: 767px) {
        .dictionary-hero {
            padding: 6rem 0 4rem;
        }

        .dictionary-hero h1 {
            font-size: 2.25rem;
        }

        .dictionary-hero p {
            font-size: 1.125rem;
        }

        .lookup-card {
            padding: 2rem 1.5rem;
            margin-top: -3rem;
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

        .help-examples {
            flex-direction: column;
        }
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="dictionary-hero">
    <div class="container">
        <div class="dictionary-hero-content">
            <div class="icon" data-aos="fade-down">
                <i class="fas fa-book-bible"></i>
            </div>
            <h1 data-aos="fade-up" data-aos-duration="1000">
                Tra Cứu Kinh Thánh
            </h1>
            <p data-aos="fade-up" data-aos-duration="1000" data-aos-delay="100">
                Khám phá ý nghĩa gốc của Kinh Thánh từ tiếng Do Thái (Cựu Ước) và tiếng Hy Lạp (Tân Ước).<br>
                Hiểu đúng ngữ cảnh và ý nghĩa thần học thuần túy của Lời Chúa.
            </p>
        </div>
    </div>
</section>

<!-- Lookup Form -->
<div class="container">
    <div class="lookup-card" data-aos="fade-up">
        <h2 class="lookup-card-title">
            <i class="fas fa-search me-2"></i>
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
                <i class="fas fa-info-circle"></i>
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
            <button type="submit" class="btn btn-lookup">
                <i class="fas fa-search"></i>
                Tra Cứu Ngay
            </button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Form validation
    document.getElementById('lookupForm').addEventListener('submit', function(e) {
        const reference = document.getElementById('reference').value.trim();
        
        if (!reference) {
            e.preventDefault();
            alert('Vui lòng nhập câu Kinh Thánh cần tra cứu.');
            return false;
        }
        
        // Basic format validation (will improve later)
        if (reference.length < 3) {
            e.preventDefault();
            alert('Vui lòng nhập câu Kinh Thánh hợp lệ (ví dụ: Giăng 3:12-16).');
            return false;
        }
    });
</script>
@endpush