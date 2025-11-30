{{-- resources/views/partials/scripture-modal.blade.php --}}

{{-- Inline CSS - Critical Styles Loaded Here --}}
<style>
/* SCRIPTURE MODAL - CRITICAL STYLES */
/* Brand Color: #264975 (Website Tone) */

#scriptureWelcomeModal .modal-dialog {
    max-width: 900px !important;
}

.scripture-modal-modern {
    border: none !important;
    border-radius: 20px !important;
    overflow: hidden !important;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3) !important;
    position: relative !important;
}

/* Close Button - Fixed */
.btn-close-modern {
    position: absolute !important;
    top: 10px !important;
    right: 10px !important;
    width: 40px !important;
    height: 40px !important;
    border-radius: 50% !important;
    background-color: rgba(255, 255, 255, 0.95) !important;
    border: 2px solid #264975 !important;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15) !important;
    z-index: 1070 !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    cursor: pointer !important;
    transition: all 0.25s ease !important;
    padding: 0 !important;
    margin: 0 !important;
}

.btn-close-modern i {
    font-size: 18px !important;
    color: #264975 !important;
    line-height: 1 !important;
}

.btn-close-modern:hover {
    background-color: #264975 !important;
    border-color: #264975 !important;
    transform: scale(1.08) rotate(90deg) !important;
    box-shadow: 0 4px 12px rgba(38, 73, 117, 0.3) !important;
}

.btn-close-modern:hover i {
    color: #ffffff !important;
}

/* Image Section */
.scripture-image-wrapper {
    position: relative !important;
    min-height: 500px !important;
    background: #264975 !important;
    overflow: hidden !important;
}

.scripture-image {
    width: 100% !important;
    height: 100% !important;
    object-fit: cover !important;
    object-position: center !important;
}

.scripture-image-overlay {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    right: 0 !important;
    bottom: 0 !important;
    background: linear-gradient(to bottom, rgba(38, 73, 117, 0.1) 0%, rgba(38, 73, 117, 0.3) 100%) !important;
    z-index: 1 !important;
}

.image-caption {
    position: absolute !important;
    bottom: 0 !important;
    left: 0 !important;
    right: 0 !important;
    padding: 22px !important;
    background: rgba(38, 73, 117, 0.85) !important;
    backdrop-filter: blur(10px) !important;
    color: #ffffff !important;
    z-index: 2 !important;
    display: flex !important;
    align-items: center !important;
    gap: 12px !important;
    font-size: 16px !important;
    font-weight: 500 !important;
}

.image-caption i {
    font-size: 22px !important;
    opacity: 0.9 !important;
}

/* Content Section - Bigger Text */
.scripture-content-wrapper {
    padding: 50px 45px !important;
    background: #ffffff !important;
    display: flex !important;
    flex-direction: column !important;
    gap: 30px !important;
}

/* Scripture Badge - Brand Color */
.scripture-badge {
    display: inline-flex !important;
    align-items: center !important;
    gap: 10px !important;
    background: #264975 !important;
    color: #ffffff !important;
    padding: 12px 24px !important;
    border-radius: 25px !important;
    font-size: 17px !important;
    font-weight: 600 !important;
    width: fit-content !important;
    box-shadow: 0 4px 12px rgba(38, 73, 117, 0.3) !important;
}

.scripture-badge i {
    font-size: 18px !important;
}

/* Verse Text - PROMINENT & HIGHLIGHTED */
.scripture-verse-text {
    position: relative !important;
    padding: 28px 32px !important;
    background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%) !important;
    border-radius: 12px !important;
    border-left: 5px solid #264975 !important;
    box-shadow: 0 4px 15px rgba(38, 73, 117, 0.12) !important;
}

.quote-icon {
    position: absolute !important;
    top: 10px !important;
    left: 15px !important;
    font-size: 55px !important;
    color: #264975 !important;
    opacity: 0.08 !important;
    z-index: 0 !important;
}

.scripture-verse-text p {
    font-family: Georgia, 'Times New Roman', serif !important;
    font-size: 22px !important;
    line-height: 2.1 !important;
    color: #1a1a1a !important;
    font-style: italic !important;
    font-weight: 500 !important;
    margin: 0 !important;
    position: relative !important;
    z-index: 1 !important;
    text-shadow: 0 1px 2px rgba(255, 255, 255, 0.8) !important;
}

