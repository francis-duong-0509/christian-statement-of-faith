    <section class="statement-overview-section py-5" id="statement-of-faith">
        <div class="container">
            <!-- Section Header -->
            <div class="row text-center mb-5">
                <div class="col-lg-10 mx-auto">
                    <h2 class="section-title-main" data-aos="fade-up">
                        {{ __t('Chúng Tôi Tin Điều Gì', 'What We Believe') }}
                    </h2>
                    <p class="section-intro" data-aos="fade-up" data-aos-delay="100">
                        {{ __t('Những niềm tin thần học cốt lõi dựa trên Kinh Thánh', 'Core theological convictions grounded in Scripture') }}
                    </p>
                </div>
            </div>

            <!-- Statement Items Grid -->
            <div class="row g-4">
                @foreach($categories as $category)
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="statement-item">
                            <div class="statement-number">{{ $category->order }}</div>
                            <h3 class="statement-title">
                                <span>{{ $category->name }}</span>
                            </h3>
                            <p class="statement-description">
                                {{ $category->description }}
                            </p>
                            <div class="scripture-references">
                                <i class="fas fa-book-bible"></i>
                                <div class="scripture-list">
                                    @foreach($category->statements as $statement)
                                        @foreach($statement->scripture_references ?? [] as $reference)
                                            <span class="scripture-ref" style="font-size: 13px; color: #0c63d4; font-style: italic;">{{ $reference }}</span>{{ !$loop->last ? ',' : '' }}
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- CTA Button -->
            <div class="row mt-5">
                <div class="col text-center" data-aos="fade-up" data-aos-delay="700">
                    <a href="{{ route('faith.index') }}" class="btn btn-primary btn-lg">
                        <span>
                            {{ __t('Đọc Tuyên Bố Đức Tin Đầy Đủ', 'Read Complete Statement of Faith') }}
                        </span>
                        <i class="fas fa-arrow-right ms-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
