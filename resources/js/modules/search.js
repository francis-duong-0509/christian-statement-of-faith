/**
 * Search Module
 * Handles search functionality with autocomplete
 */

export function initSearch() {
    const searchButtons = document.querySelectorAll('[data-search="toggle"]');
    const searchModal = document.querySelector('#searchModal');
    const searchInput = document.querySelector('[data-search="input"]');
    const searchResults = document.querySelector('[data-search="results"]');
    const searchClear = document.querySelector('[data-search="clear"]');

    if (!searchModal) return;

    // Open search modal
    searchButtons.forEach(button => {
        button.addEventListener('click', (e) => {
            e.preventDefault();
            openSearchModal();
        });
    });

    // Keyboard shortcut (Cmd/Ctrl + K)
    document.addEventListener('keydown', (e) => {
        if ((e.metaKey || e.ctrlKey) && e.key === 'k') {
            e.preventDefault();
            openSearchModal();
        }

        // Close on Escape
        if (e.key === 'Escape' && searchModal.classList.contains('show')) {
            closeSearchModal();
        }
    });

    // Clear search
    if (searchClear) {
        searchClear.addEventListener('click', () => {
            searchInput.value = '';
            searchResults.innerHTML = '';
            searchInput.focus();
        });
    }

    // Search input with debounce
    if (searchInput) {
        let searchTimeout;

        searchInput.addEventListener('input', (e) => {
            clearTimeout(searchTimeout);
            const query = e.target.value.trim();

            // Show/hide clear button
            if (searchClear) {
                searchClear.style.display = query ? 'block' : 'none';
            }

            if (query.length < 2) {
                searchResults.innerHTML = '';
                return;
            }

            // Debounce search
            searchTimeout = setTimeout(() => {
                performSearch(query);
            }, 300);
        });

        // Keyboard navigation for results
        searchInput.addEventListener('keydown', (e) => {
            if (e.key === 'ArrowDown' || e.key === 'ArrowUp') {
                e.preventDefault();
                navigateResults(e.key === 'ArrowDown' ? 1 : -1);
            } else if (e.key === 'Enter') {
                const activeResult = searchResults.querySelector('.search-result-item.active');
                if (activeResult) {
                    const link = activeResult.querySelector('a');
                    if (link) link.click();
                }
            }
        });
    }

    function openSearchModal() {
        searchModal.classList.add('show');
        document.body.classList.add('modal-open');

        // Create backdrop
        const backdrop = document.createElement('div');
        backdrop.className = 'modal-backdrop fade show';
        backdrop.addEventListener('click', closeSearchModal);
        document.body.appendChild(backdrop);

        // Focus input
        setTimeout(() => searchInput.focus(), 100);
    }

    function closeSearchModal() {
        searchModal.classList.remove('show');
        document.body.classList.remove('modal-open');

        const backdrop = document.querySelector('.modal-backdrop');
        if (backdrop) backdrop.remove();
    }

    function performSearch(query) {
        // Show loading state
        searchResults.innerHTML = '<div class="spinner"></div>';

        // Make AJAX request to search endpoint
        fetch(`/search?q=${encodeURIComponent(query)}`, {
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(data => {
                displayResults(data);
            })
            .catch(error => {
                console.error('Search error:', error);
                searchResults.innerHTML = '<div class="empty-state"><p>Search error. Please try again.</p></div>';
            });
    }

    function displayResults(results) {
        if (!results || results.length === 0) {
            searchResults.innerHTML = '<div class="empty-state"><p>No results found.</p></div>';
            return;
        }

        let html = '';
        results.forEach((result, index) => {
            html += `
                <div class="search-result-item ${index === 0 ? 'active' : ''}" data-index="${index}">
                    <a href="${result.url}">
                        <div class="search-result-title">${highlightText(result.title, searchInput.value)}</div>
                        <div class="search-result-description">${highlightText(result.excerpt, searchInput.value)}</div>
                        ${result.category ? `<span class="badge badge-primary">${result.category}</span>` : ''}
                    </a>
                </div>
            `;
        });

        searchResults.innerHTML = html;

        // Add click handlers
        searchResults.querySelectorAll('.search-result-item').forEach(item => {
            item.addEventListener('mouseenter', () => {
                searchResults.querySelectorAll('.search-result-item').forEach(i => i.classList.remove('active'));
                item.classList.add('active');
            });
        });
    }

    function navigateResults(direction) {
        const items = searchResults.querySelectorAll('.search-result-item');
        if (items.length === 0) return;

        const activeItem = searchResults.querySelector('.search-result-item.active');
        let newIndex = 0;

        if (activeItem) {
            const currentIndex = parseInt(activeItem.dataset.index);
            newIndex = currentIndex + direction;

            // Wrap around
            if (newIndex < 0) newIndex = items.length - 1;
            if (newIndex >= items.length) newIndex = 0;
        }

        items.forEach(item => item.classList.remove('active'));
        items[newIndex].classList.add('active');

        // Scroll into view
        items[newIndex].scrollIntoView({ block: 'nearest', behavior: 'smooth' });
    }

    function highlightText(text, query) {
        if (!query) return text;
        const regex = new RegExp(`(${escapeRegex(query)})`, 'gi');
        return text.replace(regex, '<mark>$1</mark>');
    }

    function escapeRegex(string) {
        return string.replace(/[.*+?^${}()|[\]\\]/g, '\\$&');
    }
}
