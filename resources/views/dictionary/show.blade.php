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

    /* Result Hero - Compact */
    .result-hero {
        background: var(--primary);
        padding: 2.5rem 0;
        margin-bottom: 2.5rem;
    }

    .result-hero-content {
        color: var(--white);
    }

    .testament-badge {
        display: inline-block;
        background: rgba(255, 255, 255, 0.15);
        padding: 0.375rem 0.875rem;
        border-radius: 6px;
        font-size: 0.8125rem;
        font-weight: 500;
        margin-bottom: 1rem;
    }

    .result-hero h1 {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.75rem;
        line-height: 1.3;
    }

    .verse-meta {
        display: flex;
        align-items: center;
        gap: 1.5rem;
        font-size: 0.9375rem;
        opacity: 0.9;
        flex-wrap: wrap;
    }

    .verse-range-display,
    .verse-count-badge {
        display: flex;
        align-items: center;
        gap: 0.5rem;
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

    /* Section Headers in Exegesis */
    .exegesis-section {
        margin-bottom: 3rem;
    }

    .exegesis-section:last-child {
        margin-bottom: 0;
    }

    .exegesis-section-header {
        margin-bottom: 1.75rem;
    }

    .exegesis-section-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--primary);
        margin: 0 0 0.5rem 0;
        font-family: 'Merriweather', serif;
        position: relative;
        display: inline-block;
    }

    .exegesis-section-title::after {
        content: '';
        position: absolute;
        bottom: -8px;
        left: 0;
        width: 60px;
        height: 4px;
        background: linear-gradient(90deg, var(--primary), var(--secondary));
        border-radius: 2px;
    }

    .exegesis-section-content {
        padding-left: 0;
    }

    /* Bullet Points - Term Definitions */
    .exegesis-bullet {
        margin-bottom: 1.5rem;
        padding-left: 0;
    }

    .exegesis-bullet-term {
        font-weight: 700;
        color: var(--secondary);
        font-size: 1.125rem;
        margin-bottom: 0.75rem;
        font-family: 'Merriweather', serif;
    }

    .exegesis-bullet-text {
        color: #374151;
        line-height: 1.8;
        margin-bottom: 1rem;
        padding-left: 1.5rem;
    }

    .exegesis-bullet-text strong {
        font-weight: 700;
        color: var(--primary);
    }

    /* Numbered Lists - Theological Points */
    .exegesis-numbered {
        counter-reset: exegesis-counter;
        list-style: none;
        padding-left: 0;
        margin-top: 1.5rem;
    }

    .exegesis-numbered-item {
        counter-increment: exegesis-counter;
        margin-bottom: 2rem;
        position: relative;
        padding-left: 4rem;
    }

    .exegesis-numbered-item::before {
        content: counter(exegesis-counter);
        position: absolute;
        left: 0;
        top: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 48px;
        height: 48px;
        background: var(--primary);
        color: white;
        border-radius: 12px;
        font-weight: 800;
        font-size: 1.25rem;
        flex-shrink: 0;
        box-shadow: 0 4px 16px rgba(30, 58, 95, 0.2);
    }

    .exegesis-numbered-title {
        font-weight: 700;
        color: var(--primary);
        font-size: 1.125rem;
        margin-bottom: 0.75rem;
        font-family: 'Merriweather', serif;
    }

    .exegesis-numbered-text {
        color: #4b5563;
        line-height: 1.9;
    }

    /* Paragraph Text */
    .exegesis-paragraph {
        color: #4b5563;
        line-height: 1.9;
        margin-bottom: 1.5rem;
    }

    /* Conclusion Section */
    .exegesis-conclusion {
        background: #f8f9fa;
        border-radius: 16px;
        padding: 2.5rem;
        margin-top: 3rem;
        position: relative;
        overflow: hidden;
    }

    .exegesis-conclusion::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 6px;
        height: 100%;
        background: linear-gradient(180deg, var(--primary), var(--secondary));
    }

    .exegesis-conclusion-header {
        margin-bottom: 1.25rem;
    }

    .exegesis-conclusion-title {
        font-size: 1.5rem;
        font-weight: 800;
        color: var(--primary);
        margin: 0;
        font-family: 'Merriweather', serif;
    }

    .exegesis-conclusion-text {
        color: #374151;
        line-height: 1.9;
        font-size: 1.0625rem;
        margin: 0;
    }

    /* Strong/Bold Text */
    .exegesis-content strong {
        color: var(--primary);
        font-weight: 700;
    }

    /* Responsive adjustments */
    @media (max-width: 767px) {
        .exegesis-section-title {
            font-size: 1.25rem;
        }

        .exegesis-numbered-item {
            padding-left: 3.5rem;
        }

        .exegesis-numbered-item::before {
            width: 40px;
            height: 40px;
            font-size: 1.125rem;
        }

        .exegesis-conclusion {
            padding: 2rem 1.75rem 2rem 2rem;
        }
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
            padding: 2rem 0;
        }

        .result-hero h1 {
            font-size: 1.5rem;
        }

        .verse-meta {
            font-size: 0.875rem;
            gap: 1rem;
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

        .exegesis-section-title {
            font-size: 1.25rem;
        }

        .exegesis-numbered-item {
            padding-left: 3.5rem;
        }

        .exegesis-numbered-item::before {
            width: 40px;
            height: 40px;
            font-size: 1.125rem;
        }

        .exegesis-conclusion {
            padding: 2rem 1.75rem 2rem 2rem;
        }
    }
</style>
@endpush

@section('content')

<div class="container my-3">
    <x-breadcrumb :items="[
        ['url' => route('home'), 'label' => __t('Trang Chủ', 'Home')],
        ['label' => __t('Tuyên Bố Đức Tin', 'Statement of Faith')],
        ['label' => $reference]
    ]" />
