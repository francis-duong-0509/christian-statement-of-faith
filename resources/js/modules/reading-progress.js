/**
 * Reading Progress Bar Module
 * Shows reading progress for blog posts
 */

export function initReadingProgress() {
    // Create progress bar if doesn't exist
    let progressBar = document.querySelector('.reading-progress');

    if (!progressBar) {
        progressBar = document.createElement('div');
        progressBar.className = 'reading-progress';
        document.body.appendChild(progressBar);
    }

    function updateProgress() {
        const windowHeight = window.innerHeight;
        const documentHeight = document.documentElement.scrollHeight;
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;

        // Calculate progress percentage
        const scrollableHeight = documentHeight - windowHeight;
        const progress = (scrollTop / scrollableHeight) * 100;

        // Update progress bar width
        progressBar.style.width = `${Math.min(progress, 100)}%`;
    }

    // Listen to scroll events
    window.addEventListener('scroll', updateProgress);

    // Initial update
    updateProgress();
}
