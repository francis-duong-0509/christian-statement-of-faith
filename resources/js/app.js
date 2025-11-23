/**
 * Statement of Faith Website - Main JavaScript
 * Modern, Interactive Frontend with Alpine.js
 */

// Import Bootstrap
import 'bootstrap';

// Import Alpine.js
import Alpine from 'alpinejs';

// Import modules
import { initNavigation } from './modules/navigation';
import { initSmoothScroll } from './modules/smooth-scroll';
import { initBackToTop } from './modules/back-to-top';
import { initReadingProgress } from './modules/reading-progress';
import { initLazyLoading } from './modules/lazy-loading';
import { initSearch } from './modules/search';
import { initScriptureTooltips } from './modules/scripture-tooltips';
import { initTableOfContents } from './modules/table-of-contents';
import tippy from 'tippy.js';
import 'tippy.js/dist/tippy.css';
import 'tippy.js/themes/light.css';

window.tippy = tippy;

// Make Alpine available globally
window.Alpine = Alpine;

// Initialize Alpine.js
Alpine.start();

// Initialize modules when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    console.log('Statement of Faith Website loaded');

    // Core navigation
    initNavigation();

    // Smooth scrolling
    initSmoothScroll();

    // Back to top button
    initBackToTop();

    // Reading progress bar (for blog posts)
    if (document.querySelector('.blog-post-page')) {
        initReadingProgress();
    }

    // Lazy loading images
    initLazyLoading();

    // Search functionality
    if (document.querySelector('[data-search]')) {
        initSearch();
    }

    // Scripture tooltips
    if (document.querySelector('.scripture-ref')) {
        initScriptureTooltips();
    }

    // Table of contents
    if (document.querySelector('.toc-list')) {
        initTableOfContents();
    }

    // Header scroll effect
    initHeaderScroll();

    // Form validation
    initFormValidation();
});

/**
 * Header Scroll Effect
 * Adds shadow to header when scrolling
 */
function initHeaderScroll() {
    const header = document.querySelector('.main-header');
    if (!header) return;

    let lastScrollTop = 0;
    const scrollThreshold = 50;

    window.addEventListener('scroll', () => {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > scrollThreshold) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }

        lastScrollTop = scrollTop;
    });
}

/**
 * Form Validation
 * Enhanced form validation with custom styles
 */
function initFormValidation() {
    const forms = document.querySelectorAll('.needs-validation');

    forms.forEach(form => {
        form.addEventListener('submit', (event) => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        });
    });
}

// Export for potential external use
export {
    initNavigation,
    initSmoothScroll,
    initBackToTop,
    initReadingProgress,
    initLazyLoading,
    initSearch,
    initScriptureTooltips,
    initTableOfContents
};
