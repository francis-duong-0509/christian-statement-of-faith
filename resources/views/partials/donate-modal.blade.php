    <!-- Scripture Modal -->
    <div id="scriptureModal" class="scripture-modal d-none" role="dialog" aria-modal="true" aria-labelledby="modalTitle">
        <div class="modal-backdrop" data-dismiss="modal"></div>
        <div class="modal-container">
            <div class="modal-header">
                <h3 id="modalTitle" class="modal-title"></h3>
                <button class="modal-close" aria-label="Close modal" data-dismiss="modal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <p class="scripture-text"></p>
            </div>
            <div class="modal-footer">
                <small class="translation-info">Bản dịch 1925</small>
            </div>
        </div>
    </div>

    <!-- Donate Modal -->
    <div id="donateModal" class="donate-modal d-none" role="dialog" aria-modal="true" aria-labelledby="donateModalTitle">
        <div class="modal-backdrop" data-dismiss-donate="modal"></div>
        <div class="modal-container donate-modal-container">
            <!-- Header with Heartbeat Icon -->
            <div class="donate-modal-header">
                <div class="donate-icon-wrapper">
                    <i class="fas fa-heart donate-heart-icon"></i>
                </div>
                <h3 id="donateModalTitle" class="donate-modal-title">
                    <span>{{ __t('Tiền Của Quí Vị Chúng Tôi Sẽ Sử Dụng Để Giúp Đỡ Người Nghèo Dù Cho Đó là 1000 VNĐ', "Your gift will be used to help the poor, even if it's just 1000 VNĐ") }}</span>
                </h3>
                <p class="donate-subtitle">
                    <span>{{ __t('Mọi đóng góp chỉ để duy trì và giúp đỡ người nghèo khó. Không ăn lợi nhuận', 'Every gift makes a difference') }}</span>
                </p>
                <button class="modal-close" aria-label="Close modal" data-dismiss-donate="modal">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Body -->
            <div class="donate-modal-body">
                <!-- Thank You Message -->
                <div class="donate-message">
                    <p>
                        {{ __t('Mọi sự ủng hộ của bạn, dù là 1000 VNĐ chúng tôi cũng vẫn dùng để giúp đỡ người nghèo khó, không thu lợi nhuận, không làm sai trái với số tiền của quí vị.', "Your gift will be used to help the poor, even if it's just 1000 VNĐ. We operate entirely as a non-profit ministry and depend on the generous support of people like you. Every contribution is used faithfully for God's glory and to serve the Church.") }}
                    </p>
                    <p>
                        {{ __t('Cảm ơn bạn đã cân nhắc ủng hộ chúng tôi!', "Thank you for considering supporting this ministry!") }}
                    </p>
                </div>

                <!-- Two Column Layout for QR and Banking -->
                <div class="donate-content-grid">
                    <!-- Left Column: QR Code -->
                    <div class="qr-section">
                        <h4 class="qr-section-title">
                            <i class="fas fa-qrcode"></i>
                            <span>{{ __t('Quét Mã QR', 'Scan QR Code') }}</span>
                        </h4>
                        <div class="qr-card">
                            <div class="qr-code-wrapper">
                                <img src="{{ asset('uploads/images/qr_code.png') }}"
                                     alt="QR Code for Banking"
                                     class="qr-code-image">
                            </div>
                            <p class="qr-caption">
                                <span>{{ __t('Quét Mã Để Giúp Người Nghèo Khó - Mọi Số Tiền Đều Được Trân Trọng', 'Scan to Give - Any Amount Appreciated') }}</span>
                            </p>
                        </div>
                    </div>

                    <!-- Right Column: Banking Information -->
                    <div class="banking-section">
                        <h4 class="banking-section-title">
                            <i class="fas fa-university"></i>
                            <span>{{ __t('Chi Tiết Chuyển Khoản', 'Bank Transfer Details') }}</span>
                        </h4>
                        <div class="banking-details-panel">
                            <div class="banking-field">
                                <div class="banking-label">{{ __t('NGÂN HÀNG', 'BANK') }}</div>
                                <div class="banking-value">TPBank (Ngân hàng Thương mại Cổ phần Tiên Phong)</div>
                            </div>
                            <div class="banking-field">
                                <div class="banking-label">{{ __t('SỐ TÀI KHOẢN', 'ACCOUNT NUMBER') }}</div>
                                <div class="banking-value banking-account-number">0000 1474 648</div>
                            </div>
                            <div class="banking-field">
                                <div class="banking-label">{{ __t('CHỦ TÀI KHOẢN', 'ACCOUNT HOLDER') }}</div>
                                <div class="banking-value">DUONG ANH HAO</div>
                            </div>
                            <div class="banking-field">
                                <div class="banking-label">{{ __t('NỘI DUNG CHUYỂN KHOẢN', 'TRANSFER NOTE') }}</div>
                                <div class="banking-value">{{ __t('Ung ho Statement of Faith', 'Support Statement of Faith') }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="donate-modal-footer">
                <p class="donate-footer-text">
                    <span>{{ __t('Nguyện Chúa ban phước cho tấm lòng hào phóng của bạn.', 'May the Lord bless your generous heart.') }}</span>
                    <br>
                    <span class="scripture-ref">2 Cô-rinh-tô 9:7 "Mỗi người nên tùy theo lòng mình đã định mà quyên ra, không phải phàn nàn hay vì ép uổng; vì Đức Chúa Trời yêu kẻ thí của cách vui lòng."</span>
                </p>
            </div>
        </div>
    </div>
