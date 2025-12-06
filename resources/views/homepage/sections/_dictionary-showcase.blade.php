    <!-- Scripture Historical Context Section -->
    <section class="dictionary-showcase-section py-5">
        <div class="container">
            <!-- Section Header -->
            <div class="row text-center mb-5">
                <div class="col-lg-10 mx-auto">
                    <h2 class="section-title" data-aos="fade-up">
                        {{ __t('Tìm Hiểu Bối Cảnh Kinh Thánh', 'Scripture Historical Context') }}
                    </h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        {{ __t('Khám phá bối cảnh lịch sử, văn hóa và địa lý của từng đoạn Kinh Thánh để hiểu đúng Lời Chúa', 'Discover the historical, cultural and geographical context of Scripture passages to understand God\'s Word correctly') }}
                    </p>
                    <p class="dictionary-intro" data-aos="fade-up" data-aos-delay="200">
                        {{ __t('Hiểu rõ hoàn cảnh viết sách, phong tục thời đó, thể loại văn chương, và bối cảnh lịch sử-xã hội để đọc Kinh Thánh đúng cách.', 'Understand the writing circumstances, customs of the time, literary genres, and historical-social context to read the Bible correctly.') }}
                    </p>
                </div>
            </div>

            <!-- Feature Highlights - Updated for Historical Context -->
            <div class="row g-4 mb-5">
                <!-- Feature 1: Historical Background -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="dictionary-feature">
                        <div class="feature-icon">
                            <i class="fas fa-landmark"></i>
                        </div>
                        <h4 class="feature-title">
                            {{ __t('Bối Cảnh Lịch Sử', 'Historical Background') }}
                        </h4>
                        <p class="feature-description">
                            {{ __t('Tìm hiểu thời điểm viết sách, tình hình chính trị, các sự kiện lịch sử và hoàn cảnh của tác giả', 'Learn about when the book was written, political situation, historical events and author\'s circumstances') }}
                        </p>
                    </div>
                </div>

                <!-- Feature 2: Cultural Context -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="dictionary-feature">
                        <div class="feature-icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <h4 class="feature-title">
                            {{ __t('Bối Cảnh Văn Hóa', 'Cultural Context') }}
                        </h4>
                        <p class="feature-description">
                            {{ __t('Khám phá phong tục, tập quán, đời sống xã hội và tôn giáo thời Kinh Thánh để hiểu đúng ý nghĩa', 'Explore customs, traditions, social life and religion of biblical times to understand the correct meaning') }}
                        </p>
                    </div>
                </div>

                <!-- Feature 3: Literary Genres -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="dictionary-feature">
                        <div class="feature-icon">
                            <i class="fas fa-book"></i>
                        </div>
                        <h4 class="feature-title">
                            {{ __t('Thể Loại Văn Chương', 'Literary Genres') }}
                        </h4>
                        <p class="feature-description">
                            {{ __t('Xác định thể loại: Tường thuật, Thư tín, Thơ ca, Tiên tri, Khải huyền... và cách đọc đúng theo từng thể loại', 'Identify genres: Narrative, Epistle, Poetry, Prophecy, Apocalyptic... and how to read correctly by genre') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Sample Lookups - Updated for Historical Context -->
            <div class="row text-center mb-4">
                <div class="col-12">
                    <h3 class="sample-terms-title" data-aos="fade-up">
                        {{ __t('Ví Dụ Tra Cứu Bối Cảnh', 'Sample Context Lookups') }}
                    </h3>
                </div>
            </div>

            <div class="row g-4 mb-5">
                <!-- Sample 1: Romans - Paul's Letter -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="term-card scripture-card">
                        <span class="language-badge badge-greek">THƯ TÍN</span>
                        <div class="term-original">{{ __t('Rô-ma 1', 'Romans 1') }}</div>
                        <div class="term-vietnamese">{{ __t('Thư Phao-lô gửi Hội Thánh Rô-ma', 'Paul\'s Letter to the Roman Church') }}</div>
                        <div class="scripture-preview">
                            {{ __t('Bối cảnh: Phao-lô viết từ Cô-rinh-tô (~57 SCN), chuẩn bị đến Rô-ma lần đầu tiên...', 'Context: Paul wrote from Corinth (~57 AD), preparing to visit Rome for the first time...') }}
                        </div>
                        <div class="scripture-info">
                            <i class="fas fa-map-marker-alt me-2"></i>
                            {{ __t('Địa điểm • Thời gian • Người nhận • Mục đích viết', 'Location • Time • Recipients • Purpose') }}
                        </div>
                    </div>
                </div>

                <!-- Sample 2: Exodus - Historical Narrative -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="term-card scripture-card">
                        <span class="language-badge badge-hebrew">TƯỜNG THUẬT</span>
                        <div class="term-original">{{ __t('Xuất Hành 12', 'Exodus 12') }}</div>
                        <div class="term-vietnamese">{{ __t('Lễ Vượt Qua - Bối Cảnh Lịch Sử', 'The Passover - Historical Context') }}</div>
                        <div class="scripture-preview">
                            {{ __t('Bối cảnh: Dân Israel làm nô lệ tại Ai Cập ~430 năm, Pharaoh thời đó, văn hóa Ai Cập cổ đại...', 'Context: Israel enslaved in Egypt ~430 years, Pharaoh of that time, ancient Egyptian culture...') }}
                        </div>
                        <div class="scripture-info">
                            <i class="fas fa-clock me-2"></i>
                            {{ __t('Khoảng 1446 TCN • Văn hóa Ai Cập • Phong tục Lễ Vượt Qua', '~1446 BC • Egyptian culture • Passover customs') }}
                        </div>
                    </div>
                </div>

                <!-- Sample 3: Psalms - Poetry -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="term-card scripture-card">
                        <span class="language-badge badge-hebrew">THƠ CA</span>
                        <div class="term-original">{{ __t('Thánh Vịnh 23', 'Psalm 23') }}</div>
                        <div class="term-vietnamese">{{ __t('Thơ Ca Do Thái - Thể Loại và Cách Đọc', 'Hebrew Poetry - Genre and Reading') }}</div>
                        <div class="scripture-preview">
                            {{ __t('Thể loại: Thơ ca Do Thái với song hành (parallelism), hình ảnh mục đồng trong văn hóa Cận Đông cổ...', 'Genre: Hebrew poetry with parallelism, shepherd imagery in ancient Near Eastern culture...') }}
                        </div>
                        <div class="scripture-info">
                            <i class="fas fa-feather-alt me-2"></i>
                            {{ __t('Thơ song hành • Hình ảnh mục đồng • Đa-vít tác giả', 'Parallelism • Shepherd imagery • David as author') }}
                        </div>
                    </div>
                </div>

                <!-- Sample 4: Revelation - Apocalyptic -->
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="term-card scripture-card">
                        <span class="language-badge badge-greek">KHẢI HUYỀN</span>
                        <div class="term-original">{{ __t('Khải Huyền 1', 'Revelation 1') }}</div>
                        <div class="term-vietnamese">{{ __t('Văn Chương Khải Huyền - Cách Đọc Đúng', 'Apocalyptic Literature - How to Read Correctly') }}</div>
                        <div class="scripture-preview">
                            {{ __t('Thể loại: Khải huyền (apocalyptic), viết cho 7 hội thánh Tiểu Á dưới sự bách hại của La Mã...', 'Genre: Apocalyptic literature, written to 7 churches in Asia Minor under Roman persecution...') }}
                        </div>
                        <div class="scripture-info">
                            <i class="fas fa-scroll me-2"></i>
                            {{ __t('~95 SCN • Bách hại La Mã • Biểu tượng khải huyền', '~95 AD • Roman persecution • Apocalyptic symbols') }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- How It Works - Updated -->
            <div class="row mb-5">
                <div class="col-12">
                    <div class="how-it-works" data-aos="fade-up">
                        <h3 class="text-center mb-4">{{ __t('Cách Tra Cứu Bối Cảnh', 'How to Look Up Context') }}</h3>
                        <div class="row g-4">
                            <div class="col-md-4 text-center">
                                <div class="step-number">1</div>
                                <h5>{{ __t('Chọn Đoạn Kinh Thánh', 'Select Scripture') }}</h5>
                                <p class="text-muted">{{ __t('Chọn Cựu Ước hoặc Tân Ước, chọn sách và chương/câu cần tìm hiểu bối cảnh', 'Select Old or New Testament, choose book and chapter/verses to explore context') }}</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="step-number">2</div>
                                <h5>{{ __t('Phân Tích Bối Cảnh', 'Context Analysis') }}</h5>
                                <p class="text-muted">{{ __t('Hệ thống phân tích lịch sử, văn hóa, địa lý và thể loại văn chương', 'System analyzes history, culture, geography and literary genre') }}</p>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="step-number">3</div>
                                <h5>{{ __t('Hiểu Đúng Kinh Thánh', 'Understand Scripture') }}</h5>
                                <p class="text-muted">{{ __t('Nhận bối cảnh chi tiết giúp bạn đọc và hiểu Kinh Thánh đúng cách', 'Receive detailed context to help you read and understand Scripture correctly') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Button -->
            <div class="row">
                <div class="col text-center" data-aos="fade-up" data-aos-delay="500">
                    <a href="{{ route('dictionary.index') }}" class="btn btn-primary btn-lg">
                        <span>{{ __t('Khám Phá Bối Cảnh Ngay', 'Explore Context Now') }}</span>
                        <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
