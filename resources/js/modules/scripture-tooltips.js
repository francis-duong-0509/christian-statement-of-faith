/**
 * Scripture Tooltips Module
 * Shows verse text in tooltips when hovering over Scripture references
 */

export function initScriptureTooltips() {
    const scriptureRefs = document.querySelectorAll('.scripture-ref');

    scriptureRefs.forEach(ref => {
        let tooltip = null;
        let showTimeout = null;
        let hideTimeout = null;

        ref.addEventListener('mouseenter', function() {
            clearTimeout(hideTimeout);

            showTimeout = setTimeout(() => {
                showTooltip(this);
            }, 300); // Delay before showing
        });

        ref.addEventListener('mouseleave', function() {
            clearTimeout(showTimeout);

            hideTimeout = setTimeout(() => {
                hideTooltip();
            }, 100);
        });

        function showTooltip(element) {
            const reference = element.dataset.reference || element.textContent.trim();
            const verse = element.dataset.verse;

            if (!reference) return;

            // Create tooltip
            tooltip = document.createElement('div');
            tooltip.className = 'scripture-tooltip tooltip show';
            tooltip.setAttribute('role', 'tooltip');

            // If verse text is provided in data attribute
            if (verse) {
                tooltip.innerHTML = `
                    <span class="scripture-reference">${reference}</span>
                    <div class="scripture-text">${verse}</div>
                `;
            } else {
                // Otherwise show loading and fetch
                tooltip.innerHTML = `
                    <span class="scripture-reference">${reference}</span>
                    <div class="scripture-text">Loading...</div>
                `;

                // Fetch verse text (you'll need to implement the API endpoint)
                fetchVerseText(reference)
                    .then(text => {
                        if (tooltip && document.body.contains(tooltip)) {
                            tooltip.querySelector('.scripture-text').textContent = text;
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching verse:', error);
                        if (tooltip && document.body.contains(tooltip)) {
                            tooltip.querySelector('.scripture-text').textContent = 'Unable to load verse text';
                        }
                    });
            }

            document.body.appendChild(tooltip);
            positionTooltip(element, tooltip);

            // Add mouse enter/leave to tooltip itself
            tooltip.addEventListener('mouseenter', () => {
                clearTimeout(hideTimeout);
            });

            tooltip.addEventListener('mouseleave', () => {
                hideTimeout = setTimeout(() => {
                    hideTooltip();
                }, 100);
            });
        }

        function hideTooltip() {
            if (tooltip && document.body.contains(tooltip)) {
                tooltip.classList.remove('show');
                setTimeout(() => {
                    if (tooltip && document.body.contains(tooltip)) {
                        tooltip.remove();
                    }
                    tooltip = null;
                }, 200);
            }
        }

        function positionTooltip(element, tooltip) {
            const rect = element.getBoundingClientRect();
            const tooltipRect = tooltip.getBoundingClientRect();

            let top = rect.top - tooltipRect.height - 10;
            let left = rect.left + (rect.width / 2) - (tooltipRect.width / 2);

            // Check if tooltip goes off screen
            if (top < 0) {
                // Show below instead
                top = rect.bottom + 10;
                tooltip.setAttribute('data-placement', 'bottom');
            } else {
                tooltip.setAttribute('data-placement', 'top');
            }

            if (left < 10) left = 10;
            if (left + tooltipRect.width > window.innerWidth - 10) {
                left = window.innerWidth - tooltipRect.width - 10;
            }

            tooltip.style.position = 'fixed';
            tooltip.style.top = `${top}px`;
            tooltip.style.left = `${left}px`;
        }
    });
}

/**
 * Fetch verse text from API
 * You'll need to implement your API endpoint or use a Bible API
 */
async function fetchVerseText(reference) {
    // Example implementation - adjust based on your backend
    try {
        const response = await fetch(`/api/scripture/${encodeURIComponent(reference)}`);

        if (!response.ok) {
            throw new Error('Failed to fetch verse');
        }

        const data = await response.json();
        return data.text || 'Verse not found';
    } catch (error) {
        // Fallback: you could use a public Bible API here
        // For now, return a placeholder
        return `${reference} - Click to view full text`;
    }
}
