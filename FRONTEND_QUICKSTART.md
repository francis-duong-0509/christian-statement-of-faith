# Frontend Quick Start Guide

## What's Been Implemented

✅ **Complete SCSS Architecture** (21 files)
- Design system with variables, mixins
- Component styles (buttons, cards, forms, badges, etc.)
- Layout styles (header, footer, containers)
- Page-specific styles (home, blog, dictionary, faith)
- Utility classes

✅ **JavaScript Modules** (8 modules + main file)
- Navigation (mobile menu)
- Smooth scrolling
- Back to top button
- Reading progress bar
- Lazy loading images
- Search functionality
- Scripture tooltips
- Table of contents

✅ **Enhanced Laravel Layout**
- Updated master layout with new design
- Responsive navigation
- Comprehensive footer
- Vite asset integration

✅ **Complete Documentation**
- Design system guide
- Implementation details
- Code examples

## Quick Commands

### Development

```bash
# Start with Docker (recommended per CLAUDE.md)
cd devops/local && ./start.sh

# OR start Vite manually
npm run dev

# View the site
open http://localhost:8100
```

### Building Assets

```bash
# Development build
npm run dev

# Production build
npm run build
```

### Common Tasks

```bash
# Clear caches
php artisan cache:clear && php artisan view:clear

# Check routes
php artisan route:list

# Run tests
php artisan test
```

## File Structure Overview

```
resources/
├── scss/app.scss          # → Import this in Vite
├── scss/_variables.scss   # → Design tokens
├── scss/_mixins.scss      # → Reusable patterns
├── scss/[base,layout,components,pages,utilities]/
├── js/app.js             # → Main JS entry
├── js/modules/           # → Feature modules
└── views/layouts/app.blade.php  # → Master layout
```

## Next Steps (What You Need To Do)

### Priority 1: Update Existing Templates

1. **Homepage** (`resources/views/home.blade.php`)
   ```blade
   @extends('layouts.app')

   @section('content')
       {{-- Hero Section --}}
       <section class="page-hero">...</section>

       {{-- Feature Cards --}}
       <section class="section feature-cards-section">...</section>
   @endsection
   ```

2. **Faith Templates** (already exist, just enhance with new styles)
   - `resources/views/faith/index.blade.php`
   - `resources/views/faith/show.blade.php`
   - `resources/views/faith/category.blade.php`

### Priority 2: Create New Templates

3. **Blog Templates** (create new)
   - `resources/views/blog/index.blade.php`
   - `resources/views/blog/show.blade.php`

4. **Dictionary Templates** (create new)
   - `resources/views/dictionary/index.blade.php`
   - `resources/views/dictionary/show.blade.php`

5. **Blade Components** (create for reusability)
   - `resources/views/components/card.blade.php`
   - `resources/views/components/breadcrumb.blade.php`

## Using the Design System

### Colors

```blade
{{-- In Blade templates --}}
<div class="bg-primary text-white">Primary background</div>
<div class="bg-light text-secondary">Light background</div>
<span class="text-primary">Primary text</span>
```

```scss
// In SCSS files
.my-component {
    background-color: $primary;
    color: $white;
    padding: $spacer * 2; // 32px
}
```

### Spacing

```blade
{{-- Margin & Padding utilities --}}
<div class="mt-4 mb-5 px-3">...</div>
<div class="py-6">...</div>
```

### Buttons

```blade
<a href="#" class="btn btn-primary">Primary Button</a>
<button class="btn btn-outline-primary">Outline Button</button>
<a href="#" class="btn btn-text">Text Button</a>
<button class="btn btn-primary btn-lg">Large Button</button>
```

### Cards

```blade
{{-- Feature Card --}}
<div class="feature-card">
    <div class="feature-icon">✝</div>
    <h3 class="feature-title">Title</h3>
    <p class="feature-description">Description</p>
    <a href="#" class="btn btn-text">Learn More →</a>
</div>

{{-- Blog Card --}}
<div class="blog-card">
    <div class="blog-card-image">
        <img src="..." alt="...">
        <span class="blog-category-badge badge badge-primary">Category</span>
    </div>
    <div class="blog-meta">...</div>
    <h3 class="blog-title">...</h3>
    <p class="blog-excerpt">...</p>
    <a href="..." class="btn btn-text">Read More →</a>
</div>
```

### Grid System

```blade
{{-- Using utility classes --}}
<div class="container">
    <div class="row">
        <div class="col-md-8">Main Content</div>
        <div class="col-md-4">Sidebar</div>
    </div>
</div>

{{-- Or custom grid --}}
<div class="features-grid">
    {{-- Automatically 3 columns on desktop, 2 on tablet, 1 on mobile --}}
    <div class="feature-card">...</div>
    <div class="feature-card">...</div>
    <div class="feature-card">...</div>
</div>
```

### Responsive Design

```blade
{{-- Hide on mobile, show on desktop --}}
<div class="d-none d-md-block">Desktop only</div>

{{-- Show on mobile, hide on desktop --}}
<div class="d-block d-md-none">Mobile only</div>
```

