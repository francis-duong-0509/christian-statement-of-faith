# Christian Statement of Faith - Tín Lý Cơ Đốc

<p align="center">
  <img src="https://img.shields.io/badge/Laravel-12-red?style=for-the-badge&logo=laravel" alt="Laravel 12">
  <img src="https://img.shields.io/badge/PHP-8.2+-blue?style=for-the-badge&logo=php" alt="PHP 8.2+">
  <img src="https://img.shields.io/badge/Filament-3.0-orange?style=for-the-badge" alt="Filament 3.0">
  <img src="https://img.shields.io/badge/Bootstrap-5.3.8-purple?style=for-the-badge&logo=bootstrap" alt="Bootstrap 5.3.8">
</p>

## 📖 Giới Thiệu

**Christian Statement of Faith** là một ứng dụng web song ngữ (Tiếng Việt/Tiếng Anh) dành cho việc trình bày các tuyên bố đức tin thần học với tham chiếu Kinh Thánh. Dự án được xây dựng bằng Laravel 12 và Filament 3 cho trang quản trị, với giao diện người dùng hiện đại sử dụng Bootstrap 5 + SCSS tùy chỉnh.

### 🎯 Mục Đích

Cung cấp một nền tảng để:
- Chia sẻ tín lý Cơ Đốc giáo nguyên chất và chính xác
- Tra cứu và giảng giải Kinh Thánh theo phương pháp Expository Preaching
- Xuất bản các bài viết thần học và tài liệu học tập
- Hỗ trợ cả tiếng Việt và tiếng Anh để tiếp cận đa dạng đối tượng

### Backend
- **Laravel 12** - PHP Framework hiện đại
- **PHP 8.2+** - Ngôn ngữ lập trình
- **Filament 3.0** - Trang quản trị (Admin Panel)
- **MySQL 8.0** - Cơ sở dữ liệu
- **Redis 7.2** - Cache và Queue

### Frontend
- **Bootstrap 5.3.8** - CSS Framework
- **Alpine.js 3.14** - JavaScript Framework nhẹ
- **SCSS** - CSS Preprocessor tùy chỉnh
- **Vite 7** - Build Tool hiện đại
- **AOS (Animate On Scroll)** - Thư viện animation

### DevOps
- **Docker** - Container hóa ứng dụng
- **Docker Compose** - Quản lý nhiều container
- **Nginx** - Web server
- **Supervisor** - Quản lý process

### API & Dịch Vụ Bên Ngoài
- **Bolls.life API** - Lấy văn bản Kinh Thánh (VI1934, WLC, TISCH)
- **OpenAI GPT-4o-mini** - Tạo giảng giải thần học

## 🎨 Các Module Chính

### 1. 📜 Tín Lý (Statement of Faith)

Module trình bày các tuyên bố đức tin thần học có hệ thống.

**Tính năng:**
- **Danh mục tín lý** (Faith Categories):
  - Các chủ đề thần học: Đức Chúa Trời, Kinh Thánh, Sự Cứu Rỗi, v.v.
  - Mô tả chi tiết với tham chiếu Kinh Thánh
  - Ảnh banner cho mỗi danh mục
  - Hỗ trợ song ngữ (Tiếng Việt/English)

- **Tuyên bố tín lý** (Faith Statements):
  - Nội dung tuyên bố chi tiết cho từng danh mục
  - Rich text editor với hỗ trợ định dạng
  - Tham chiếu Kinh Thánh (JSON array)
  - Ảnh minh họa và metadata SEO
  - Slug tự động cho URL thân thiện

**Routes:**
```
GET  /statement-of-faith              # Danh sách các danh mục
GET  /statement-of-faith/{category}   # Chi tiết danh mục + tuyên bố
GET  /statement-of-faith/{category}/{statement}  # Chi tiết tuyên bố
```

**Database:**
- `faith_categories`: Lưu các danh mục tín lý
- `faith_statements`: Lưu các tuyên bố chi tiết

### 2. 📝 Blog (Blog Posts)

Module quản lý và xuất bản bài viết thần học.

**Tính năng:**
- **Quản lý bài viết**:
  - Tiêu đề và nội dung song ngữ
  - Rich text editor với hỗ trợ markdown
  - Ảnh đại diện và ảnh banner
  - Trích dẫn (excerpt) tự động hoặc tùy chỉnh
  - Thời gian đọc ước tính

- **Danh mục bài viết**:
  - Phân loại bài viết theo chủ đề
  - Icon và màu sắc tùy chỉnh cho mỗi danh mục
  - Đếm số bài viết trong mỗi danh mục

- **Tính năng nâng cao**:
  - SEO metadata (title, description)
  - Tags/keywords
  - Trạng thái xuất bản (draft/published)
  - Lịch xuất bản tự động
  - Reading progress bar
  - Table of contents tự động từ H2/H3

