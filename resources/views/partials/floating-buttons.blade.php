<!-- Floating Action Buttons -->
<div class="floating-buttons">
    <!-- Donate Button with Label (TOP - Most Prominent) -->
    <div class="fab-with-label">
        <span class="fab-label">{{ __t('Dâng Hiến', 'Give') }}</span>
        <button class="fab-button fab-donate" id="fabDonate" aria-label="Support our ministry">
            <i class="fas fa-heart"></i>
        </button>
    </div>

    <!-- Facebook Button (MIDDLE) -->
    <a href="https://www.facebook.com/francis.duong.0509" target="_blank" class="fab-button fab-facebook" aria-label="Visit our Facebook page">
        <i class="fab fa-facebook-f"></i>
    </a>

    <!-- To Top Button (BOTTOM - Utility) -->
    <button class="fab-button fab-to-top" id="fabToTop" aria-label="{{ __t('Lên đầu trang', 'Scroll to top') }}">
        <i class="fas fa-arrow-up"></i>
    </button>
</div>
