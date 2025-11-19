/**
 * Custom JavaScript for Reformed Faith Website
 * Handles interactive features, animations, UX enhancements, and multi-language support
 */

(function() {
    'use strict';

    // ==================== DOM ELEMENTS ====================
    const navbar = document.getElementById('mainNav');
    const scrollTopBtn = document.getElementById('scrollTop');
    const newsletterForm = document.getElementById('newsletterForm');
    const scrollIndicator = document.querySelector('.scroll-indicator');

    // Language switcher elements
    const languageDropdown = document.getElementById('languageDropdown');
    const currentLangDisplay = document.getElementById('currentLang');
    const languageItems = document.querySelectorAll('.language-switcher .dropdown-item');

    // ==================== INITIALIZATION ====================
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize AOS (Animate On Scroll)
        initAOS();

        // Setup event listeners
        setupScrollHandlers();
        setupNewsletterForm();
        setupMobileMenu();
        setupScrollIndicator();
        setupSmoothScroll();
        setupLanguageSwitcher();

        console.log('Reformed Faith Website - Initialized successfully');
    });

    // ==================== AOS INITIALIZATION ====================
    /**
     * Initialize AOS library for scroll animations
     */
    function initAOS() {
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 1000,
                easing: 'ease-out-cubic',
                once: true,
                offset: 100,
                delay: 0
            });
        }
    }

    // ==================== LANGUAGE SWITCHER ====================
    /**
     * Setup multi-language switcher functionality
     */
    function setupLanguageSwitcher() {
        // Load saved language preference from localStorage
        const savedLang = localStorage.getItem('preferred_language') || 'en';
        setLanguage(savedLang, false);

        // Add click handlers to language switcher items
        languageItems.forEach(function(item) {
            item.addEventListener('click', function(e) {
                e.preventDefault();
                const lang = this.getAttribute('data-lang');
                setLanguage(lang, true);
            });
        });
    }

    /**
     * Set website language
     * @param {string} lang - Language code ('en' or 'vi')
     * @param {boolean} savePreference - Whether to save to localStorage
     */
    function setLanguage(lang, savePreference) {
        // Update all elements with language attributes
        const elementsWithLang = document.querySelectorAll('[data-lang-' + lang + ']');

        elementsWithLang.forEach(function(element) {
            const translatedText = element.getAttribute('data-lang-' + lang);

            // Check if it's a placeholder attribute
            if (element.hasAttribute('data-lang-placeholder-' + lang) && element.tagName === 'INPUT') {
                element.placeholder = element.getAttribute('data-lang-placeholder-' + lang);
            } else if (translatedText) {
                element.textContent = translatedText;
            }
        });

        // Update current language display
        if (currentLangDisplay) {
            currentLangDisplay.textContent = lang.toUpperCase();
        }

        // Update active state on language items
        languageItems.forEach(function(item) {
            const itemLang = item.getAttribute('data-lang');
            if (itemLang === lang) {
                item.classList.add('active');
            } else {
                item.classList.remove('active');
            }
        });

        // Update HTML lang attribute
        document.documentElement.setAttribute('lang', lang);

        // Save preference to localStorage if requested
        if (savePreference) {
            localStorage.setItem('preferred_language', lang);

            // Show notification
            showNotification(
                lang === 'en' ? 'Language changed to English' : 'Đã chuyển sang Tiếng Việt',
                'success'
            );
        }

        console.log('Language set to:', lang);
    }

    // ==================== SCROLL HANDLERS ====================
    /**
     * Setup scroll-related event handlers
     */
    function setupScrollHandlers() {
        let lastScroll = 0;

        window.addEventListener('scroll', function() {
            const currentScroll = window.pageYOffset;

            // Navbar scroll effect
            handleNavbarScroll(currentScroll);

            // Scroll to top button visibility
            handleScrollTopButton(currentScroll);

            lastScroll = currentScroll;
        });
    }

    /**
     * Handle navbar appearance on scroll
     * @param {number} scrollPosition - Current scroll position
     */
    function handleNavbarScroll(scrollPosition) {
        if (!navbar) return;

        if (scrollPosition > 100) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    }

    /**
     * Handle scroll to top button visibility
     * @param {number} scrollPosition - Current scroll position
     */
    function handleScrollTopButton(scrollPosition) {
        if (!scrollTopBtn) return;

        if (scrollPosition > 300) {
            scrollTopBtn.classList.add('visible');
        } else {
            scrollTopBtn.classList.remove('visible');
        }
    }

    /**
     * Setup scroll to top button click handler
     */
    if (scrollTopBtn) {
        scrollTopBtn.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // ==================== NEWSLETTER FORM ====================
    /**
     * Setup newsletter form submission
     */
    function setupNewsletterForm() {
        if (!newsletterForm) return;

        newsletterForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const emailInput = this.querySelector('input[type="email"]');
            const submitBtn = this.querySelector('button[type="submit"]');
            const btnText = submitBtn.querySelector('.btn-text');
            const btnLoading = submitBtn.querySelector('.btn-loading');
            const successMessage = document.getElementById('newsletterSuccess');

            // Validate email
            if (!emailInput.value || !isValidEmail(emailInput.value)) {
                const currentLang = localStorage.getItem('preferred_language') || 'en';
                const errorMsg = currentLang === 'en'
                    ? 'Please enter a valid email address'
                    : 'Vui lòng nhập địa chỉ email hợp lệ';
                showNotification(errorMsg, 'error');
                return;
            }

            // Show loading state
            btnText.classList.add('d-none');
            btnLoading.classList.remove('d-none');
            submitBtn.disabled = true;

            // Simulate API call (replace with actual API call)
            setTimeout(function() {
                // Hide loading state
                btnText.classList.remove('d-none');
                btnLoading.classList.add('d-none');
                submitBtn.disabled = false;

                // Show success message
                newsletterForm.style.display = 'none';
                successMessage.classList.remove('d-none');

                // Add animation
                successMessage.style.animation = 'fadeInUp 0.5s ease';

                // Optional: Reset form after delay
                setTimeout(function() {
                    newsletterForm.style.display = 'block';
                    successMessage.classList.add('d-none');
                    emailInput.value = '';
                }, 5000);

                console.log('Newsletter subscription successful');
            }, 1500);
        });
    }

    /**
     * Validate email address
     * @param {string} email - Email address to validate
     * @returns {boolean} - True if valid, false otherwise
     */
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    /**
     * Show notification message
     * @param {string} message - Message to display
     * @param {string} type - Type of notification (success, error, info)
     */
    function showNotification(message, type = 'info') {
        // Create notification element
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.textContent = message;
        notification.style.cssText = `
            position: fixed;
            top: 100px;
            right: 20px;
            padding: 16px 24px;
            background-color: ${type === 'error' ? '#ef4444' : '#10b981'};
            color: white;
            border-radius: 8px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
            z-index: 9999;
            animation: slideInRight 0.3s ease;
            max-width: 350px;
        `;

        document.body.appendChild(notification);

        // Remove notification after 3 seconds
        setTimeout(function() {
            notification.style.animation = 'slideOutRight 0.3s ease';
            setTimeout(function() {
                if (document.body.contains(notification)) {
                    document.body.removeChild(notification);
                }
            }, 300);
        }, 3000);
    }

    // ==================== MOBILE MENU ====================
    /**
     * Setup mobile menu functionality
     */
    function setupMobileMenu() {
        const navbarToggler = document.querySelector('.navbar-toggler');
        const navbarCollapse = document.querySelector('.navbar-collapse');

        if (!navbarToggler || !navbarCollapse) return;

        // Close menu when clicking on a link
        const navLinks = navbarCollapse.querySelectorAll('.nav-link');
        navLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                if (window.innerWidth < 992) {
                    const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                    if (bsCollapse) {
                        bsCollapse.hide();
                    }
                }
            });
        });

        // Add animation class when menu opens
        navbarToggler.addEventListener('click', function() {
            navbarCollapse.classList.add('menu-animating');
            setTimeout(function() {
                navbarCollapse.classList.remove('menu-animating');
            }, 300);
        });
    }

    // ==================== SCROLL INDICATOR ====================
    /**
     * Setup scroll indicator click handler
     */
    function setupScrollIndicator() {
        if (!scrollIndicator) return;

        scrollIndicator.addEventListener('click', function() {
            const fiveSolasSection = document.getElementById('five-solas');
            if (fiveSolasSection) {
                fiveSolasSection.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    }

    // ==================== SMOOTH SCROLL ====================
    /**
     * Setup smooth scrolling for anchor links
     */
    function setupSmoothScroll() {
        const links = document.querySelectorAll('a[href^="#"]');

        links.forEach(function(link) {
            link.addEventListener('click', function(e) {
                const href = this.getAttribute('href');

                // Ignore empty anchors
                if (href === '#' || href === '#!') return;

                const target = document.querySelector(href);
                if (target) {
                    e.preventDefault();
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });

                    // Update URL without jumping
                    if (history.pushState) {
                        history.pushState(null, null, href);
                    }
                }
            });
        });
    }

    // ==================== IMAGE LAZY LOADING ====================
    /**
     * Setup lazy loading for images
     */
    function setupLazyLoading() {
        const images = document.querySelectorAll('img[loading="lazy"]');

        if ('IntersectionObserver' in window) {
            const imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src || img.src;
                        img.classList.add('loaded');
                        imageObserver.unobserve(img);
                    }
                });
            });

            images.forEach(function(img) {
                imageObserver.observe(img);
            });
        }
    }

    // ==================== CARD HOVER EFFECTS ====================
    /**
     * Add interactive hover effects to cards
     */
    function setupCardEffects() {
        const cards = document.querySelectorAll('.resource-card, .blog-card, .sola-card, .statement-item');

        cards.forEach(function(card) {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-8px)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
            });
        });
    }

    // ==================== PERFORMANCE OPTIMIZATION ====================
    /**
     * Debounce function for performance optimization
     * @param {Function} func - Function to debounce
     * @param {number} wait - Wait time in milliseconds
     * @returns {Function} - Debounced function
     */
    function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    /**
     * Throttle function for performance optimization
     * @param {Function} func - Function to throttle
     * @param {number} limit - Time limit in milliseconds
     * @returns {Function} - Throttled function
     */
    function throttle(func, limit) {
        let inThrottle;
        return function(...args) {
            if (!inThrottle) {
                func.apply(this, args);
                inThrottle = true;
                setTimeout(() => inThrottle = false, limit);
            }
        };
    }

    // ==================== ACCESSIBILITY ====================
    /**
     * Setup keyboard navigation
     */
    function setupKeyboardNavigation() {
        // ESC key to close mobile menu
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const navbarCollapse = document.querySelector('.navbar-collapse');
                if (navbarCollapse && navbarCollapse.classList.contains('show')) {
                    const bsCollapse = bootstrap.Collapse.getInstance(navbarCollapse);
                    if (bsCollapse) {
                        bsCollapse.hide();
                    }
                }
            }
        });

        // Focus management for better accessibility
        const focusableElements = document.querySelectorAll(
            'a, button, input, select, textarea, [tabindex]:not([tabindex="-1"])'
        );

        focusableElements.forEach(function(element) {
            element.addEventListener('focus', function() {
                this.style.outline = '2px solid var(--primary)';
                this.style.outlineOffset = '2px';
            });

            element.addEventListener('blur', function() {
                this.style.outline = '';
                this.style.outlineOffset = '';
            });
        });
    }

    // Setup keyboard navigation
    setupKeyboardNavigation();

    // ==================== WINDOW RESIZE HANDLER ====================
    /**
     * Handle window resize events
     */
    window.addEventListener('resize', debounce(function() {
        // Refresh AOS on resize
        if (typeof AOS !== 'undefined') {
            AOS.refresh();
        }
    }, 250));

    // ==================== PAGE VISIBILITY ====================
    /**
     * Handle page visibility changes
     */
    document.addEventListener('visibilitychange', function() {
        if (document.hidden) {
            console.log('Page hidden');
        } else {
            console.log('Page visible');
            // Refresh animations when page becomes visible
            if (typeof AOS !== 'undefined') {
                AOS.refresh();
            }
        }
    });

    // ==================== UTILITY FUNCTIONS ====================
    /**
     * Check if element is in viewport
     * @param {HTMLElement} element - Element to check
     * @returns {boolean} - True if in viewport
     */
    function isInViewport(element) {
        const rect = element.getBoundingClientRect();
        return (
            rect.top >= 0 &&
            rect.left >= 0 &&
            rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
            rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        );
    }

    /**
     * Get element offset from top of page
     * @param {HTMLElement} element - Element to get offset for
     * @returns {number} - Offset in pixels
     */
    function getOffset(element) {
        const rect = element.getBoundingClientRect();
        return rect.top + window.pageYOffset;
    }

    // ==================== EXPORT FOR TESTING ====================
    // Expose functions for testing if needed
    window.ReformedFaith = {
        setLanguage: setLanguage,
        isValidEmail: isValidEmail,
        isInViewport: isInViewport,
        showNotification: showNotification
    };

})();

// ==================== CSS ANIMATIONS ====================
// Add CSS for notification animations
const style = document.createElement('style');
style.textContent = `
    @keyframes slideInRight {
        from {
            transform: translateX(100%);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    @keyframes slideOutRight {
        from {
            transform: translateX(0);
            opacity: 1;
        }
        to {
            transform: translateX(100%);
            opacity: 0;
        }
    }

    /* Focus styles for accessibility */
    *:focus-visible {
        outline: 2px solid var(--primary) !important;
        outline-offset: 2px !important;
    }

    /* Menu animation */
    .navbar-collapse.menu-animating {
        animation: fadeIn 0.3s ease;
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }

    /* Smooth transitions for language changes */
    [data-lang-en],
    [data-lang-vi] {
        transition: opacity 0.2s ease;
    }
`;
document.head.appendChild(style);
