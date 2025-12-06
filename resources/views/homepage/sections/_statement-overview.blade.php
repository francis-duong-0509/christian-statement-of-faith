<section class="statement-overview-section py-5" id="statement-of-faith">
    <div class="container">
        <!-- Section Header -->
        <div class="row text-center mb-5">
            <div class="col-lg-10 mx-auto">
                <h2 class="section-title-main" data-aos="fade-up">
                    {{ __t('Tôi Tin Điều Gì ?', 'What We Believe') }}
                </h2>
                <p class="section-intro" data-aos="fade-up" data-aos-delay="100">
                    {{ __t('Đức tin thật cốt lõi dựa trên Kinh Thánh', 'Core theological convictions grounded in Scripture') }}
                </p>
            </div>
        </div>

        <!-- Statement Items Grid -->
        <div class="row g-4">
            @foreach($categories as $category)
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="statement-item">
                        <div class="statement-number">{{ $category->order }}</div>
                        <h3 class="statement-title">
                            <span>{{ $category->name }}</span>
                        </h3>
                        <p class="statement-description">
                            {{ $category->description }}
                        </p>
                        <div class="scripture-references">
                            <i class="fas fa-book-bible"></i>
                            <div class="scripture-list">
                                @if($category->hasScriptureReferences())
                                    @foreach($category->scripture_references as $scripture)
                                        <button
                                            type="button"
                                            class="scripture-ref-btn"
                                            data-tippy-content="{{ $scripture['text'] ?? '' }}"
                                            data-ref="{{ $scripture['ref'] ?? '' }}"
                                        >
                                            {{ $scripture['ref'] ?? '' }}
                                        </button>{{ !$loop->last ? ',' : '' }}
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- CTA Button -->
        <div class="row mt-5">
            <div class="col text-center" data-aos="fade-up" data-aos-delay="700">
                <a href="{{ route('faith.index') }}" class="btn btn-primary btn-lg">
                    <span>
                        {{ __t('Đọc Tuyên Bố Đức Tin Đầy Đủ', 'Read Complete Statement of Faith') }}
                    </span>
                    <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </div>
</section>

{{-- Scripture Reference Button Styles --}}
@push('styles')
<style>
/* Scripture Reference Buttons - Enhanced */
.scripture-ref-btn {
    display: inline-block;
    background: linear-gradient(135deg, #0c63d4 0%, #0a52b0 100%);
    border: none;
    color: #ffffff;
    font-size: 14px;
    font-weight: 600;
    font-style: normal;
    padding: 6px 14px;
    margin: 3px 4px;
    border-radius: 20px;
    text-decoration: none;
    cursor: help;
    transition: all 0.3s ease;
    position: relative;
    box-shadow: 0 2px 8px rgba(12, 99, 212, 0.25);
    line-height: 1.4;
}

.scripture-ref-btn:hover {
    background: linear-gradient(135deg, #0a52b0 0%, #083d85 100%);
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(12, 99, 212, 0.4);
    color: #ffffff;
}

.scripture-ref-btn:focus {
    outline: 3px solid rgba(12, 99, 212, 0.5);
    outline-offset: 2px;
}

.scripture-ref-btn:active {
    transform: translateY(0);
}

/* Custom Tippy Tooltip Styling for Homepage - Desktop Extra Large */
.tippy-box[data-theme~='custom-scripture'] {
    background: linear-gradient(135deg, #1e3a5f 0%, #2d5a8a 100%);
    color: #ffffff;
    font-size: 20px;
    line-height: 2;
    padding: 32px 40px;
    border-radius: 16px;
    box-shadow: 0 15px 60px rgba(0, 0, 0, 0.4),
                0 0 0 1px rgba(255, 255, 255, 0.15) inset;
    max-width: 700px;
    font-family: Georgia, 'Times New Roman', serif;
    font-weight: 400;
}

.tippy-box[data-theme~='custom-scripture'] .tippy-content {
    font-style: normal;
    text-align: left;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.2);
}

.tippy-box[data-theme~='custom-scripture'] .tippy-arrow {
    color: #1e3a5f;
}

.tippy-box[data-theme~='custom-scripture'][data-placement^='top'] > .tippy-arrow::before {
    border-top-color: #1e3a5f;
}

.tippy-box[data-theme~='custom-scripture'][data-placement^='bottom'] > .tippy-arrow::before {
    border-bottom-color: #1e3a5f;
}

.tippy-box[data-theme~='custom-scripture'][data-placement^='left'] > .tippy-arrow::before {
    border-left-color: #1e3a5f;
}

.tippy-box[data-theme~='custom-scripture'][data-placement^='right'] > .tippy-arrow::before {
    border-right-color: #1e3a5f;
}

/* Mobile Responsive */
@media (max-width: 767px) {
    .scripture-ref-btn {
        font-size: 13px;
        padding: 5px 12px;
        margin: 2px 3px;
    }

    .tippy-box[data-theme~='custom-scripture'] {
        font-size: 15px;
        padding: 16px 20px;
        max-width: calc(100vw - 40px);
    }
}
</style>
@endpush

{{-- Scripture Reference Tooltip JavaScript --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Tippy.js for scripture references with custom theme
    if (typeof tippy !== 'undefined') {
        tippy('.scripture-ref-btn', {
            theme: 'custom-scripture',
            placement: 'top',
            arrow: true,
            animation: 'scale',
            duration: [350, 250],
            maxWidth: 700,
            interactive: false,
            trigger: 'mouseenter focus click',
            hideOnClick: true,
            allowHTML: false,
            offset: [0, 14],
            zIndex: 9999,
        });
    } else {
        console.warn('Tippy.js not loaded. Scripture tooltips will not work.');
    }
});
</script>
@endpush