</div>

<!-- Result Hero -->
<section class="result-hero">
    <div class="container">
        <div class="result-hero-content" data-aos="fade-up">
            <div class="testament-badge">
                @if($testament === 'old')
                    Cựu Ước
                @else
                    Tân Ước
                @endif
            </div>
            <h1 class="text-white">{{ $reference }}</h1>

            <div class="verse-meta">
                <div class="verse-count-badge">
                    <i class="fas fa-list-ol"></i>
                    <span class="text-white">{{ $verseCount }} câu</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Content -->
<div class="container">
    <!-- Vietnamese Text Section -->
    <div class="content-section" data-aos="fade-up" data-aos-delay="100">
        <div class="content-card">
            <div class="card-header-custom">
                <div class="card-icon">
                    <i class="fas fa-book-open"></i>
                </div>
                <h2 class="card-title">Bản Dịch Tiếng Việt</h2>
                <span class="card-label">Kinh Thánh 1925</span>
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

        // Format exegesis content beautifully
        formatExegesis();
    });

    // Format exegesis with sections, bullets, and numbered lists
    function formatExegesis() {
        const exegesis = document.querySelector('.exegesis-content');
        if (!exegesis) return;

        // Get the raw text content
        let text = exegesis.textContent;

        // Split by line breaks
        const lines = text.split('\n');
        let html = '';
        let currentSection = null;
        let currentSectionContent = '';
        let inNumberedList = false;
        let numberedItems = [];

        for (let i = 0; i < lines.length; i++) {
            const line = lines[i].trim();

            if (!line) continue;

            // Check if this is a section header (starts with **)
            if (line.startsWith('**') && line.endsWith('**')) {
                // Close any open numbered list
                if (inNumberedList) {
                    currentSectionContent += formatNumberedList(numberedItems);
                    numberedItems = [];
                    inNumberedList = false;
                }

                // Close previous section if exists
                if (currentSection) {
                    currentSectionContent += '</div></div>';
                    html += currentSectionContent;
                }

                // Extract section title
                const title = line.replace(/\*\*/g, '');

                // Check if this is the conclusion
                if (title === 'Kết Luận') {
                    currentSection = 'conclusion';
                    currentSectionContent = `
                        <div class="exegesis-conclusion">
                            <div class="exegesis-conclusion-header">
                                <h3 class="exegesis-conclusion-title">${title}</h3>
                            </div>
                            <div class="exegesis-conclusion-content">
                    `;
                } else {
                    currentSection = 'regular';
                    currentSectionContent = `
                        <div class="exegesis-section">
                            <div class="exegesis-section-header">
                                <h3 class="exegesis-section-title">${title}</h3>
                            </div>
                            <div class="exegesis-section-content">
                    `;
                }
            }
            // Check if this is a bullet point (starts with •)
            else if (line.startsWith('•')) {
                const bulletContent = line.substring(1).trim();

                // Check if it has a term definition (contains **)
                const termMatch = bulletContent.match(/\*\*"?([^"*]+)"?\*\*\s*(\([^)]+\))?:\s*(.+)/);
                if (termMatch) {
                    const term = termMatch[1];
                    const transliteration = termMatch[2] || '';
                    let definition = termMatch[3];

                    // Convert **text** to <strong>text</strong> in the definition
                    definition = definition.replace(/\*\*([^*]+)\*\*/g, '<strong>$1</strong>');

                    currentSectionContent += `
                        <div class="exegesis-bullet">
                            <div class="exegesis-bullet-term">"${term}" ${transliteration}</div>
                            <div class="exegesis-bullet-text">${definition}</div>
                        </div>
                    `;
                } else {
                    currentSectionContent += `<p class="exegesis-paragraph">${bulletContent}</p>`;
                }
            }
            // Check if this is a numbered list item (starts with digit.)
            else if (/^\d+\.\s/.test(line)) {
                inNumberedList = true;

                // Extract number, title, and content
                const match = line.match(/^(\d+)\.\s+\*\*([^*]+)\*\*:\s*(.+)/);
                if (match) {
                    numberedItems.push({
                        title: match[2],
                        content: match[3]
                    });
                } else {
                    // Just a regular numbered item without bold title
                    const simpleMatch = line.match(/^\d+\.\s+(.+)/);
                    if (simpleMatch) {
                        numberedItems.push({
                            title: '',
                            content: simpleMatch[1]
                        });
                    }
                }
            }
            // Regular paragraph
            else {
                // Close numbered list if open
                if (inNumberedList) {
                    currentSectionContent += formatNumberedList(numberedItems);
                    numberedItems = [];
                    inNumberedList = false;
                }

                // Handle bold text within paragraphs
                const formattedLine = line.replace(/\*\*([^*]+)\*\*/g, '<strong>$1</strong>');
                currentSectionContent += `<p class="exegesis-paragraph">${formattedLine}</p>`;
            }
        }

        // Close any remaining numbered list
        if (inNumberedList) {
            currentSectionContent += formatNumberedList(numberedItems);
        }

        // Close final section
        if (currentSection) {
            currentSectionContent += '</div></div>';
            html += currentSectionContent;
        }

        // Update the exegesis content
        exegesis.innerHTML = html;
    }

    function formatNumberedList(items) {
        if (items.length === 0) return '';

        let html = '<div class="exegesis-numbered">';
        items.forEach(item => {
            html += `
                <div class="exegesis-numbered-item">
                    ${item.title ? `<div class="exegesis-numbered-title">${item.title}</div>` : ''}
                    <div class="exegesis-numbered-text">${item.content}</div>
                </div>
            `;
        });
        html += '</div>';
        return html;
    }

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
