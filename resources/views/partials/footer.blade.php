<!-- Footer -->
<footer class="footer py-5">
    <div class="container">
        <div class="row g-4">
            <!-- About Column -->
            <div class="col-lg-4 col-md-6">
                <div class="footer-logo mb-3">
                    <a class="navbar-brand" href="/" style="display: flex; align-items: center; gap: 0.5rem; text-decoration: none;">
                        <span style="font-family: 'Playfair Display', Georgia, serif; font-size: 1.5rem; font-weight: 700; color: white; letter-spacing: -0.02em;">Only by Grace</span>
                    </a>
                </div>
                <p class="footer-text">
                    {{ __t('Vi Duc Chua Troi yeu-thuong the-gian, den noi da ban Con mot cua Ngai, hau cho he ai tin Con ay khong bi hu-mat ma duoc su song doi doi.',
                       'For God so loved the world that he gave his one and only Son, that whoever believes in him shall not perish but have eternal life.') }}
                </p>
                <div class="social-links mt-3">
                    <a href="https://www.facebook.com/francis.duong.0509" aria-label="Facebook" target="_blank"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.threads.com/@francis.duong.0509" aria-label="Threads" target="_blank"><i class="fab fa-twitter"></i></a>
                </div>
            </div>

            <!-- Quick Links Column -->
            <div class="col-lg-2 col-md-6">
                <h5 class="footer-title">{{ __t('Lien Ket Nhanh', 'Quick Links') }}</h5>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}"><span>{{ __t('Trang Chu', 'Home') }}</span></a></li>
                    <li><a href="{{ route('faith.index') }}"><span>{{ __t('Tuyen Bo Duc Tin', 'Statement of Faith') }}</span></a></li>
                    <li><a href="{{ route('dictionary.index') }}"><span>{{ __t('Tu Dien', 'Dictionary') }}</span></a></li>
                    <li><a href="{{ route('blog.index') }}"><span>{{ __t('Blog', 'Blog') }}</span></a></li>
                </ul>
            </div>

            <!-- Contact Column -->
            <div class="col-lg-3 col-md-6">
                <h5 class="footer-title">{{ __t('Lien He', 'Contact') }}</h5>
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
                    &copy; 2025 <span>{{ __t('Only by Grace. Moi quyen duoc bao luu.', 'Only by Grace. All rights reserved.') }}</span>
                </p>
            </div>
        </div>
    </div>
</footer>