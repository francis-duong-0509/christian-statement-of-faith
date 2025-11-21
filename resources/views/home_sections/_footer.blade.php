    <!-- Footer -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row g-4">
                <!-- About Column -->
                <div class="col-lg-4 col-md-6">
                    <div class="footer-logo mb-3">
                        <i class="fas fa-cross"></i>
                        <span class="footer-brand">{{ __t('Tuyên Bố Đức Tin', 'Statement of Faith') }}</span>
                    </div>
                    <p class="footer-text">
                        {{ __t('Vì Đức Chúa Trời yêu-thương thế-gian, đến nỗi đã ban Con một của Ngài, hầu cho hễ ai tin Con ấy không bị hư-mất mà được sự sống đời đời.',
                           'For God so loved the world that he gave his one and only Son, that whoever believes in him shall not perish but have eternal life.') }}
                    </p>
                    <div class="social-links mt-3">
                        <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" aria-label="Threads"><i class="fab fa-twitter"></i></a>
                        <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>

                <!-- Quick Links Column -->
                <div class="col-lg-4 col-md-6">
                    <h5 class="footer-title">{{ __t('Liên Kết Nhanh', 'Quick Links') }}</h5>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}"><span>{{ __t('Trang Chủ', 'Home') }}</span></a></li>
                        <li><a href="{{ route('faith.index') }}"><span>{{ __t('Tuyên Bố Đức Tin', 'Statement of Faith') }}</span></a></li>
                        <li><a href="/dictionary"><span>{{ __t('Từ Điển', 'Dictionary') }}</span></a></li>
                        <li><a href="/blog"><span>{{ __t('Blog', 'Blog') }}</span></a></li>
                    </ul>
                </div>

                <!-- Contact Column -->
                <div class="col-lg-4 col-md-6">
                    <h5 class="footer-title">{{ __t('Liên Hệ', 'Contact') }}</h5>
                    <ul class="footer-contact">
                        <li>
                            <i class="fas fa-envelope"></i>
                            <a href="mailto:duonganhhao4751@gmail.com">duonganhhao4751@gmail.com</a>
                        </li>
                        <li>
                            <i class="fas fa-phone"></i>
                            <a href="tel:+0904064751">+84 904 064 751</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Copyright -->
            <div class="row mt-5 pt-4 border-top">
                <div class="col-md-6 text-center text-md-start">
                    <p class="copyright mb-0">
                        &copy; 2025 <span>{{ __t('Statement of Faith. Mọi quyền được bảo lưu.', 'Statement of Faith. All rights reserved.') }}</span>
                    </p>
                </div>
            </div>
        </div>
    </footer>