```scss
// In SCSS
.my-component {
    font-size: 2rem;

    @include respond-below(md) {
        font-size: 1.5rem; // Smaller on mobile
    }
}
```

## JavaScript Features

### Automatic Features

These initialize automatically on page load:
- ✅ Navigation (mobile menu)
- ✅ Smooth scroll
- ✅ Back to top button
- ✅ Lazy loading images
- ✅ Header scroll effects

### Optional Features

Add these attributes to enable:

```blade
{{-- Search Modal --}}
<button data-search="toggle">Search (Cmd+K)</button>
<div id="searchModal" class="modal">
    <input data-search="input" type="text">
    <div data-search="results"></div>
</div>

{{-- Scripture Tooltips --}}
<span class="scripture-ref" data-reference="John 3:16" data-verse="For God so loved...">
    John 3:16
</span>

{{-- Reading Progress (for blog posts) --}}
<div class="blog-post-page">
    {{-- Auto-activates reading progress bar --}}
</div>

{{-- Table of Contents --}}
<div class="toc-widget">
    <ul class="toc-list">
        {{-- Auto-generates from H2/H3 or manually add --}}
        <li><a href="#section-1">Section 1</a></li>
    </ul>
</div>

{{-- Lazy Load Images --}}
<img data-src="/path/to/image.jpg" loading="lazy" alt="...">
```

## Troubleshooting

### "Assets not found" error

```bash
# Build assets first
npm run build

# Or start dev server
npm run dev
```

### Styles not applying

```bash
# Clear caches
php artisan cache:clear
php artisan view:clear
php artisan config:clear

# Hard refresh browser (Cmd+Shift+R or Ctrl+Shift+R)
```

### JavaScript not working

1. Check browser console for errors
2. Verify Vite is running (`npm run dev`)
3. Check `@vite` directive in layout template

### SCSS compilation errors

1. Check syntax in SCSS files
2. Verify all imports are correct
3. Ensure `_variables.scss` is imported first

## Pro Tips

### Custom SCSS

Create a new file for custom styles:

```scss
// resources/scss/pages/_custom.scss
.my-custom-component {
    @include card-base;
    background-color: $primary;

    @include respond-below(md) {
        padding: $spacer;
    }
}
```

Then import in `app.scss`:

```scss
// resources/scss/app.scss
@import 'pages/custom';
```

### Custom JavaScript

Create a new module:

```javascript
// resources/js/modules/my-feature.js
export function initMyFeature() {
    // Your code here
}
```

Import in `app.js`:

```javascript
// resources/js/app.js
import { initMyFeature } from './modules/my-feature';

document.addEventListener('DOMContentLoaded', () => {
    initMyFeature();
});
```

### Alpine.js Integration

Alpine.js is already loaded globally:

```blade
<div x-data="{ open: false }">
    <button @click="open = !open">Toggle</button>
    <div x-show="open">Content</div>
</div>
```

## Testing Checklist

Before deploying:

- [ ] Test on Chrome, Firefox, Safari, Edge
- [ ] Test on mobile devices (iOS, Android)
- [ ] Verify navigation works on mobile
- [ ] Test smooth scrolling
- [ ] Verify back to top button appears
- [ ] Test search functionality (if implemented)
- [ ] Check lazy loading images
- [ ] Verify responsive breakpoints
- [ ] Test keyboard navigation
- [ ] Run Lighthouse audit (target: >90)
- [ ] Validate HTML (W3C validator)
- [ ] Check accessibility (WAVE tool)

## Performance Tips

1. **Optimize Images**: Use WebP format, compress to 70-80%
2. **Lazy Load**: Add `loading="lazy"` to images
3. **Minimize CSS/JS**: `npm run build` does this automatically
4. **Cache Assets**: Configure Laravel asset caching
5. **CDN**: Consider CDN for static assets in production

## Getting Help

1. **Full Documentation**: See `FRONTEND_IMPLEMENTATION.md`
2. **Bootstrap Docs**: https://getbootstrap.com/docs/5.3/
3. **Alpine.js Docs**: https://alpinejs.dev/
4. **Laravel Blade**: https://laravel.com/docs/12.x/blade

## Quick Reference

### Most Used Classes

```
Spacing:     mt-3, mb-4, px-3, py-5
Display:     d-flex, d-block, d-none, d-md-block
Flex:        justify-content-center, align-items-center, gap-3
Text:        text-primary, text-center, fw-bold
Background:  bg-primary, bg-light, bg-white
Border:      rounded, rounded-lg, border
Shadow:      shadow, shadow-sm, shadow-lg
```

### Most Used Components

```
Buttons:     .btn .btn-primary .btn-lg
Cards:       .card .feature-card .blog-card
Badges:      .badge .badge-primary .badge-filled
Forms:       .form-control .form-label .form-group
Layout:      .container .section .page-hero
```

---

**Ready to build!** Start with updating the homepage, then move to other templates. The design system is ready to use! 🚀
