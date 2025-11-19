<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name'))</title>

    <!-- SEO -->
    <meta name="description" content="@yield('meta_description', 'Modern Christian Statement of Faith')">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;700;900&display=swap" rel="stylesheet">

    <!-- Vite Assets (includes Bootstrap 5.3) -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    @stack('styles')
</head>
<body>
    <!-- HEADER NAVIGATION -->
    <header class="main-header">
        <nav class="navbar">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <span class="brand-icon">✝</span>
                    <span class="brand-text">{{ config('app.name') }}</span>
                </a>

                <button class="navbar-toggler" type="button" aria-label="Toggle navigation" aria-expanded="false">
                    <span class="navbar-toggler-icon">☰</span>
                </button>

                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            {{ app()->getLocale() == 'vi' ? 'Trang Chủ' : 'Home' }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('faith.*') ? 'active' : '' }}" href="{{ route('faith.index') }}">
                            {{ app()->getLocale() == 'vi' ? 'Tuyên Bố Đức Tin' : 'Statement of Faith' }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            {{ app()->getLocale() == 'vi' ? 'Từ Điển' : 'Dictionary' }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            {{ app()->getLocale() == 'vi' ? 'Blog' : 'Blog' }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <div class="language-switcher">
                            <button onclick="switchLanguage('vi')" class="lang-btn {{ app()->getLocale() == 'vi' ? 'active' : '' }}" aria-label="Switch to Vietnamese">
                                🇻🇳
                            </button>
                            <button onclick="switchLanguage('en')" class="lang-btn {{ app()->getLocale() == 'en' ? 'active' : '' }}" aria-label="Switch to English">
                                🇬🇧
                            </button>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <!-- MAIN CONTENT -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="main-footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <div class="footer-brand">
                        <span class="brand-icon">✝</span>
                        <span>{{ config('app.name') }}</span>
                    </div>
                    <p class="footer-description">
                        {{ app()->getLocale() == 'vi'
                            ? 'Tuyên bố những chân lý bất biến của đức tin Cơ Đốc, giúp tín đồ hiểu rõ nền tảng đức tin.'
                            : 'Proclaiming the timeless truths of Christian faith, helping believers understand the foundations of their faith.' }}
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-link" aria-label="Facebook">
                            <svg width="16" height="16" fill="currentColor"><use href="#icon-facebook"/></svg>
                        </a>
                        <a href="#" class="social-link" aria-label="Twitter">
                            <svg width="16" height="16" fill="currentColor"><use href="#icon-twitter"/></svg>
                        </a>
                        <a href="#" class="social-link" aria-label="Instagram">
                            <svg width="16" height="16" fill="currentColor"><use href="#icon-instagram"/></svg>
                        </a>
                    </div>
                </div>

                <div class="footer-column">
                    <h4>{{ app()->getLocale() == 'vi' ? 'Nội Dung' : 'Content' }}</h4>
                    <ul class="footer-links">
                        <li><a href="{{ route('home') }}">{{ app()->getLocale() == 'vi' ? 'Trang Chủ' : 'Home' }}</a></li>
                        <li><a href="{{ route('faith.index') }}">{{ app()->getLocale() == 'vi' ? 'Tuyên Bố Đức Tin' : 'Statement of Faith' }}</a></li>
                        <li><a href="#">{{ app()->getLocale() == 'vi' ? 'Blog' : 'Blog' }}</a></li>
                        <li><a href="#">{{ app()->getLocale() == 'vi' ? 'Từ Điển' : 'Dictionary' }}</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h4>{{ app()->getLocale() == 'vi' ? 'Tài Nguyên' : 'Resources' }}</h4>
                    <ul class="footer-links">
                        <li><a href="#">{{ app()->getLocale() == 'vi' ? 'Câu Hỏi Thường Gặp' : 'FAQ' }}</a></li>
                        <li><a href="#">{{ app()->getLocale() == 'vi' ? 'Tài Liệu' : 'Documentation' }}</a></li>
                        <li><a href="#">{{ app()->getLocale() == 'vi' ? 'Liên Hệ' : 'Contact' }}</a></li>
                        <li><a href="#">{{ app()->getLocale() == 'vi' ? 'Hỗ Trợ' : 'Support' }}</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h4>{{ app()->getLocale() == 'vi' ? 'Pháp Lý' : 'Legal' }}</h4>
                    <ul class="footer-links">
                        <li><a href="#">{{ app()->getLocale() == 'vi' ? 'Chính Sách Bảo Mật' : 'Privacy Policy' }}</a></li>
                        <li><a href="#">{{ app()->getLocale() == 'vi' ? 'Điều Khoản Sử Dụng' : 'Terms of Use' }}</a></li>
                        <li><a href="#">{{ app()->getLocale() == 'vi' ? 'Cookie Policy' : 'Cookie Policy' }}</a></li>
                    </ul>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="footer-bottom-content">
                    <p class="copyright">
                        &copy; {{ date('Y') }} {{ config('app.name') }}. {{ app()->getLocale() == 'vi' ? 'Bản quyền thuộc về chúng tôi.' : 'All rights reserved.' }}
                    </p>
                    <ul class="footer-bottom-links">
                        <li><a href="#">{{ app()->getLocale() == 'vi' ? 'Bảo Mật' : 'Privacy' }}</a></li>
                        <li><a href="#">{{ app()->getLocale() == 'vi' ? 'Điều Khoản' : 'Terms' }}</a></li>
                        <li><a href="#">{{ app()->getLocale() == 'vi' ? 'Sitemap' : 'Sitemap' }}</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <!-- Language Switch Script -->
    <script>
        function switchLanguage(locale) {
            window.location.href = '/language/' + locale;
        }
    </script>

    @stack('scripts')
</body>
</html>
