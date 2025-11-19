# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a Laravel 12 application with Filament 3 admin panel, built to run in a Dockerized local development environment. The project is configured for Docker-based development with integrated services (MySQL, Redis, MinIO, MailHog, phpMyAdmin).

## Development Commands

### Starting the Development Environment

```bash
# Start local Docker environment (recommended)
cd devops/local && ./start.sh

# With database seeders
RUN_SEEDERS=true cd devops/local && ./start.sh

# Alternative: Use composer script (non-Docker)
composer dev
```

The `devops/local/start.sh` script handles:
- Creating `.env` files from `.env.port` and `.env.example`
- Building and starting Docker containers
- Waiting for services to be healthy
- Installing composer dependencies
- Running migrations or importing database
- Building frontend assets
- Setting up MinIO buckets

### Running Tests

```bash
# Run all tests
composer test
# Or: php artisan test

# Run specific test file
php artisan test --filter=TestName

# In Docker environment
docker compose exec app php artisan test
```

### Building Assets

```bash
# Development mode with hot reload
npm run dev

# Production build
npm run build

# In Docker environment (Vite runs automatically via supervisor)
docker compose exec app supervisorctl tail -f vite
```

### Code Quality

```bash
# Run Laravel Pint (code formatter)
vendor/bin/pint

# Clear caches
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Database Operations

```bash
# Run migrations
php artisan migrate

# Rollback migrations
php artisan migrate:rollback

# Seed database
php artisan db:seed

# In Docker environment
docker compose exec app php artisan migrate
```

## Architecture

### Docker Environment

The project uses a multi-service Docker setup located in `devops/local/`:
- **app**: Combined PHP-FPM, Nginx, and Node.js container (managed by supervisor)
- **mysql**: MySQL database
- **redis**: Redis cache
- **minio**: S3-compatible object storage
- **mailhog**: Email testing
- **phpmyadmin**: Database management UI

Port configuration is managed via `devops/local/.env.port` with base ports starting at 8100.

### Filament Admin Panel

The admin panel is configured in `app/Providers/Filament/AdminPanelProvider.php`:
- URL path: `/admin`
- Primary color: Amber
- Auto-discovery enabled for Resources, Pages, and Widgets in `app/Filament/` directories
- Authentication required via middleware

Create new Filament resources with:
```bash
php artisan make:filament-resource ModelName
```

### Frontend Stack

- **Vite**: Build tool and dev server
- **Tailwind CSS 4**: Using the new `@tailwindcss/vite` plugin
- **Laravel Vite Plugin**: For asset compilation
- Entry points: `resources/css/app.css` and `resources/js/app.js`

### Service Configuration

The project uses extensive environment configuration split between:
- Root `.env`: Generated from `devops/local/.env.port` + `devops/local/.env.example`
- Service URLs and ports are centralized in `.env.port`
- Docker service names follow pattern: `{PROJECT_NAME}-{service}-local`

### Testing

- PHPUnit configured with SQLite in-memory database for tests
- Test suites: Unit (`tests/Unit/`) and Feature (`tests/Feature/`)
- Test environment uses `testing` APP_ENV with disabled services (Telescope, Pulse)

## Common Workflows

### Creating New Filament Resources

1. Create the model: `php artisan make:model ModelName -m`
2. Update the migration in `database/migrations/`
3. Run migration: `php artisan migrate`
4. Create Filament resource: `php artisan make:filament-resource ModelName --generate`
5. The resource will be auto-discovered in the admin panel

### Database Workflow

The local environment supports two database initialization methods:
1. Import from SQL dump: `devops/common/configs/app.sql`
2. Run migrations if SQL dump doesn't exist

### Accessing Services in Docker

```bash
# Shell into app container
docker compose exec app bash

# View app logs
docker compose logs -f app

# View nginx logs
docker compose exec app supervisorctl tail -f nginx

# View Vite logs
docker compose exec app supervisorctl tail -f vite

# Stop all services
docker compose down

# Cleanup Docker completely
devops/cleanup-docker.sh
```

### Environment URLs (Default Ports)

- Application: http://localhost:8100
- Admin Panel: http://localhost:8100/admin
- phpMyAdmin: http://localhost:8102
- MailHog: http://localhost:8105
- Redis Commander: http://localhost:8106
- MinIO Console: http://localhost:8108 (minioadmin/minioadmin)

Direct connections:
- MySQL: localhost:8101
- Redis: localhost:8103
- MinIO S3: localhost:8107

## Project Structure Notes

- Composer autoload: PSR-4 for `App\`, `Database\Factories\`, `Database\Seeders\`
- Filament resources auto-discovered from `app/Filament/{Resources,Pages,Widgets}/`
- Standard Laravel directory structure with additional `devops/` for Docker configuration