**Routes:**
```
GET  /blog                  # Danh sách bài viết
GET  /blog/{slug}           # Chi tiết bài viết
GET  /blog/category/{slug}  # Bài viết theo danh mục
```

**Database:**
- `blog_categories`: Danh mục bài viết
- `blog_posts`: Nội dung bài viết

### 3. 📖 Giảng Giải Kinh (Scripture Exegesis)

Module tra cứu và phân tích chi tiết các đoạn Kinh Thánh với giảng giải thần học từ ngôn ngữ gốc.

**Tính năng:**
- **Tra cứu đa dạng**:
  - Tra cứu cả chương (ví dụ: "Ma-thi-ơ 5")
  - Tra cứu đoạn câu (ví dụ: "Giăng 3:16-21")
  - Hỗ trợ Cựu Ước (39 sách) và Tân Ước (27 sách)
  - Tự động điều chỉnh số câu thực tế (ví dụ: Ma-thi-ơ 5 = 48 câu)

- **Phân tích chuyên sâu**:
  - Văn bản tiếng Việt từ bản dịch 1925
  - Phân tích từ ngôn ngữ gốc (Tiếng Do Thái/Hy Lạp)
  - Giảng giải theo phương pháp Expository Preaching
  - AI-generated exegesis từ GPT-4o-mini

- **Nội dung giảng giải**:
  - **Ngữ cảnh lịch sử và văn hóa**: Tác giả, người nhận, hoàn cảnh
  - **Phân tích từng câu**: Từ ngữ quan trọng từ ngôn ngữ gốc
  - **Ý nghĩa thần học**: Các điểm thần học chính
  - **Kết luận**: Tóm tắt và ứng dụng thực tế

- **Thần học thuần túy**:
  - 100% ân điển Đức Chúa Trời (Sola Gratia)
  - Con người hoàn toàn sa ngã (Total Depravity)
  - Đức Chúa Trời chủ quyền tuyệt đối
  - Tránh Pelagian và Semi-Pelagian
  - Lấy ý từ Kinh Thánh, không từ triết học

- **Tối ưu hóa hiệu năng**:
  - Dynamic token scaling (6000-12000 tokens)
  - Timeout điều chỉnh theo độ dài (180-240s)
  - Logging chi tiết cho debug
  - Không lưu cache (theo yêu cầu người dùng)

**Routes:**
```
GET   /dictionary         # Trang tra cứu
POST  /dictionary/lookup  # Xử lý tra cứu
```

**APIs sử dụng:**
- **Bolls.life API**: Lấy văn bản Kinh Thánh
  - VI1934: Bản dịch Việt 1925
  - WLC: Tiếng Do Thái gốc (Cựu Ước)
  - TISCH: Tiếng Hy Lạp gốc (Tân Ước)

- **OpenAI GPT-4o-mini**: Tạo giảng giải
  - Model: `gpt-4o-mini`
  - Temperature: 0.7
  - Max tokens: 6000-12000 (tùy độ dài)

**Services:**
- `ScriptureReferenceParser`: Parse và validate tham chiếu
- `BibleApiService`: Lấy văn bản từ Bolls.life
- `OpenAiExegesisService`: Tạo giảng giải thần học
- `DictionaryService`: Điều phối toàn bộ quy trình

## 🌐 Hệ Thống Song Ngữ

### Cơ chế hoạt động:

1. **Phát hiện ngôn ngữ**: Middleware `SetLocale`
   - Lấy locale từ session hoặc mặc định 'en'
   - Áp dụng cho tất cả routes

2. **Lưu trữ dữ liệu**:
   - Mỗi field có 2 cột: `field_vi` và `field_en`
   - Ví dụ: `name_vi`, `name_en`, `slug_vi`, `slug_en`

3. **Helper functions**:
   - `__t($vi, $en)`: Dịch nhanh inline
   - `current_locale_field($field)`: Lấy tên field theo locale

4. **Model accessors**:
   ```php
   $category->name  // Tự động trả về name_vi hoặc name_en
   ```

5. **Route binding**:
   - Routes tự động resolve model theo slug locale-specific
   - Ví dụ: `/statement-of-faith/than-hoc` → `slug_vi`

6. **Chuyển đổi ngôn ngữ**:
   - Route: `/language/{locale}` (vi|en)
   - Lưu trong session

## 🚀 Cài Đặt

### Yêu Cầu

- Docker & Docker Compose
- Git

### Các Bước Cài Đặt

1. **Clone repository:**
   ```bash
   git clone <repository-url>
   cd christian-statement-of-faith
   ```

2. **Cấu hình môi trường:**
   ```bash
   # Copy file cấu hình Docker
   cp devops/local/.env.example devops/local/.env

   # Copy file cấu hình Laravel
   cp .env.example .env
   ```

3. **Cấu hình API keys trong `.env`:**
   ```env
   OPENAI_API_KEY=your_openai_api_key_here
   ```

4. **Khởi động Docker:**
   ```bash
   cd devops/local
   ./start.sh
   ```

