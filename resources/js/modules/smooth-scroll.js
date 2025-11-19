/**
 * Smooth Scroll Module
 * Enables smooth scrolling for anchor links
 */

export function initSmoothScroll() {
    const links = document.querySelectorAll('a[href^="#"]');

    links.forEach(link => {
        link.addEventListener('click', (e) => {
            const href = link.getAttribute('href');

            // Skip if just "#"
            if (href === '#') return;

            const target = document.querySelector(href);
            if (target) {
                e.preventDefault();

                // Get header height for offset
                const header = document.querySelector('.main-header');
                const headerHeight = header ? header.offsetHeight : 0;
                const offset = 20; // Additional offset

                const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight - offset;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });

                // Update URL hash
                history.pushState(null, null, href);

                // Update focus for accessibility
                target.focus({ preventScroll: true });
            }
        });
    });

    // Handle initial hash on page load
    if (window.location.hash) {
        setTimeout(() => {
            const target = document.querySelector(window.location.hash);
            if (target) {
                const header = document.querySelector('.main-header');
                const headerHeight = header ? header.offsetHeight : 0;
                const offset = 20;
                const targetPosition = target.getBoundingClientRect().top + window.pageYOffset - headerHeight - offset;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        }, 100);
    }
}