/* Theological Insight - Brand Color Accent */
.theological-insight {
    display: flex !important;
    gap: 20px !important;
    background: #f8f9fa !important;
    padding: 28px !important;
    border-radius: 12px !important;
    border-left: 4px solid #264975 !important;
}

.insight-icon {
    flex-shrink: 0 !important;
    width: 45px !important;
    height: 45px !important;
    background: #264975 !important;
    border-radius: 50% !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    color: #ffffff !important;
    font-size: 20px !important;
}

.insight-content h6 {
    font-size: 18px !important;
    font-weight: 700 !important;
    color: #264975 !important;
    margin: 0 0 12px 0 !important;
}

.insight-content p {
    font-size: 16px !important;
    line-height: 1.8 !important;
    color: #495057 !important;
    margin: 0 !important;
}

/* Footer Button - Brand Color */
.modal-footer-custom {
    margin-top: auto !important;
    padding-top: 24px !important;
    border-top: 1px solid #e9ecef !important;
    text-align: center !important;
}

.btn-visit-website {
    display: inline-flex !important;
    align-items: center !important;
    gap: 10px !important;
    background: #264975 !important;
    color: #ffffff !important;
    padding: 12px 28px !important;
    font-size: 16px !important;
    font-weight: 600 !important;
    border-radius: 25px !important;
    cursor: pointer !important;
    transition: all 0.3s ease !important;
    box-shadow: 0 4px 12px rgba(38, 73, 117, 0.3) !important;
    outline: none !important;
}

.btn-visit-website:hover {
    background: #1e3a5f !important;
    transform: translateY(-2px) !important;
    box-shadow: 0 6px 20px rgba(38, 73, 117, 0.4) !important;
    color: #ffffff !important;
}

.btn-visit-website:active {
    transform: translateY(0) !important;
}

.btn-visit-website i {
    font-size: 14px !important;
    transition: transform 0.3s ease !important;
}

.btn-visit-website:hover i {
    transform: translateX(4px) !important;
}

/* Responsive - Tablet */
@media (max-width: 991px) {
    .scripture-image-wrapper {
        min-height: 350px !important;
    }

    .scripture-content-wrapper {
        padding: 40px 35px !important;
    }

    .scripture-verse-text {
        padding: 24px 28px !important;
    }

    .scripture-verse-text p {
        font-size: 20px !important;
        line-height: 2 !important;
    }

    .btn-close-modern {
        width: 38px !important;
        height: 38px !important;
    }

    .btn-close-modern i {
        font-size: 16px !important;
    }
}

/* Responsive - Mobile */
@media (max-width: 767px) {
    #scriptureWelcomeModal .modal-dialog {
        margin: 10px !important;
    }

    .scripture-modal-modern {
        border-radius: 15px !important;
    }

    .btn-close-modern {
        top: 8px !important;
        right: 8px !important;
        width: 36px !important;
        height: 36px !important;
        border-width: 2px !important;
    }

    .btn-close-modern i {
        font-size: 16px !important;
    }

    .scripture-image-wrapper {
        min-height: 250px !important;
    }

    .scripture-content-wrapper {
        padding: 30px 25px !important;
        gap: 24px !important;
    }

    .scripture-badge {
        font-size: 15px !important;
        padding: 10px 18px !important;
    }

    .scripture-verse-text {
        padding: 22px 24px !important;
    }

    .scripture-verse-text p {
        font-size: 19px !important;
        line-height: 1.95 !important;
        font-weight: 500 !important;
    }

    .quote-icon {
        font-size: 45px !important;
    }

    .theological-insight {
        padding: 20px !important;
        gap: 16px !important;
    }

    .insight-icon {
        width: 40px !important;
        height: 40px !important;
        font-size: 18px !important;
    }

    .insight-content h6 {
        font-size: 16px !important;
    }

    .insight-content p {
        font-size: 15px !important;
    }

    .btn-visit-website {
        font-size: 15px !important;
        padding: 11px 24px !important;
    }

    .image-caption {
        font-size: 14px !important;
        padding: 18px !important;
    }
}
</style>

