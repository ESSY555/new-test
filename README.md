<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel Product Module

Tiny CRUD app with email/password auth and product management.

### Features
- Auth (email/password)
- Products: create, list, view, edit, delete
- Fields: name, price, image, description
- Validation + CSRF protection
- Eloquent models, migrations, factories, seeders

### Quickstart

1) Install dependencies
```
composer install
npm install
```

2) Environment
```
cp .env.example .env
php artisan key:generate
```

Use SQLite for fastest setup (Windows PowerShell):
```
ni database/database.sqlite -ItemType File
```
Then set in `.env`:
```
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

3) Database and storage
```
php artisan migrate --seed
php artisan storage:link
```

Seeder creates:
- User: test@example.com / password
- 12 sample products

4) Run dev servers
```
php artisan serve
npm run dev
```

Open `http://127.0.0.1:8000`.

### Usage
- Public: products index + show
- Auth required: create, edit, delete
- Image uploads saved to `storage/app/public/products` and served via `public/storage`.

### Code Map
- Model: `app/Models/Product.php`
- Migration: `database/migrations/*create_products_table.php`
- Factory: `database/factories/ProductFactory.php`
- Seeder: `database/seeders/DatabaseSeeder.php`
- Controllers: `app/Http/Controllers/AuthController.php`, `ProductController.php`
- Routes: `routes/web.php`
- Views: `resources/views/auth/*`, `resources/views/products/*`, layout in `resources/views/layouts/app.blade.php`

### Notes / Next Improvements
- Add form request classes for cleaner validation.
- Add basic tests for auth and products.
- Extract a dedicated Blade component layout and flash component.
- Add pagination styling or switch to simplePaginate for smaller footprint.
- Consider soft deletes and image transformations (thumbnails).
- Add authorization policies if multi-user ownership is needed.
