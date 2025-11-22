<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" id="html-root">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="description"
          content="@yield('meta_description', 'Biblical Theology - Comprehensive resources on biblical doctrine, theological dictionary, and insightful biblical teachings rooted in Scripture alone.')">
    <title>@yield('title', config('app.name'))</title>
    <link rel="icon" type="image/jpg" sizes="32x32" href="{{ asset('favicon_main.png') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">

    @stack('styles')
    @stack('head')
</head>
<body>
@include('partials.header')

<!-- MAIN CONTENT -->
<main>
    @yield('content')
</main>

@include('partials.footer')
@include('partials.floating-buttons')
@include('partials.donate-modal')

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- AOS Animation -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<!-- Alpine.js -->
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js"></script>

<script src="{{ asset('js/custom.js') }}"></script>

<!-- Custom Scripts -->
<script>
    // Initialize AOS
    AOS.init({
        duration: 800,
        easing: 'ease-in-out',
        once: true,
        mirror: false
    });

    // Language Switcher
    function switchLanguage(locale) {
        window.location.href = '/language/' + locale;
    }

    // Mobile Menu Toggle
    document.addEventListener('DOMContentLoaded', function () {
        const toggler = document.querySelector('.navbar-toggler');
        const navbarNav = document.querySelector('.navbar-nav');

        if (toggler && navbarNav) {
            toggler.addEventListener('click', function () {
                navbarNav.classList.toggle('show');
                const expanded = this.getAttribute('aria-expanded') === 'true';
                this.setAttribute('aria-expanded', !expanded);
            });
        }
    });
</script>

@stack('scripts')
</body>
</html>