<!-- Scripture Modal - Jeremiah 2:13 -->
<div class="modal fade" id="scriptureWelcomeModal" tabindex="-1" aria-labelledby="scriptureModalLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content scripture-modal-modern">

            {{-- Close Button - Positioned Outside Modal --}}
            <button type="button" class="btn-close-modern" data-bs-dismiss="modal" aria-label="Close">
                <i class="fas fa-times"></i>
            </button>

            <div class="modal-body p-0">
                <div class="row g-0">

                    {{-- LEFT: Image Column with Overlay --}}
                    <div class="col-lg-5 scripture-image-wrapper">
                        <div class="scripture-image-overlay"></div>
                        <img src="{{ asset('uploads/images/sinner-prayer.jpg') }}"
                             alt="Sinner's Prayer"
                             class="scripture-image">
                    </div>

                    {{-- RIGHT: Content Column --}}
                    <div class="col-lg-7 scripture-content-wrapper">

                        {{-- Scripture Reference Badge --}}
                        <div class="scripture-badge">
                            <i class="fas fa-book-bible"></i>
                            <span>{{ app()->getLocale() === 'vi' ? 'Jeremiah 2:13' : 'Jeremiah 2:13' }}</span>
                        </div>

                        {{-- Verse Text --}}
                        <div class="scripture-verse-text">
                            <p>
                                @if(app()->getLocale() === 'vi')
                                    Dân ta đã làm hai điều ác: chúng nó đã lìa bỏ ta, là nguồn nước sống, mà tự đào lấy hồ, thật, hồ nứt ra, không chứa nước được.
                                @else
                                    For my people have committed two evils: they have forsaken me, the fountain of living waters, and hewed out cisterns for themselves, broken cisterns that can hold no water.
                                @endif
                            </p>
                        </div>

                        {{-- Theological Insight --}}
                        <div class="theological-insight">
                            <div class="insight-icon">
                                <i class="fas fa-cross"></i>
                            </div>
                            <div class="insight-content">
                                <h6>{{ __t('Bản Chất Tội Lỗi Của Con Người Là Họ Đã Phạm 2 Điều Trên', 'The Sinful Nature of Man') }}</h6>
                                <p>
                                    @if(app()->getLocale() === 'vi')
                                        <span><a target="_blank" href="https://vietchristian.com/kinhthanh/tim.asp?btt/44/1:18-3:20" style="color: #0c63d4; font-weight: 600; text-decoration: underline; font-size: 20px;">Roma 1:18-3:20</a> là hồ sơ của kẻ Tử Tù, miêu tả bản chất tội lỗi của con người mà họ đã liên tục phạm (hành dâm 5 7 lần, giết người,...), và chỉ có đức tin + sự ăn năn là ân điển của Đức Chúa Trời ban cho để được cứu rỗi.</span>
                                    @else
                                        <span><a target="_blank" href="https://www.biblegateway.com/passage/?search=Romans%201%3A18-3%3A20&version=NIV" style="color: #0c63d4; font-weight: 600; text-decoration: underline; font-size: 20px;">Roma 1:18-3:20</a> is a summary of the sinful nature of man, describing the essence of sin that they have committed, and only faith + repentance are the gift of God to save.</span>
                                    @endif
                                </p>
                            </div>
                        </div>

                        {{-- Small CTA Button --}}
                        <div class="modal-footer-custom">
                            <button type="button" class="btn-visit-website" id="visitWebsiteBtn">
                                {{ __t('God Bless You', 'God Bless You') }}
                                <i class="fas fa-arrow-right ms-2"></i>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Auto-Show JavaScript Logic --}}
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // STEP 1: Check if we're on the homepage
    const isHomepage = window.location.pathname === '/' ||
                       window.location.pathname === '/vi' ||
                       window.location.pathname === '/en';

    if (!isHomepage) {
        return; // Exit early if not homepage
    }

    // STEP 2: Check sessionStorage flag
    const hasSeenModal = sessionStorage.getItem('scripture_modal_seen');

    // STEP 3: Get modal instance using Bootstrap 5 API
    const modalElement = document.getElementById('scriptureWelcomeModal');
    const modal = new bootstrap.Modal(modalElement);

    // STEP 4: Show modal if NOT seen in this session
    if (!hasSeenModal) {
        // Small delay for better UX (let page load first)
        setTimeout(function() {
            modal.show();
        }, 800); // 800ms = 0.8 seconds
    }

    // STEP 5: Handle "Visit Website" button click
    const visitBtn = document.getElementById('visitWebsiteBtn');
    if (visitBtn) {
        visitBtn.addEventListener('click', function() {
            // Set flag in sessionStorage
            sessionStorage.setItem('scripture_modal_seen', 'true');

            // Close the modal
            modal.hide();
        });
    }

    // OPTIONAL: Also set flag when user clicks close button (X)
    modalElement.addEventListener('hidden.bs.modal', function() {
        sessionStorage.setItem('scripture_modal_seen', 'true');
    });
});
</script>
@endpush
