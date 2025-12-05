@extends('layouts.app')

@section('title', 'Tìm Hiểu Bối Cảnh Phân Đoạn - Biblical Dictionary')
@section('meta_description', 'Tìm Hiểu Bối Cảnh Phân Đoạn - Biblical Dictionary')

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

    .reference-input:disabled,
    select:disabled {
        background-color: #f3f4f6;
        color: #9ca3af;
        cursor: not-allowed;
        opacity: 0.6;
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

        .row .col-md-4 {
            margin-bottom: 1rem;
        }
    }
</style>
@endpush

@section('content')
<section class="hero-section hero-reduced" style="background-image: url({{ asset('uploads/images/blog_image.jpg') }});">
    <div class="container">
        <div class="blog-hero-content">
            <h1 class="hero-title text-center" data-aos="fade-up" data-aos-duration="1000">
                {{ __t('Tìm Hiểu Bối Cảnh Phân Đoạn', 'Understanding Biblical Context') }}
            </h1>
            <p class="hero-subtitle" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200">
                {{ __t('Mục tiêu của chúng tôi là thực hiện Đại Mạng Lệnh của Đức Chúa Giêsu bằng cách chia sẻ phúc âm nguyên chất và giảng dạy Kinh Thánh theo phương pháp giảng giải kinh', 'Our goal is to implement God’s Great Commission by sharing the original meaning of Scripture and teaching the Bible through the method of Scripture lectures.') }}
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
            @if($errors->any())
                <div class="alert alert-danger mb-4" role="alert" style="background: linear-gradient(135deg, #fee2e2, #fecaca); border-left: 4px solid #dc2626; border-radius: 12px; padding: 1.25rem;">
                    <div style="display: flex; align-items: start; gap: 1rem;">
                        <i class="fas fa-exclamation-triangle" style="color: #dc2626; font-size: 1.5rem; margin-top: 0.25rem;"></i>
                        <div style="flex: 1;">
                            <strong style="color: #991b1b; font-size: 1.125rem;">Lỗi Tra Cứu</strong>
                            @foreach($errors->all() as $error)
                                <p style="color: #7f1d1d; margin: 0.5rem 0 0 0; line-height: 1.6;">
                                    {{ $error }}
                                </p>
                            @endforeach
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
                <label for="testament" class="form-label">
                    <i class="fas fa-book-open me-2"></i>
                    Chọn Giao Ước
                </label>
                <select class="form-control reference-input" id="testament" name="testament" required>
                    <option value="old" selected>Cựu Ước (Tiếng Do Thái)</option>
                    <option value="new">Tân Ước (Tiếng Hy Lạp)</option>
                </select>
            </div>

            <!-- Book Selector -->
            <div class="mb-4">
                <label for="book" class="form-label">
                    <i class="fas fa-bible me-2"></i>
                    Chọn Sách
                </label>
                <select class="form-control reference-input" id="book" name="book" required>
                    <option value="">-- Chọn sách --</option>
                </select>
            </div>

            <!-- Chapter and Verse Inputs -->
            <div class="row mb-3">
                <div class="col-md-4">
                    <label for="chapter" class="form-label">
                        <i class="fas fa-bookmark me-2"></i>
                        Chương
                    </label>
                    <input
                        type="number"
                        class="form-control reference-input"
                        id="chapter"
                        name="chapter"
                        min="1"
                        placeholder="Vd: 3"
                        autocomplete="off"
                        required
                    >
                </div>
                <div class="col-md-4">
                    <label for="verse_start" class="form-label">
                        <i class="fas fa-arrow-right me-2"></i>
                        Câu bắt đầu (tùy chọn)
                    </label>
                    <input
                        type="number"
                        class="form-control reference-input"
                        id="verse_start"
                        name="verse_start"
                        min="1"
                        placeholder="Bỏ trống = cả chương"
                        autocomplete="off"
                    >
                </div>
                <div class="col-md-4">
                    <label for="verse_end" class="form-label">
                        <i class="fas fa-arrow-left me-2"></i>
                        Câu kết thúc (tùy chọn)
                    </label>
                    <input
                        type="number"
                        class="form-control reference-input"
                        id="verse_end"
                        name="verse_end"
                        min="1"
                        placeholder="Bỏ trống = cả chương"
                        autocomplete="off"
                    >
                </div>
            </div>

            <!-- Hidden field for the formatted reference -->
            <input type="hidden" id="reference" name="reference">

            <!-- Reference Preview -->
            <div class="mb-3" id="referencePreview" style="display: none;">
                <div style="background: #f0f9ff; border-left: 4px solid #0ea5e9; border-radius: 8px; padding: 1rem;">
                    <small style="color: #0369a1; font-weight: 600;">Tham chiếu sẽ tra cứu:</small>
                    <div style="color: #0c4a6e; font-weight: 700; font-size: 1.125rem; margin-top: 0.25rem;" id="referencePreviewText"></div>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-lookup" id="btnLookup">
                <span class="btn-text-normal">
                    <i class="fas fa-search"></i>
                    {{ __t('Tra cứu', 'dictionary') }}
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
        // Bible books data
        const bibleBooks = @json(config('bible_books'));

        // Form elements
        const testamentSelect = document.getElementById('testament');
        const bookSelect = document.getElementById('book');
        const chapterInput = document.getElementById('chapter');
        const verseStartInput = document.getElementById('verse_start');
        const verseEndInput = document.getElementById('verse_end');
        const referenceInput = document.getElementById('reference');
        const form = document.getElementById('lookupForm');
        const btnLookup = document.getElementById('btnLookup');

        // Populate book dropdown based on testament
        function populateBooks(testament) {
            // Clear current options
            bookSelect.innerHTML = '<option value="">-- Chọn sách --</option>';

            // Filter and add books for selected testament
            Object.keys(bibleBooks).forEach(bookName => {
                if (bibleBooks[bookName].testament === testament) {
                    const option = document.createElement('option');
                    option.value = bookName;
                    option.textContent = bookName;
                    bookSelect.appendChild(option);
                }
            });
        }

        // Build reference string from form fields
        function buildReference() {
            const book = bookSelect.value.trim();
            const chapter = chapterInput.value.trim();
            const verseStart = verseStartInput.value.trim();
            const verseEnd = verseEndInput.value.trim();

            if (!book || !chapter) {
                return '';
            }

            // If no verses specified, just "Book Chapter" (entire chapter)
            if (verseStart === '' && verseEnd === '') {
                return `${book} ${chapter}`;
            }

            // If only start verse, "Book Chapter:Start"
            if (verseStart !== '' && verseEnd === '') {
                return `${book} ${chapter}:${verseStart}`;
            }

            // If both verses, "Book Chapter:Start-End"
            if (verseStart !== '' && verseEnd !== '') {
                return `${book} ${chapter}:${verseStart}-${verseEnd}`;
            }

            // Edge case: only end verse specified (treat as start-end with same value)
            if (verseStart === '' && verseEnd !== '') {
                return `${book} ${chapter}:${verseEnd}`;
            }

            return '';
        }

        // Testament change handler
        testamentSelect.addEventListener('change', function() {
            populateBooks(this.value);
            bookSelect.value = '';
            updateReference();
        });

        // Update reference when any field changes
        function updateReference() {
            const ref = buildReference();
            referenceInput.value = ref;

            // Update preview
            const previewDiv = document.getElementById('referencePreview');
            const previewText = document.getElementById('referencePreviewText');

            if (ref) {
                previewText.textContent = ref;
                previewDiv.style.display = 'block';
            } else {
                previewDiv.style.display = 'none';
            }
        }

        bookSelect.addEventListener('change', updateReference);
        chapterInput.addEventListener('input', updateReference);
        verseStartInput.addEventListener('input', updateReference);
        verseEndInput.addEventListener('input', updateReference);

        // Initialize with Old Testament books
        populateBooks('old');

        // Smooth scroll to lookup card on page load if there's an error
        @if($errors->has('lookup_error') || old('reference'))
            setTimeout(function() {
                document.getElementById('lookupCard').scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            }, 100);
        @endif

        // Form validation and submission
        form.addEventListener('submit', function(e) {
            // Build final reference
            updateReference();

            const reference = referenceInput.value.trim();
            const book = bookSelect.value;
            const chapter = chapterInput.value;

            // Debug logging
            console.log('Form submission:', {
                testament: testamentSelect.value,
                book: book,
                chapter: chapter,
                verseStart: verseStartInput.value,
                verseEnd: verseEndInput.value,
                reference: reference
            });

            if (!book) {
                e.preventDefault();
                alert('Vui lòng chọn sách Kinh Thánh.');
                return false;
            }

            if (!chapter) {
                e.preventDefault();
                alert('Vui lòng nhập số chương.');
                return false;
            }

            if (!reference) {
                e.preventDefault();
                alert('Có lỗi khi tạo tham chiếu Kinh Thánh. Vui lòng thử lại.\n\nDebug: Book=' + book + ', Chapter=' + chapter);
                return false;
            }

            // Show loading state and disable only button (disabled inputs won't be submitted!)
            btnLookup.classList.add('loading');
            btnLookup.disabled = true;

            // Visual feedback - make inputs readonly instead of disabled
            testamentSelect.style.opacity = '0.6';
            testamentSelect.style.pointerEvents = 'none';
            bookSelect.style.opacity = '0.6';
            bookSelect.style.pointerEvents = 'none';
            chapterInput.readOnly = true;
            chapterInput.style.opacity = '0.6';
            verseStartInput.readOnly = true;
            verseStartInput.style.opacity = '0.6';
            verseEndInput.readOnly = true;
            verseEndInput.style.opacity = '0.6';

            // Form will submit normally
        });
    });
</script>
@endpush