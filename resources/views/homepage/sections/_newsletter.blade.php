    <!-- Newsletter/CTA Section -->
    <section class="newsletter-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center">
                    <div class="newsletter-content" data-aos="fade-up">
                        <i class="fas fa-envelope-open-text newsletter-icon"></i>
                        <h2 class="newsletter-title">{{ __t('Kết Nối Với Chúng Tôi', 'Stay Connected') }}</h2>
                        <p class="newsletter-description">
                            {{ __t('Đăng ký để nhận các bài viết mới nhất, hiểu biết thần học, và cập nhật được gửi trực tiếp đến hộp thư của bạn.',
                                'Subscribe to receive the latest articles, theological insights, and updates delivered directly to your inbox.') }}
                        </p>

                        <form class="newsletter-form" id="newsletterForm">
                            <input type="text" name="website" style="display: none;" tabindex="-1" autocomplete="off">
                            <div class="input-group">
                                <input type="email"
                                       name="email"
                                       id="newsletterEmail"
                                       class="form-control"
                                       placeholder="{{ __t('Nhập Địa Chỉ Email Của Bạn', 'Enter your email address') }}"
                                       aria-label="Email address"
                                       required>
                                <button class="btn btn-primary" type="submit" id="newsletterBtn">
                                    <span class="btn-text">{{ __t('Kết Nối', 'Subscribe') }}</span>
                                    <span class="btn-loading d-none">
                                        <i class="fas fa-spinner fa-spin"></i>
                                    </span>
                                </button>
                            </div>
                            <div id="newsletterError" class="invalid-feedback d-none mt-2"></div>
                            <small class="form-text">
                                {{ __t('Chúng tôi tôn trọng quyền riêng tư của bạn. Hủy đăng ký bất cứ lúc nào.', 'We respect your privacy. Unsubscribe at any time.') }}
                            </small>
                        </form>

                        <div class="newsletter-success d-none" id="newsletterSuccess">
                            <i class="fas fa-check-circle"></i>
                            <p>{{ __t('Cảm ơn bạn đã đăng ký! Chúng tôi sẽ gửi bạn tin mới nhất.', 'Thank you for subscribing! We will send you the latest updates.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
    <script>
    document.getElementById('newsletterForm').addEventListener('submit', async function(e) {
        e.preventDefault();

        const form = this;
        const emailInput = document.getElementById('newsletterEmail');
        const email = emailInput.value;
        const website = form.querySelector('input[name="website"]').value;
        const btn = document.getElementById('newsletterBtn');
        const btnText = btn.querySelector('.btn-text');
        const btnLoading = btn.querySelector('.btn-loading');
        const errorDiv = document.getElementById('newsletterError');
        const successDiv = document.getElementById('newsletterSuccess');

        // Reset states
        errorDiv.classList.add('d-none');
        emailInput.classList.remove('is-invalid');

        // Show loading
        btnText.classList.add('d-none');
        btnLoading.classList.remove('d-none');
        btn.disabled = true;

        try {
            const response = await fetch('{{ route('subscribe') }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ email, website })
            });

            const data = await response.json();

            if (response.ok && data.success) {
                // Success - hide form, show success message
                form.classList.add('d-none');
                successDiv.classList.remove('d-none');
            } else {
                // Error - show error message
                const errorMessage = data.errors?.email?.[0] || data.message || '{{ __t("Có lỗi xảy ra", "An error occurred") }}';
                errorDiv.textContent = errorMessage;
                errorDiv.classList.remove('d-none');
                emailInput.classList.add('is-invalid');
            }
        } catch (error) {
            errorDiv.textContent = '{{ __t("Có lỗi xảy ra. Vui lòng thử lại.", "An error occurred. Please try again.") }}';
            errorDiv.classList.remove('d-none');
        } finally {
            // Hide loading
            btnText.classList.remove('d-none');
            btnLoading.classList.add('d-none');
            btn.disabled = false;
        }
    });
    </script>
    @endpush
