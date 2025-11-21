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

    // Floating action buttons
    const fabToTop = document.getElementById('fabToTop');
    const fabDonate = document.getElementById('fabDonate');

    // Donate modal elements
    const donateModal = document.getElementById('donateModal');
    const donateCloseButtons = document.querySelectorAll('[data-dismiss-donate="modal"]');

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
        setupFloatingButtons();
        setupDonateModal();

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

        // Also handle FAB To Top button
        if (fabToTop) {
            if (scrollPosition > 300) {
                fabToTop.classList.add('visible');
            } else {
                fabToTop.classList.remove('visible');
            }
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
            const statementSection = document.getElementById('statement-of-faith');
            if (statementSection) {
                statementSection.scrollIntoView({
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
        const cards = document.querySelectorAll('.resource-card-new, .blog-card, .statement-item');

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

    // ==================== SCRIPTURE MODAL ====================
    /**
     * Scripture content data (Vietnamese - Bản dịch 1925)
     */
    const scriptureContent = {
        '2 Ti-mô-thê 3:16-17': 'Cả Kinh Thánh đều là bởi Đức Chúa Trời soi dẫn, có ích cho sự dạy dỗ, bẻ trách, sửa trị, khuyên lơn về sự công bình, hầu cho người của Đức Chúa Trời được trọn vẹn, sẵn sàng làm các việc lành.',
        '2 Phi-e-rơ 1:20-21': 'Vả, trước hết anh em phải biết rằng chẳng có lời tiên tri nào trong Kinh Thánh ra bởi ý riêng của người nào. Vì chưa hề có lời tiên tri nào sanh ra bởi ý người ta, bèn là những thánh của Đức Chúa Trời được Đức Thánh Linh cảm động mà nói ra.',
        'Thi Thiên 119:160': 'Lời Chúa tổng cộng lại đều là chơn lý; Mọi mạng lịnh công bình của Chúa đều còn đến đời đời.',
        'Ma-thi-ơ 28:19': 'Vậy, hãy đi dạy dỗ muôn dân, hãy nhơn danh Đức Cha, Đức Con, và Đức Thánh Linh mà làm phép báp-tem cho họ.',
        '2 Cô-rinh-tô 13:14': 'Nguyện ân điển của Đức Chúa Jêsus Christ, sự yêu thương của Đức Chúa Trời, và sự thông công của Đức Thánh Linh ở cùng hết thảy anh em!',
        'Giăng 1:1-3': 'Lúc ban đầu có Ngôi Lời, Ngôi Lời ở cùng Đức Chúa Trời, và Ngôi Lời là Đức Chúa Trời. Ngài ở cùng Đức Chúa Trời lúc ban đầu. Muôn vật bởi Ngài làm nên; chẳng vật chi đã làm nên mà không bởi Ngài.',
        'Giăng 17:3': 'Vả, sự sống đời đời là nhận biết Cha, tức là Đức Chúa Trời có một và thật, cùng Jêsus Christ, là Đấng Cha đã sai đến.',
        'Ê-phê-sô 1:3-6': 'Đáng ngợi khen Đức Chúa Trời, Cha của Đức Chúa Jêsus Christ chúng ta, Ngài đã ban mọi phước thiêng liêng ở các nơi trên trời cho chúng ta trong Đấng Christ, theo như Ngài đã chọn chúng ta trong Ngài trước khi sáng thế, đặng làm cho chúng ta nên thánh không chỗ trách được trước mặt Ngài, trong sự yêu thương; Ngài đã định sẵn chúng ta trở nên con nuôi mình bởi Jêsus Christ, theo ý tốt lành của Ngài, để ngợi khen sự vinh hiển ơn phước Ngài, tức là ơn phước Ngài đã ban cho chúng ta trong Con yêu dấu của Ngài.',
        'Gia-cơ 1:17': 'Mọi sự ban cho tốt lành và mọi phước hoàn toàn đều từ trên trời sa xuống, đến từ nơi Cha sáng láng, trong Ngài chẳng có sự thay đổi hay bóng biến thiên.',
        'Giăng 1:14': 'Ngôi Lời đã trở nên xác thịt, ở giữa chúng ta, đầy ơn và lẽ thật; chúng ta đã ngắm xem sự vinh hiển của Ngài, thật như vinh hiển của Con một đến từ nơi Cha.',
        'Phi-líp 2:5-11': 'Hãy có đồng một tâm tình với Đấng Christ Jêsus: Ngài vốn có hình Đức Chúa Trời, song chẳng coi sự bình đẳng với Đức Chúa Trời là của cướp được, nhưng đã tự hủy mình, lấy hình tôi tớ, trở nên giống như người ta; và về tình trạng, Ngài thấy mình như một người phàm. Ngài đã hạ mình xuống, vâng lời cho đến chết, thậm chí chết trên thập tự giá. Vì vậy Đức Chúa Trời đã rất cao cất Ngài lên, ban cho Ngài danh trên hết thảy các danh, hầu cho nghe danh Jêsus, mọi đầu gối trên trời, dưới đất, bên dưới đất, đều quì xuống, và mọi lưỡi đều xưng Jêsus Christ là Chúa, để làm vinh hiển Đức Chúa Trời Cha.',
        '1 Cô-rinh-tô 15:3-4': 'Vả, điều tôi đã nhận lãnh, ấy là điều trước hết tôi đã truyền cho anh em, tức là Đấng Christ chịu chết vì tội lỗi chúng ta, theo lời Kinh Thánh; Ngài đã bị chôn, đến ngày thứ ba, Ngài sống lại, theo lời Kinh Thánh.',
        'Hê-bơ-rơ 4:14-16': 'Vậy, vì chúng ta có một thầy tế lễ thượng phẩm lớn đã vượt qua các từng trời, tức là Jêsus, Con Đức Chúa Trời, thì hãy bền giữ đạo chúng ta đã nhận. Vì chúng ta không có một thầy tế lễ thượng phẩm không thể cảm thông yếu đuối chúng ta, bèn là Đấng đã chịu thử thách trong mọi sự cũng như chúng ta, song không hề phạm tội. Vậy chúng ta hãy vững lòng đến gần ngôi ân điển, hầu cho được thương xót và tìm được ơn để giúp chúng ta trong thì giờ có cần dùng.',
        'Giăng 14:16-17': 'Ta sẽ nài xin Cha, Ngài sẽ ban cho các ngươi một Đấng Yên ủi khác, để ở với các ngươi đời đời, tức là Thần lẽ thật mà thế gian không thể nhận lấy được, vì chẳng thấy Ngài và cũng chẳng biết Ngài; nhưng các ngươi biết Ngài, vì Ngài ở cùng các ngươi, và sẽ ở trong các ngươi.',
        'Giăng 16:7-14': 'Song ta nói thật cùng các ngươi, ấy là ích cho các ngươi về ta đi; vì nếu ta không đi, Đấng Yên ủi sẽ không đến cùng các ngươi đâu; nhưng nếu ta đi, thì ta sẽ sai Ngài đến. Khi Ngài đến, sẽ tỏ cho thế gian thấy tội, thấy nghĩa, thấy sự phán xét. Về tội, vì họ không tin ta; về nghĩa, vì ta đi đến cùng Cha, và các ngươi sẽ chẳng còn thấy ta nữa; về sự phán xét, vì vua chúa thế gian nầy đã bị phán xét rồi. Ta còn có nhiều điều phải nói với các ngươi, nhưng hiện nay các ngươi chưa có thể chịu được. Song khi nào Thần lẽ thật đến, Ngài sẽ dắt dẫn các ngươi vào mọi lẽ thật; vì Ngài chẳng tự mình nói đâu, nhưng Ngài nghe điều chi thì nói điều nấy, và bày tỏ cho các ngươi những việc hầu đến. Ngài sẽ làm vinh hiển ta; vì Ngài sẽ lấy điều của ta mà tỏ ra cho các ngươi.',
        'Rô-ma 8:9-11': 'Song anh em chẳng thuộc về xác thịt nữa, nhưng thuộc về Thánh Linh, nếu như Đức Thánh Linh của Đức Chúa Trời ở trong anh em. Nếu ai không có Thánh Linh của Đấng Christ, thì không thuộc về Ngài. Còn nếu Đấng Christ ở trong anh em, thì xác thịt chết vì tội lỗi, song thần linh sống vì sự công bình. Và nếu Thánh Linh của Đấng đã khiến Jêsus từ kẻ chết sống lại ngự trong anh em, thì Đấng đã khiến Đấng Christ từ kẻ chết sống lại, cũng sẽ làm cho thân thể hay chết của anh em được sống, bởi Thánh Linh Ngài ở trong anh em vậy.',
        '1 Cô-rinh-tô 12:4-11': 'Vả, có những sự ban cho khác nhau, nhưng chỉ có một Đức Thánh Linh. Có những chức vụ khác nhau, nhưng chỉ có một Chúa. Có những công việc khác nhau, nhưng chỉ có một Đức Chúa Trời, là Đấng vận hành mọi sự trong mọi người. Vả, sự bày tỏ của Đức Thánh Linh ban cho mọi người, là để mọi người được ích. Bởi Đức Thánh Linh, người nầy lãnh lời khôn ngoan; người kia, theo cùng một Đức Thánh Linh, lãnh lời tri thức; người khác, theo cùng một Đức Thánh Linh nữa, lãnh đức tin; người nọ, theo cùng một Đức Thánh Linh lại nữa, lãnh sự ban cho các thứ chữa bệnh; người kia lãnh quyền làm những phép lạ; người nọ lãnh sự nói tiên tri; người khác lãnh sự phân biệt thần linh; người kia lãnh các thứ tiếng; người nọ lãnh sự thông giải các thứ tiếng. Một Đức Thánh Linh nầy làm mọi sự đó, tùy ý phân phát sự ban cho riêng cho mỗi người.',
        'Ê-phê-sô 2:8-10': 'Vả, ấy là nhờ ân điển, bởi đức tin, mà anh em được cứu, điều đó không phải đến từ anh em, bèn là sự ban cho của Đức Chúa Trời. Ấy chẳng phải bởi việc làm đâu, hầu cho không ai khoe mình; vì chúng ta là việc Ngài làm ra, đã được dựng nên trong Đấng Christ Jêsus để làm việc lành mà Đức Chúa Trời đã sắm sẵn trước cho chúng ta làm theo.',
        'Rô-ma 3:23-26': 'Vì mọi người đã phạm tội, thiếu mất sự vinh hiển của Đức Chúa Trời. Họ nhờ ân điển Ngài mà được xưng công bình cách nhưng không, bởi sự cứu chuộc trong Đấng Christ Jêsus. Ấy là Đấng mà Đức Chúa Trời đã lập làm của lễ chuộc tội, bởi đức tin trong huyết Đấng ấy. Ngài đã bày tỏ sự công bình mình như vậy, vì đã bỏ qua các tội phạm trước kia, trong lúc Ngài nhịn nhục; tức là để bày tỏ sự công bình mình trong thời bây giờ, hầu cho Ngài được xưng là công bình và xưng công bình kẻ nào có đức tin trong Đức Chúa Jêsus.',
        'Tít 3:4-7': 'Nhưng khi sự nhân từ của Đức Chúa Trời, Cứu Chúa chúng ta, và lòng yêu thương Ngài đã tỏ ra, thì Ngài đã cứu chúng ta, không phải vì việc công bình chúng ta đã làm, nhưng theo lòng thương xót Ngài, bởi sự tắm rửa của sự tái sanh và sự làm mới của Đức Thánh Linh, mà Ngài đã đổ dồi dào trên chúng ta, nhờ Jêsus Christ, Cứu Chúa chúng ta, hầu cho chúng ta được xưng công bình bởi ân điển Ngài, trở nên kẻ kế tự theo sự trông cậy của sự sống đời đời.',
        'Giăng 3:16': 'Vì Đức Chúa Trời yêu thương thế gian, đến nỗi đã ban Con một của Ngài, hầu cho hễ ai tin Con ấy không bị hư mất mà được sự sống đời đời.'
    };

    /**
     * Scripture modal elements
     */
    const scriptureModal = document.getElementById('scriptureModal');
    const modalTitle = document.getElementById('modalTitle');
    const scriptureText = document.querySelector('.scripture-text');
    const closeButtons = document.querySelectorAll('[data-dismiss="modal"]');
    const scriptureRefs = document.querySelectorAll('.scripture-ref');

    /**
     * Open scripture modal
     * @param {string} reference - Scripture reference
     */
    function openScriptureModal(reference) {
        if (!scriptureModal || !modalTitle || !scriptureText) return;

        // Get scripture content
        const content = scriptureContent[reference];
        if (!content) {
            console.error('Scripture content not found for:', reference);
            return;
        }

        // Set modal content
        modalTitle.textContent = reference;
        scriptureText.textContent = content;

        // Show modal
        scriptureModal.classList.remove('d-none');
        document.body.style.overflow = 'hidden';

        // Focus on close button for accessibility
        const closeBtn = scriptureModal.querySelector('.modal-close');
        if (closeBtn) {
            setTimeout(() => closeBtn.focus(), 100);
        }
    }

    /**
     * Close scripture modal
     */
    function closeScriptureModal() {
        if (!scriptureModal) return;

        scriptureModal.classList.add('d-none');
        document.body.style.overflow = '';
    }

    /**
     * Setup scripture modal event listeners
     */
    function setupScriptureModal() {
        // Add click event to all scripture references
        scriptureRefs.forEach(function(ref) {
            ref.addEventListener('click', function(e) {
                e.preventDefault();
                const reference = this.getAttribute('data-reference');
                openScriptureModal(reference);
            });
        });

        // Add click event to close buttons
        closeButtons.forEach(function(btn) {
            btn.addEventListener('click', function() {
                closeScriptureModal();
            });
        });

        // Close on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && scriptureModal && !scriptureModal.classList.contains('d-none')) {
                closeScriptureModal();
            }
        });
    }

    // Initialize scripture modal
    if (scriptureModal) {
        setupScriptureModal();
    }

    // ==================== FLOATING ACTION BUTTONS ====================
    /**
     * Setup floating action buttons
     */
    function setupFloatingButtons() {
        // To Top button
        if (fabToTop) {
            fabToTop.addEventListener('click', function(e) {
                e.preventDefault();
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        }

        // Donate button
        if (fabDonate) {
            fabDonate.addEventListener('click', function(e) {
                e.preventDefault();
                openDonateModal();
            });
        }
    }

    // ==================== DONATE MODAL ====================
    /**
     * Open donate modal
     */
    function openDonateModal() {
        if (!donateModal) return;

        // Show modal
        donateModal.classList.remove('d-none');
        document.body.style.overflow = 'hidden';

        // Focus on close button for accessibility
        const closeBtn = donateModal.querySelector('.modal-close');
        if (closeBtn) {
            setTimeout(() => closeBtn.focus(), 100);
        }

        console.log('Donate modal opened');
    }

    /**
     * Close donate modal
     */
    function closeDonateModal() {
        if (!donateModal) return;

        donateModal.classList.add('d-none');
        document.body.style.overflow = '';

        console.log('Donate modal closed');
    }

    /**
     * Setup donate modal event listeners
     */
    function setupDonateModal() {
        if (!donateModal) return;

        // Add click event to close buttons
        donateCloseButtons.forEach(function(btn) {
            btn.addEventListener('click', function() {
                closeDonateModal();
            });
        });

        // Close on ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && donateModal && !donateModal.classList.contains('d-none')) {
                closeDonateModal();
            }
        });

        console.log('Donate modal initialized');
    }

    // ==================== EXPORT FOR TESTING ====================
    // Expose functions for testing if needed
    window.ReformedFaith = {
        setLanguage: setLanguage,
        isValidEmail: isValidEmail,
        isInViewport: isInViewport,
        showNotification: showNotification,
        openDonateModal: openDonateModal,
        closeDonateModal: closeDonateModal
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