5. **Truy cập ứng dụng:**
   - Frontend: http://localhost:8100
   - Admin: http://localhost:8100/admin
   - Vite Dev Server: http://localhost:8109

### Cấu Hình Ports (tùy chỉnh trong `devops/local/.env`)

- `DOCKER_NGINX_PORT`: 8100 (HTTP)
- `DOCKER_MYSQL_PORT`: 8101 (MySQL)
- `DOCKER_REDIS_PORT`: 8103 (Redis)
- `DOCKER_VITE_PORT`: 8109 (Vite HMR)

## 💻 Development

### Làm việc với Docker

```bash
# Vào container
cd devops/local
docker compose exec app bash

# Chạy lệnh trong container
docker compose exec app php artisan migrate
docker compose exec app composer install
docker compose exec app npm install
docker compose exec app npm run dev

# Dừng containers
docker compose down
```

### Commands Laravel Thông Dụng

```bash
# Migration
php artisan migrate
php artisan db:seed

# Clear cache
php artisan cache:clear
php artisan view:clear
php artisan config:clear

# Testing
composer test
php artisan test --coverage

# Code formatting
./vendor/bin/pint
```

### Frontend Development

```bash
# Development mode (HMR)
npm run dev

# Production build
npm run build

# Full dev environment (server + queue + logs + vite)
composer dev
```

## 🎨 Hệ Thống Thiết Kế

### Màu Sắc

- **Primary**: `#1e3a5f` (Navy Blue) - Màu chủ đạo
- **Secondary**: `#8b4513` (Saddle Brown) - Màu phụ

### Typography

- **Sans-serif**: Inter - Văn bản thông thường
- **Serif**: Merriweather - Tiêu đề và trích dẫn
- **Base font size**: 18px
- **Container max-width**: 1176px

### Breakpoints (Bootstrap 5)

- `xs`: < 576px
- `sm`: ≥ 576px
- `md`: ≥ 768px
- `lg`: ≥ 992px
- `xl`: ≥ 1200px
- `xxl`: ≥ 1400px

## 📁 Cấu Trúc Thư Mục

```
.
├── app/
│   ├── Filament/Resources/    # Admin panel resources
│   ├── Http/Controllers/      # Controllers
│   ├── Models/               # Eloquent models
│   ├── Services/             # Business logic services
│   └── View/Components/      # Blade components
├── config/
│   └── bible_books.php       # Mapping tên sách Kinh Thánh
├── database/
│   ├── migrations/           # Database migrations
│   ├── seeders/             # Data seeders
│   └── factories/           # Model factories
├── devops/local/            # Docker configuration
├── resources/
│   ├── js/
│   │   └── modules/         # JavaScript modules
│   ├── scss/                # SCSS files
│   │   ├── base/           # Reset, typography
│   │   ├── components/     # UI components
│   │   ├── layout/         # Header, footer
│   │   ├── pages/          # Page-specific styles
│   │   └── utilities/      # Utility classes
│   └── views/              # Blade templates
├── routes/
│   └── web.php             # Web routes
├── CLAUDE.md               # Project documentation for AI
└── README.md               # This file
```

## 🔒 Bảo Mật

- CSRF protection (Laravel default)
- XSS protection qua Blade escaping
- SQL injection protection qua Eloquent ORM
- Rate limiting cho API calls
- Environment variables cho sensitive data

## 📊 Database Schema

### faith_categories
- Danh mục tín lý với nội dung song ngữ
- Tham chiếu Kinh Thánh (JSON)
- Banner image, order, is_active

### faith_statements
- Tuyên bố tín lý chi tiết
- Liên kết với faith_categories
- SEO metadata, images

### blog_categories
- Danh mục blog với icon và màu sắc
- Slug, order, is_active

### blog_posts
- Bài viết blog đầy đủ
- Liên kết với blog_categories
- Publish date, SEO, tags

## 🧪 Testing

```bash
# Chạy tất cả tests
composer test

# Chạy test cụ thể
php artisan test tests/Feature/DictionaryTest.php

# Test với coverage
php artisan test --coverage
```

## 📈 Performance

- **Vite HMR**: Hot Module Replacement cho development
- **SCSS compilation**: CSS được tối ưu hóa
- **Lazy loading**: Images được lazy load
- **AOS animations**: Smooth scroll animations
- **Route caching**: Production caching enabled

## 🤝 Đóng Góp

Hiện tại dự án này là private project. Nếu bạn có đề xuất hoặc phát hiện lỗi, vui lòng liên hệ qua email.

## 📝 License

Dự án này được phát triển cho mục đích cá nhân và phi thương mại.

## 📧 Liên Hệ

Nếu có thắc mắc về dự án, vui lòng liên hệ qua:
- Email: [your-email@example.com]
- GitHub Issues: [repository-url]/issues

---

**Được xây dựng với ❤️ và Sola Scriptura**
