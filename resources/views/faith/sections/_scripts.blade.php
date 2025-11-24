<script>
document.addEventListener('DOMContentLoaded', function() {
    // ============================================
    // Smooth Scroll for Anchor Links
    // ============================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const target = document.querySelector(targetId);
            if (target) {
                e.preventDefault();
                const offsetTop = target.offsetTop - 100; // Offset for sticky header
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });

    // ============================================
    // Back to Top Button
    // ============================================
    const backToTopBtn = document.getElementById('backToTop');
    if (backToTopBtn) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 400) {
                backToTopBtn.classList.add('visible');
            } else {
                backToTopBtn.classList.remove('visible');
            }
        });
    }

    // ============================================
    // Reading Progress Bar
    // ============================================
    const progressBar = document.createElement('div');
    progressBar.className = 'reading-progress-bar';
    document.body.appendChild(progressBar);

    window.addEventListener('scroll', function() {
        const windowHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
        const scrolled = (window.pageYOffset / windowHeight) * 100;
        progressBar.style.width = scrolled + '%';
    });

    // ============================================
    // Scripture Badge Click to Copy
    // ============================================
    const scriptureBadges = document.querySelectorAll('.scripture-badge');
    scriptureBadges.forEach(badge => {
        badge.addEventListener('click', function() {
            const reference = this.textContent.trim();

            // Copy to clipboard
            if (navigator.clipboard) {
                navigator.clipboard.writeText(reference).then(() => {
                    // Visual feedback
                    const originalText = this.textContent;
                    this.textContent = '{{ __t("✓ Đã sao chép", "✓ Copied") }}';
                    this.style.background = '#28a745';
                    this.style.color = 'white';
                    this.style.borderColor = '#28a745';

                    // Reset after 1.5s
                    setTimeout(() => {
                        this.textContent = originalText;
                        this.style.background = '';
                        this.style.color = '';
                        this.style.borderColor = '';
                    }, 1500);
                }).catch(err => {
                    console.log('Copy failed:', err);
                });
            }
        });
    });

    // ============================================
    // Lazy Load Images (if any)
    // ============================================
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });

        document.querySelectorAll('img.lazy').forEach(img => {
            imageObserver.observe(img);
        });
    }
});

// ============================================
// Scroll to Top Function
// ============================================
function scrollToTop() {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}

// ============================================
// Print Functionality (Optional)
// ============================================
function printPage() {
    window.print();
}
</script>
