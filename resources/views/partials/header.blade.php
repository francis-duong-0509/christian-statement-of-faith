<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('uploads/logo/logo_statement_of_faith.png') }}" alt="Statement of Faith" class="site-logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                       href="{{ route('home') }}"
                       data-lang-en="Home"
                       data-lang-vi="Trang Chủ">
                        {{ __t('Trang Chủ', 'Home') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('faith.*') ? 'active' : '' }}"
                       href="{{ route('faith.index') }}"
                       data-lang-en="Statement of Faith"
                       data-lang-vi="Tuyên Bố Đức Tin">
                        {{ __t('Tuyên Bố Đức Tin', 'Statement of Faith') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dictionary*') ? 'active' : '' }}"
                       href="#"
                       data-lang-en="Dictionary"
                       data-lang-vi="Từ Điển">
                        {{ __t('Từ Điển', 'Dictionary') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('scripture-lectures*') ? 'active' : '' }}"
                       href="#"
                       data-lang-en="Scripture Lectures"
                       data-lang-vi="Giảng Giải Kinh">
                        {{ __t('Giảng Giải Kinh', 'Scripture Lectures') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('blog*') ? 'active' : '' }}"
                       href="#">
                        {{ __t('Bài Viết', 'Blog') }}
                    </a>
                </li>
                <!-- Language Switcher -->
                <li class="nav-item dropdown language-switcher">
                    <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button"
                       data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-globe me-1"></i>
                        <span id="currentLang">{{ strtoupper(app()->getLocale()) }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="languageDropdown">
                        <li>
                            <a class="dropdown-item {{ app()->getLocale() == 'en' ? 'active' : '' }}"
                               href="{{ route('language.switch', 'en') }}">
                                <i class="fas fa-check me-2 lang-check" style="opacity: {{ app()->getLocale() == 'en' ? '1' : '0' }}"></i>
                                English
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ app()->getLocale() == 'vi' ? 'active' : '' }}"
                               href="{{ route('language.switch', 'vi') }}">
                                <i class="fas fa-check me-2 lang-check" style="opacity: {{ app()->getLocale() == 'vi' ? '1' : '0' }}"></i>
                                Tiếng Việt
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
