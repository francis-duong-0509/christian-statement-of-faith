# Build Instructions & Troubleshooting

## Quick Fix for Your Build Error

The build error you encountered was due to the Vite config trying to import variables. I've fixed it by removing the problematic `additionalData` section from `vite.config.js`.

## Building Assets

### Option 1: Using Docker (Recommended per CLAUDE.md)

```bash
# Start the full environment
cd devops/local && ./start.sh

# Or if already running, build assets
docker compose exec app npm run build

# For development with hot reload
docker compose exec app npm run dev
```

### Option 2: Direct NPM (if you have permission issues)

```bash
# Build for production
npm run build

# Or for development
npm run dev
```

## If You Still Get Errors

### Error: "Can't find stylesheet to import"

**Solution**: The SCSS files are already created correctly. Just run:

```bash
npm run build
```

The deprecation warnings about `@import` are **normal** and won't cause build failures. They're just warnings that Sass will eventually move to `@use` syntax in the future.

### Error: "EACCES: permission denied"

**Solution**: Use Docker instead:

```bash
docker compose exec app npm run build
```

Or fix permissions:

```bash
sudo chown -R $USER:$USER node_modules
npm run build
```

### Error: "Cannot find module 'alpinejs'"

**Solution**: Install dependencies first:

```bash
npm install
# or via Docker
docker compose exec app npm install
```

### Error: "Vite manifest not found"

**Solution**: This happens when assets haven't been built yet:

```bash
npm run build
# Then refresh your browser
```

## Verifying the Build

After running `npm run build`, you should see:

```
✓ built in XXXms
✓ X modules transformed.
✓ resources/scss/app.scss  XXX KiB │ gzip: XX KiB
✓ resources/js/app.js      XXX KiB │ gzip: XX KiB
```

The built files will be in:
- `public/build/assets/app-[hash].css`
- `public/build/assets/app-[hash].js`
- `public/build/manifest.json`

## Development Workflow

### For Active Development

```bash
# Start dev server (with hot reload)
npm run dev

# In another terminal, start Laravel
php artisan serve
# or use Docker
```

This will:
- Watch for file changes
- Auto-compile SCSS/JS
- Hot reload in browser
- Faster than production builds

### For Production/Testing

```bash
# Build minified assets
npm run build

# Then test
php artisan serve
```

## Common Issues & Solutions

### 1. Styles Not Applying

```bash
# Clear all Laravel caches
php artisan cache:clear
php artisan view:clear
php artisan config:clear
php artisan route:clear

# Rebuild assets
npm run build

# Hard refresh browser (Cmd+Shift+R or Ctrl+Shift+R)
```

### 2. JavaScript Not Working

Check these in order:
1. **Browser console** - Look for error messages
2. **Vite build output** - Check for build errors
3. **Network tab** - Verify JS files are loading
4. **Alpine.js** - Make sure it's loaded (check `window.Alpine` in console)

### 3. SCSS Compilation Errors

If you get SCSS syntax errors:
1. Check the error message for file and line number
2. Common issues:
   - Missing semicolons
   - Unclosed brackets `{}`
   - Invalid property names
   - Wrong variable references

### 4. Module Import Errors

If JavaScript modules fail to import:
```bash
# Check the import paths in resources/js/app.js
# They should be relative: './modules/navigation'
# NOT absolute: '/resources/js/modules/navigation'
```

## Files Created/Modified

### ✅ Files That Should Exist

```
resources/scss/
├── app.scss ✓
├── _variables.scss ✓
├── _mixins.scss ✓
├── base/ (2 files) ✓
├── layout/ (3 files) ✓
├── components/ (7 files) ✓
├── pages/ (4 files) ✓
└── utilities/ (1 file) ✓

resources/js/
├── app.js ✓
├── bootstrap.js ✓
└── modules/ (8 files) ✓

vite.config.js ✓ (updated)
package.json ✓ (updated)
```

### ❌ Files to Remove (if they exist)

```
resources/css/app.css (old Tailwind file - keep but not used)
```

## Testing the Build

After building, test these features:

### 1. Styles
- [ ] Navigation bar looks correct
- [ ] Footer has 4 columns
- [ ] Colors match design system (navy blue primary)
- [ ] Responsive layout works (resize browser)

### 2. Navigation
- [ ] Mobile menu toggles on small screens
- [ ] Smooth scrolling works for anchor links
- [ ] Active link highlighting works
- [ ] Language switcher works

### 3. JavaScript Features
- [ ] Back to top button appears after scrolling
- [ ] Header gets shadow on scroll
- [ ] All links are clickable
- [ ] Form validation works (if forms exist)

### 4. Browser Compatibility
Test in:
- [ ] Chrome/Edge (latest)
- [ ] Firefox (latest)
- [ ] Safari (latest)
- [ ] Mobile browsers (iOS Safari, Chrome Android)

## Next Steps After Successful Build

1. **View the site**:
   ```bash
   php artisan serve
   # Visit http://localhost:8000
   ```

2. **Check that**:
   - Navigation looks professional
   - Footer has proper styling
   - Fonts are loaded (Inter, Merriweather)
   - No console errors

3. **Start building templates**:
   - See `FRONTEND_QUICKSTART.md` for examples
   - Update `resources/views/home.blade.php` first
   - Use the design system classes

## Need Help?

### Check These First

1. **Browser Console** (F12 → Console tab)
   - Any JavaScript errors?
   - Any 404s for assets?

2. **Network Tab** (F12 → Network tab)
   - Are CSS/JS files loading?
   - What's the status code?

3. **Terminal Output**
   - Any build errors?
   - Did build complete successfully?

### Debug Commands

```bash
# Check if Vite manifest exists
ls -la public/build/manifest.json

# Check built assets
ls -la public/build/assets/

# Verify package.json dependencies
cat package.json | grep -A 10 dependencies

# Check Vite config
cat vite.config.js

# Verify SCSS structure
find resources/scss -type f -name "*.scss"
```

### Still Stuck?

1. Read the full documentation: `FRONTEND_IMPLEMENTATION.md`
2. Check Laravel logs: `storage/logs/laravel.log`
3. Verify all files from the "Files Created/Modified" section exist
4. Try deleting `node_modules` and reinstalling:
   ```bash
   rm -rf node_modules
   npm install
   npm run build
   ```

## Production Deployment

When deploying to production:

```bash
# Install dependencies (production only)
npm ci --production

# Build with production optimizations
npm run build

# Optimize Laravel
php artisan optimize
php artisan view:cache
php artisan config:cache
php artisan route:cache
```

---

**Last Updated**: 2025-01-19
**Status**: Build configuration fixed and ready to use
