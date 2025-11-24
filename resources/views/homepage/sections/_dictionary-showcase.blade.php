    <!-- Dictionary Showcase Section -->
    <section class="dictionary-showcase-section py-5">
        <div class="container">
            <!-- Section Header -->
            <div class="row text-center mb-5">
                <div class="col-lg-10 mx-auto">
                    <h2 class="section-title" data-aos="fade-up">
                        {{ __t('Từ Điển Kinh Thánh Đa Ngôn Ngữ', 'Multilingual Biblical Dictionary') }}
                    </h2>
                    <p class="section-subtitle" data-aos="fade-up" data-aos-delay="100">
                        {{ __t('Tra cứu từ ngữ thần học từ tiếng Hebrew (Cựu Ước), Greek (Tân Ước), và English với giải nghĩa tiếng Việt chi tiết', 'Look up theological terms from Hebrew (Old Testament), Greek (New Testament), and English with detailed Vietnamese explanations') }}
                    </p>
                    <p class="dictionary-intro" data-aos="fade-up" data-aos-delay="200">
                        {{ __t('Tiếng Việt không thể diễn tả đúng ngữ nghĩa và bối cảnh của nhiều từ ngữ trong Kinh Thánh. Từ điển của chúng tôi cung cấp nghĩa gốc từ tiếng Hebrew và Greek, giúp bạn hiểu sâu sắc học thuật Kinh Thánh.', 'Vietnamese cannot fully express the nuances and context of many Biblical terms. Our dictionary provides original meanings from Hebrew and Greek, helping you understand Scripture with scholarly depth.') }}
                    </p>
                </div>
            </div>

            <!-- Feature Highlights -->
            <div class="row g-4 mb-5">
                <!-- Feature 1: Hebrew -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="dictionary-feature">
                        <div class="feature-icon">
                            <i class="fas fa-scroll"></i>
                            <span class="hebrew-letter">א</span>
                        </div>
                        <h4 class="feature-title">
                            {{ __t('Từ Ngữ Do Thái (Cựu Ước)', 'Hebrew Terms (Old Testament)') }}
                        </h4>
                        <p class="feature-description">
                            {{ __t('Từ ngữ gốc Cựu Ước với nghĩa và bối cảnh tiếng Việt', 'Original Old Testament words with Vietnamese meanings and context') }}
                        </p>
                    </div>
                </div>

                <!-- Feature 2: Greek -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="dictionary-feature">
                        <div class="feature-icon">
                            <i class="fas fa-book-open"></i>
                            <span class="greek-letter">Α</span>
                        </div>
                        <h4 class="feature-title">
                            {{ __t('Từ Ngữ Hy Lạp (Tân Ước)', 'Greek Terms (New Testament)') }}
                        </h4>
                        <p class="feature-description">
                            {{ __t('Từ ngữ Greek Tân Ước với giải thích bối cảnh tiếng Việt', 'New Testament Greek with contextual Vietnamese explanations') }}
                        </p>
                    </div>
                </div>

                <!-- Feature 3: English -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="dictionary-feature">
                        <div class="feature-icon">
                            <i class="fas fa-language"></i>
                        </div>
                        <h4 class="feature-title">
                            {{ __t('Thuật Ngữ Thần Học Tiếng Anh', 'English Theological Terms') }}
                        </h4>
                        <p class="feature-description">
                            {{ __t('Các khái niệm thần học chủ chốt được giải thích rõ ràng bằng tiếng Việt', 'Key theological concepts explained clearly in Vietnamese') }}
                        </p>
                    </div>
                </div>
            </div>

            <!-- Sample Terms -->
            <div class="row text-center mb-4">
                <div class="col-12">
                    <h3 class="sample-terms-title" data-aos="fade-up">
                        {{ __t('Mẫu Từ Điển', 'Sample Dictionary Entries') }}
                    </h3>
                </div>
            </div>

            <div class="row g-4 mb-5">
                <!-- Term 1: Agape (Greek) -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="term-card">
                        <span class="language-badge badge-greek">GREEK</span>
                        <div class="term-original">ἀγάπη</div>
                        <div class="term-transliteration">(agapē)</div>
                        <div class="term-vietnamese">Tình yêu thương của Đức Chúa Trời</div>
                        <div class="term-english">God's unconditional love</div>
                        <a href="/dictionary/agape" class="term-link">
                            <span data-lang-en="View Definition" data-lang-vi="Xem Định Nghĩa">View Definition</span>
                            <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Term 2: Chesed (Hebrew) -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="term-card">
                        <span class="language-badge badge-hebrew">HEBREW</span>
                        <div class="term-original">חֶסֶד</div>
                        <div class="term-transliteration">(chesed)</div>
                        <div class="term-vietnamese">Lòng thương xót bền vững</div>
                        <div class="term-english">Steadfast love/covenant faithfulness</div>
                        <a href="/dictionary/chesed" class="term-link">
                            <span data-lang-en="View Definition" data-lang-vi="Xem Định Nghĩa">View Definition</span>
                            <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Term 3: Justification (English) -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="term-card">
                        <span class="language-badge badge-english">ENGLISH</span>
                        <div class="term-original">Justification</div>
                        <div class="term-transliteration"></div>
                        <div class="term-vietnamese">Xưng Công Bình</div>
                        <div class="term-english">Legal declaration of righteousness</div>
                        <a href="/dictionary/justification" class="term-link">
                            <span data-lang-en="View Definition" data-lang-vi="Xem Định Nghĩa">View Definition</span>
                            <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Term 4: Pistis (Greek) -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="term-card">
                        <span class="language-badge badge-greek">GREEK</span>
                        <div class="term-original">πίστις</div>
                        <div class="term-transliteration">(pistis)</div>
                        <div class="term-vietnamese">Đức tin</div>
                        <div class="term-english">Faith/trust/belief</div>
                        <a href="/dictionary/pistis" class="term-link">
                            <span data-lang-en="View Definition" data-lang-vi="Xem Định Nghĩa">View Definition</span>
                            <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Term 5: Berith (Hebrew) -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="term-card">
                        <span class="language-badge badge-hebrew">HEBREW</span>
                        <div class="term-original">בְּרִית</div>
                        <div class="term-transliteration">(berith)</div>
                        <div class="term-vietnamese">Giao ước</div>
                        <div class="term-english">Covenant</div>
                        <a href="/dictionary/berith" class="term-link">
                            <span data-lang-en="View Definition" data-lang-vi="Xem Định Nghĩa">View Definition</span>
                            <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>

                <!-- Term 6: Sanctification (English) -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="term-card">
                        <span class="language-badge badge-english">ENGLISH</span>
                        <div class="term-original">Sanctification</div>
                        <div class="term-transliteration"></div>
                        <div class="term-vietnamese">Sự Nên Thánh</div>
                        <div class="term-english">Process of becoming holy</div>
                        <a href="/dictionary/sanctification" class="term-link">
                            <span data-lang-en="View Definition" data-lang-vi="Xem Định Nghĩa">View Definition</span>
                            <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- CTA Button -->
            <div class="row">
                <div class="col text-center" data-aos="fade-up" data-aos-delay="700">
                    <a href="#" class="btn btn-primary btn-lg">
                        <span>{{ __t('Khám Phá Từ Điển Đầy Đủ', 'Explore Full Dictionary') }}</span>
                        <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
