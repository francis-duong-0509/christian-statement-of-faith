/**
 * Navigation Module
 * Handles mobile menu toggle and navigation interactions
 */

export function initNavigation() {
    const navbarToggler = document.querySelector('.navbar-toggler');
    const navbarNav = document.querySelector('.navbar-nav');
    const body = document.body;

    if (!navbarToggler || !navbarNav) return;

    // Toggle mobile menu
    navbarToggler.addEventListener('click', () => {
        const isExpanded = navbarToggler.getAttribute('aria-expanded') === 'true';

        navbarToggler.setAttribute('aria-expanded', !isExpanded);
        navbarNav.classList.toggle('show');
        body.classList.toggle('nav-open');

        // Update icon
        const icon = navbarToggler.querySelector('.navbar-toggler-icon');
        if (icon) {
            icon.textContent = navbarNav.classList.contains('show') ? '✕' : '☰';
        }
    });

    // Close menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!navbarToggler.contains(e.target) && !navbarNav.contains(e.target)) {
            if (navbarNav.classList.contains('show')) {
                navbarToggler.click();
            }
        }
    });

    // Close menu when clicking on a link
    const navLinks = navbarNav.querySelectorAll('.nav-link');
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (window.innerWidth < 992 && navbarNav.classList.contains('show')) {
                navbarToggler.click();
            }
        });
    });

    // Active link highlight based on current path
    const currentPath = window.location.pathname;
    navLinks.forEach(link => {
        if (link.getAttribute('href') === currentPath) {
            link.classList.add('active');
        }
    });

    // Dropdown menus
    const dropdowns = document.querySelectorAll('.dropdown');
    dropdowns.forEach(dropdown => {
        const toggle = dropdown.querySelector('.dropdown-toggle');
        const menu = dropdown.querySelector('.dropdown-menu');

        if (toggle && menu) {
            toggle.addEventListener('click', (e) => {
                e.preventDefault();
                menu.classList.toggle('show');
            });
        }
    });
}
