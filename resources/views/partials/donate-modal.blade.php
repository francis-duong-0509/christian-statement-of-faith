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
                    <span data-lang-en="Partner With Us in God's Work" data-lang-vi="Đồng Hành Cùng Chúng Tôi Trong Công Việc Chúa">Partner With Us in God's Work</span>
                </h3>
                <p class="donate-subtitle">
                    <span data-lang-en="Every gift makes a difference" data-lang-vi="Mọi đóng góp đều tạo nên khác biệt">Every gift makes a difference</span>
                </p>
                <button class="modal-close" aria-label="Close modal" data-dismiss-donate="modal">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <!-- Body -->
            <div class="donate-modal-body">
                <!-- Thank You Message -->
                <div class="donate-message">
                    <p data-lang-en="Your support, whether large or small, helps us continue sharing God's Word and developing quality theological resources. We believe equipping believers with deep biblical understanding is essential to the mission of proclaiming the Gospel."
                       data-lang-vi="Mọi sự ủng hộ của bạn, dù lớn hay nhỏ, đều giúp chúng tôi tiếp tục chia sẻ Lời Chúa và phát triển các tài nguyên thần học chất lượng. Chúng tôi tin rằng việc trang bị cho tín đồ hiểu biết sâu sắc về Kinh Thánh là phần thiết yếu trong sứ mạng loan báo Phúc Âm.">
                        Your support, whether large or small, helps us continue sharing God's Word and developing quality theological resources. We believe equipping believers with deep biblical understanding is essential to the mission of proclaiming the Gospel.
                    </p>
                    <p data-lang-en="We operate entirely as a non-profit ministry and depend on the generous support of people like you. Every contribution is used faithfully for God's glory and to serve the Church."
                       data-lang-vi="Chúng tôi hoạt động hoàn toàn phi lợi nhuận và phụ thuộc vào sự hỗ trợ hào phóng của những người như bạn. Mỗi đóng góp được sử dụng một cách trung tín để vinh hiển Đức Chúa Trời và phục vụ Hội Thánh.">
                        We operate entirely as a non-profit ministry and depend on the generous support of people like you. Every contribution is used faithfully for God's glory and to serve the Church.
                    </p>
                    <p data-lang-en="Thank you for considering supporting this ministry!"
                       data-lang-vi="Cảm ơn bạn đã cân nhắc ủng hộ chức vụ này!">
                        Thank you for considering supporting this ministry!
                    </p>
                </div>

                <!-- Two Column Layout for QR and Banking -->
                <div class="donate-content-grid">
                    <!-- Left Column: QR Code -->
                    <div class="qr-section">
                        <h4 class="qr-section-title">
                            <i class="fas fa-qrcode"></i>
                            <span data-lang-en="Scan QR Code" data-lang-vi="Quét Mã QR">Scan QR Code</span>
                        </h4>
                        <div class="qr-card">
                            <div class="qr-code-wrapper">
                                <img src="https://via.placeholder.com/260x260/1e3a5f/ffffff?text=QR+Banking"
                                     alt="QR Code for Banking"
                                     class="qr-code-image">
                            </div>
                            <p class="qr-caption">
                                <span data-lang-en="Scan to Give - Any Amount Appreciated" data-lang-vi="Quét Mã Để Dâng Hiến - Mọi Số Tiền Đều Được Trân Trọng">Scan to Give - Any Amount Appreciated</span>
                            </p>
                        </div>
                    </div>

                    <!-- Right Column: Banking Information -->
                    <div class="banking-section">
                        <h4 class="banking-section-title">
                            <i class="fas fa-university"></i>
                            <span data-lang-en="Bank Transfer Details" data-lang-vi="Chi Tiết Chuyển Khoản">Bank Transfer Details</span>
                        </h4>
                        <div class="banking-details-panel">
                            <div class="banking-field">
                                <div class="banking-label" data-lang-en="BANK" data-lang-vi="NGÂN HÀNG">BANK</div>
                                <div class="banking-value">Vietcombank (VCB)</div>
                            </div>
                            <div class="banking-field">
                                <div class="banking-label" data-lang-en="ACCOUNT NUMBER" data-lang-vi="SỐ TÀI KHOẢN">ACCOUNT NUMBER</div>
                                <div class="banking-value banking-account-number">1234 5678 9012</div>
                            </div>
                            <div class="banking-field">
                                <div class="banking-label" data-lang-en="ACCOUNT HOLDER" data-lang-vi="CHỦ TÀI KHOẢN">ACCOUNT HOLDER</div>
                                <div class="banking-value">STATEMENT OF FAITH</div>
                            </div>
                            <div class="banking-field">
                                <div class="banking-label" data-lang-en="BRANCH" data-lang-vi="CHI NHÁNH">BRANCH</div>
                                <div class="banking-value" data-lang-en="Ho Chi Minh City Branch" data-lang-vi="Chi nhánh TP. Hồ Chí Minh">Ho Chi Minh City Branch</div>
                            </div>
                            <div class="banking-field">
                                <div class="banking-label" data-lang-en="TRANSFER NOTE" data-lang-vi="NỘI DUNG CHUYỂN KHOẢN">TRANSFER NOTE</div>
                                <div class="banking-value" data-lang-en="Support Statement of Faith" data-lang-vi="Ung ho Statement of Faith">Support Statement of Faith</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div class="donate-modal-footer">
                <p class="donate-footer-text">
                    <span data-lang-en="May the Lord bless your generous heart." data-lang-vi="Nguyện Chúa ban phước cho tấm lòng hào phóng của bạn.">May the Lord bless your generous heart.</span>
                    <br>
                    <span class="scripture-ref">(2 Corinthians 9:7 / 2 Cô-rinh-tô 9:7)</span>
                </p>
            </div>
        </div>
    </div>
