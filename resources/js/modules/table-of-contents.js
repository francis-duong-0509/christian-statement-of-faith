/**
 * Table of Contents Module
 * Auto-generates and manages table of contents with active state tracking
 */

export function initTableOfContents() {
    const tocList = document.querySelector('.toc-list');
    const contentArea = document.querySelector('.post-content, .statement-content');

    if (!tocList || !contentArea) return;

    // Auto-generate TOC if empty
    if (tocList.children.length === 0) {
        generateTableOfContents(contentArea, tocList);
    }

    // Track active heading on scroll
    trackActiveHeading(contentArea, tocList);
}

/**
 * Generate table of contents from content headings
 */
function generateTableOfContents(contentArea, tocList) {
    const headings = contentArea.querySelectorAll('h2, h3');

    if (headings.length === 0) {
        tocList.parentElement.style.display = 'none';
        return;
    }

    let tocHTML = '';

    headings.forEach((heading, index) => {
        // Generate ID if doesn't exist
        if (!heading.id) {
            heading.id = `heading-${index}`;
        }

        const level = heading.tagName.toLowerCase();
        const text = heading.textContent;
        const id = heading.id;

        if (level === 'h2') {
            tocHTML += `<li><a href="#${id}">${text}</a></li>`;
        } else if (level === 'h3') {
            if (tocHTML && !tocHTML.endsWith('</ul>')) {
                tocHTML += '<ul>';
            } else if (!tocHTML) {
                tocHTML += '<ul>';
            }
            tocHTML += `<li><a href="#${id}">${text}</a></li>`;
        }
    });

    // Close any open sublists
    const openUls = (tocHTML.match(/<ul>/g) || []).length;
    const closedUls = (tocHTML.match(/<\/ul>/g) || []).length;
    for (let i = 0; i < (openUls - closedUls); i++) {
        tocHTML += '</ul>';
    }

    tocList.innerHTML = tocHTML;
}

/**
 * Track active heading based on scroll position
 */
function trackActiveHeading(contentArea, tocList) {
    const headings = contentArea.querySelectorAll('h2, h3');
    const tocLinks = tocList.querySelectorAll('a');
    const header = document.querySelector('.main-header');
    const headerHeight = header ? header.offsetHeight : 0;
    const offset = headerHeight + 100;

    if (headings.length === 0 || tocLinks.length === 0) return;

    function updateActiveLink() {
        const scrollPosition = window.scrollY + offset;

        let activeHeading = null;

        // Find the current heading
        headings.forEach(heading => {
            const headingTop = heading.offsetTop;

            if (scrollPosition >= headingTop) {
                activeHeading = heading;
            }
        });

        // Update active state in TOC
        tocLinks.forEach(link => {
            link.classList.remove('active');

            if (activeHeading && link.getAttribute('href') === `#${activeHeading.id}`) {
                link.classList.add('active');

                // Scroll TOC if needed
                const tocWidget = tocList.closest('.toc-widget');
                if (tocWidget && tocWidget.scrollHeight > tocWidget.clientHeight) {
                    const linkTop = link.offsetTop;
                    const widgetScrollTop = tocWidget.scrollTop;
                    const widgetHeight = tocWidget.clientHeight;

                    if (linkTop < widgetScrollTop || linkTop > widgetScrollTop + widgetHeight) {
                        tocWidget.scrollTo({
                            top: linkTop - widgetHeight / 2,
                            behavior: 'smooth'
                        });
                    }
                }
            }
        });
    }

    // Throttle scroll events
    let ticking = false;

    function onScroll() {
        if (!ticking) {
            window.requestAnimationFrame(() => {
                updateActiveLink();
                ticking = false;
            });
            ticking = true;
        }
    }

    window.addEventListener('scroll', onScroll);

    // Initial update
    updateActiveLink();
}
