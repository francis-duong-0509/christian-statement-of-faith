    <!-- Scripture Exegesis Showcase Section -->
    <section class="dictionary-showcase-section py-5">
        <div class="container">
            <!-- Section Header -->
            <div class="row text-center mb-5">
                <div class="col-lg-10 mx-auto">
                    <h2 class="section-title" data-aos="fade-up">
                        {{ __t('Giảng Giải Kinh Thánh', 'Scripture Exegesis') }}
                    </h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        {{ __t('Tra cứu và phân tích chi tiết từng đoạn Kinh Thánh với giảng giải thần học sâu sắc từ ngôn ngữ gốc', 'Look up and analyze Scripture passages with deep theological exegesis from original languages') }}
                    </p>
                    <p class="dictionary-intro" data-aos="fade-up" data-aos-delay="200">
                        {{ __t('Hiểu rõ ý nghĩa sâu sắc của Lời Chúa qua phương pháp giảng giải nguyên văn (Expository Preaching), phân tích từ ngôn ngữ gốc Tiếng Do Thái (Cựu Ước) và Tiếng Hy Lạp (Tân Ước).', 'Understand the deep meaning of God\'s Word through expository preaching method, analyzing from original Hebrew (Old Testament) and Greek (New Testament) languages.') }}
                    </p>
                </div>
            </div>

            <!-- Feature Highlights -->
            <div class="row g-4 mb-5">
                <!-- Feature 1: Old Testament -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="dictionary-feature">
                        <div class="feature-icon">
                            <i class="fas fa-scroll"></i>
                            <span class="hebrew-letter">א</span>
                        </div>
                        <h4 class="feature-title">
                            {{ __t('Cựu Ước (Do Thái)', 'Old Testament (Hebrew)') }}
                        </h4>
                        <p class="feature-description">
                            {{ __t('Giảng giải các đoạn Cựu Ước với phân tích từ tiếng Do Thái gốc và bối cảnh lịch sử', 'Expound Old Testament passages with analysis from original Hebrew and historical context') }}
                        </p>
                    </div>
                </div>

                <!-- Feature 2: New Testament -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="dictionary-feature">
                        <div class="feature-icon">
                            <i class="fas fa-book-open"></i>
                            <span class="greek-letter">Α</span>
                        </div>
                        <h4 class="feature-title">
                            {{ __t('Tân Ước (Hy Lạp)', 'New Testament (Greek)') }}
                        </h4>
                        <p class="feature-description">
                            {{ __t('Phân tích chi tiết các đoạn Tân Ước từ tiếng Hy Lạp Koinē gốc với ý nghĩa thần học chính xác', 'Detailed analysis of New Testament passages from original Koine Greek with accurate theological meaning') }}
                        </p>
                    </div>
                </div>

                <!-- Feature 3: Verse-by-Verse -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="dictionary-feature">
                        <div class="feature-icon">
                            <i class="fas fa-list-ol"></i>
                        </div>
                        <h4 class="feature-title">
                            {{ __t('Phân Tích Từng Câu', 'Verse-by-Verse Analysis') }}
                        </h4>
                        <p class="feature-description">
                            {{ __t('Giảng giải chi tiết từng câu Kinh Thánh hoặc tra cứu toàn bộ chương với phương pháp giải kinh nguyên văn', 'Detailed verse-by-verse exposition or lookup entire chapters with expository preaching method') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Sample Lookups -->
            <div class="row text-center mb-4">
                <div class="col-12">
                    <h3 class="sample-terms-title" data-aos="fade-up">
                        {{ __t('Ví Dụ Tra Cứu', 'Sample Lookups') }}
                    </h3>
                </div>
            </div>

            <div class="row g-4 mb-5">
                <!-- Sample 1: Sermon on the Mount -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="term-card scripture-card">
                        <span class="language-badge badge-greek">TÂN ƯỚC</span>
                        <div class="term-original">{{ __t('Ma-thi-ơ 5', 'Matthew 5') }}</div>
                        <div class="term-vietnamese">{{ __t('Bài Giảng Trên Núi - Phân Tích Toàn Chương', 'Sermon on the Mount - Full Chapter Analysis') }}</div>
                        <div class="scripture-preview">
                            {{ __t('"Phước cho người nào có lòng nghèo khổ, vì nước thiên đàng thuộc về họ..."', '"Blessed are the poor in spirit, for theirs is the kingdom of heaven..."') }}
                        </div>
                        <div class="scripture-info">
                            <i class="fas fa-list-ol me-2"></i>
                            {{ __t('48 câu • Giảng giải chi tiết từ Hy Lạp gốc', '48 verses • Detailed exegesis from original Greek') }}
                        </div>
                    </div>
                </div>

                <!-- Sample 2: John 3:16-21 -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="term-card scripture-card">
                        <span class="language-badge badge-greek">TÂN ƯỚC</span>
                        <div class="term-original">{{ __t('Giăng 3:16-21', 'John 3:16-21') }}</div>
                        <div class="term-vietnamese">{{ __t('Tình Yêu Thương Của Đức Chúa Trời - Phân Tích Đoạn Văn', 'God\'s Love - Passage Analysis') }}</div>
                        <div class="scripture-preview">
                            {{ __t('"Vì Đức Chúa Trời yêu thương thế gian, đến nỗi đã ban Con Một..."', '"For God so loved the world that he gave his one and only Son..."') }}
                        </div>
                        <div class="scripture-info">
                            <i class="fas fa-list-ol me-2"></i>
                            {{ __t('6 câu • Giảng giải thần học về sự cứu rỗi', '6 verses • Theological exposition on salvation') }}
                        </div>
                    </div>
                </div>

                <!-- Sample 3: Genesis 1 -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="term-card scripture-card">
                        <span class="language-badge badge-hebrew">CỰU ƯỚC</span>
                        <div class="term-original">{{ __t('Sáng Thế Ký 1', 'Genesis 1') }}</div>
                        <div class="term-vietnamese">{{ __t('Sự Sáng Tạo - Phân Tích Toàn Chương', 'Creation - Full Chapter Analysis') }}</div>
                        <div class="scripture-preview">
                            {{ __t('"Ban đầu Đức Chúa Trời dựng nên trời đất..."', '"In the beginning God created the heavens and the earth..."') }}
                        </div>
                        <div class="scripture-info">
                            <i class="fas fa-list-ol me-2"></i>
                            {{ __t('31 câu • Giảng giải từ tiếng Do Thái gốc', '31 verses • Exegesis from original Hebrew') }}
                        </div>
                    </div>
                </div>

                <!-- Sample 4: Psalm 23 -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="term-card scripture-card">
                        <span class="language-badge badge-hebrew">CỰU ƯỚC</span>
                        <div class="term-original">{{ __t('Thi Thiên 23', 'Psalm 23') }}</div>
                        <div class="term-vietnamese">{{ __t('Đức Giê-hô-va Là Mục Giả Tôi - Phân Tích Toàn Chương', 'The Lord is My Shepherd - Full Chapter Analysis') }}</div>
                        <div class="scripture-preview">
                            {{ __t('"Đức Giê-hô-va là mục giả tôi; tôi sẽ chẳng thiếu thốn gì..."', '"The Lord is my shepherd; I shall not want..."') }}
                        </div>
                        <div class="scripture-info">
                            <i class="fas fa-list-ol me-2"></i>
                            {{ __t('6 câu • Phân tích từ ngữ quan trọng trong Do Thái', '6 verses • Analysis of key Hebrew terms') }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- How It Works -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="how-it-works" data-aos="fade-up">
                        <h3 class="text-center mb-4">{{ __t('Cách Tra Cứu', 'How to Look Up') }}</h3>
                        <div class="row g-4">
                            <div class="col-md-4 text-center">
                                <div class="step-number">1</div>
                                <h5>{{ __t('Chọn Giao Ước', 'Select Testament') }}</h5>
                                <p class="text-muted">{{ __t('Chọn Cựu Ước hoặc Tân Ước và chọn sách cần tra cứu', 'Select Old or New Testament and choose the book') }}</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="step-number">2</div>
                                <h5>{{ __t('Nhập Chương/Câu', 'Enter Chapter/Verses') }}</h5>
                                <p class="text-muted">{{ __t('Nhập số chương (cả chương) hoặc khoảng câu cụ thể (4-6 câu trở lên)', 'Enter chapter number (whole chapter) or specific verse range (4-6+ verses)') }}</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="step-number">3</div>
                                <h5>{{ __t('Nhận Giảng Giải', 'Receive Exegesis') }}</h5>
                                <p class="text-muted">{{ __t('Nhận phân tích chi tiết với ngữ cảnh lịch sử và ý nghĩa thần học', 'Receive detailed analysis with historical context and theological meaning') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Button -->
            <div class="row">
                <div class="col text-center" data-aos="fade-up" data-aos-delay="500">
                    <a href="{{ route('dictionary.index') }}" class="btn btn-primary btn-lg">
                        <span>{{ __t('Bắt Đầu Tra Cứu Ngay', 'Start Looking Up Now') }}</span>
                        <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
