/**
 * Back to Top Button Module
 * Shows/hides back to top button and handles scrolling
 */

export function initBackToTop() {
    // Create button if doesn't exist
    let button = document.querySelector('.back-to-top');

    if (!button) {
        button = document.createElement('button');
        button.className = 'back-to-top';
        button.setAttribute('aria-label', 'Back to top');
        button.innerHTML = '↑';
        document.body.appendChild(button);
    }

    const showThreshold = 500;

    // Show/hide button based on scroll position
    function toggleButton() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        if (scrollTop > showThreshold) {
            button.classList.add('show');
        } else {
            button.classList.remove('show');
        }
    }

    // Scroll to top when clicked
    button.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Listen to scroll events
    window.addEventListener('scroll', toggleButton);

    // Initial check
    toggleButton();
}
