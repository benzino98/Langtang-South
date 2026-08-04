# Langtang South Area Council Website

The official website for the Langtang South Area Council, Plateau State, Nigeria. Built with Laravel 11, Blade, Tailwind CSS, and Alpine.js.

## Features

### Public-Facing
- **Homepage** — hero banner, quick links, latest news, announcements, events, gallery preview, emergency contacts
- **About** — history, vision & mission, leadership, organisational structure
- **Departments** — listing and detail pages
- **News** — listing with search & category filters, detail pages
- **Projects** — listing with search & status filter, detail pages
- **Public Notices** — announcements page
- **Downloads** — categorized documents with file downloads
- **Gallery** — albums and images
- **Contact** — contact form with validation, map, and info
- **Global Search** — search across news, projects, departments, gallery, notices, and documents
- **SEO** — meta tags, Open Graph, Twitter Cards, canonical URLs on all pages

### Admin CMS (`/admin`)
- **Role-based access** — admin and editor roles
- **Dashboard** — stats and recent activity
- **Full CRUD** for: Departments, Leadership, News Articles (CKEditor), News Categories, Projects, Public Notices, Documents, Document Categories, Gallery Albums, Gallery Images
- **Contact Message management** — read/unread status, delete
- **User Management** — create/edit/delete users with roles
- **Website Settings** — general, contact, and social settings with logo upload
- **Image optimization** — automatic resize and compression on upload (GD)
- **File uploads** — secure file validation (PDF, DOC, XLS, images) with size limits

## Tech Stack

- **Backend**: Laravel 11 (PHP 8.2+)
- **Frontend**: Blade templates, Tailwind CSS, Alpine.js
- **Editor**: CKEditor 5 (bundled via Vite)
- **Database**: MySQL (SQLite for local development)
- **Build**: Vite 8 with code splitting

## Requirements

- PHP 8.2+
- Composer 2.x
- Node.js 20+ and npm
- MySQL 8+ (or SQLite for local dev)
- GD extension for image optimization

## Installation

### 1. Clone and Install Dependencies

```bash
git clone <repository-url> langtang-south
cd langtang-south

composer install
npm install
```

### 2. Configure Environment

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env` and set your database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=langtang_south
DB_USERNAME=root
DB_PASSWORD=your_password
```

### 3. Run Migrations and Seed

```bash
php artisan migrate
php artisan db:seed
```

This creates the default admin user, settings, and sample content.

### 4. Storage Link

```bash
php artisan storage:link
```

### 5. Start Development Servers

```bash
npm run dev        # Vite dev server (terminal 1)
php artisan serve  # Laravel server (terminal 2)
```

Visit `http://localhost:8000` for the website and `http://localhost:8000/admin` for the admin panel.

## Default Admin Account

| Field    | Value               |
|----------|---------------------|
| Email    | admin@example.com   |
| Password | password            |

> [!CAUTION]
> **Change the default password immediately after first login.**

## Deployment Guide

### Shared Hosting (cPanel / DirectAdmin)

1. Upload the project files to the server (excluding `node_modules`, `.env`).
2. Create a MySQL database and user, grant all privileges.
3. Set up `.env` with production values:
   ```env
   APP_ENV=production
   APP_DEBUG=false
   APP_URL=https://your-domain.com
   ```
4. Run the following in the project directory (via SSH or terminal):
   ```bash
   composer install --no-dev --optimize-autoloader
   php artisan key:generate
   php artisan migrate --force
   php artisan db:seed --force
   php artisan storage:link
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   npm install
   npm run build
   ```
5. Point your domain's document root to the `public/` directory.

### VPS / Dedicated Server (Nginx + PHP-FPM)

```bash
# Server setup (Ubuntu/Debian)
sudo apt update
sudo apt install -y nginx mysql-server php8.2-fpm php8.2-mysql php8.2-gd php8.2-mbstring php8.2-xml php8.2-curl unzip

# PHP Composer
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

# Node.js
curl -fsSL https://deb.nodesource.com/setup_20.x | sudo -E bash -
sudo apt install -y nodejs

# Deploy
cd /var/www
git clone <repository-url> langtang-south
cd langtang-south
composer install --no-dev --optimize-autoloader
cp .env.example .env
php artisan key:generate
# ... configure .env with production values ...
php artisan migrate --force
php artisan db:seed --force
php artisan storage:link
npm install
npm run build
```

**Nginx site config** (`/etc/nginx/sites-available/langtang-south`):

```nginx
server {
    listen 80;
    server_name your-domain.com;
    root /var/www/langtang-south/public;

    add_header X-Frame-Options "SAMEORIGIN";
    add_header X-Content-Type-Options "nosniff";

    index index.php;

    charset utf-8;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location = /favicon.ico { access_log off; log_not_found off; }
    location = /robots.txt  { access_log off; log_not_found off; }

    error_page 404 /index.php;

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php8.2-fpm.sock;
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```

```bash
sudo ln -s /etc/nginx/sites-available/langtang-south /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl reload nginx
```

### Post-Deployment Checklist

- [ ] Set `APP_ENV=production` and `APP_DEBUG=false`
- [ ] Run `php artisan config:cache`, `route:cache`, `view:cache`
- [ ] Verify `storage:link` is active
- [ ] Change the default admin password
- [ ] Configure cron for Laravel scheduler (if using scheduled tasks):
  ```bash
  * * * * * cd /path-to-project && php artisan schedule:run >> /dev/null 2>&1
  ```
- [ ] Set up SSL with Let's Encrypt: `sudo certbot --nginx`

## Security Notes

- All admin routes are protected by the `IsAdmin` middleware (role check).
- File uploads are validated by MIME type and size limits.
- Passwords are hashed automatically (Laravel `hashed` cast).
- Users cannot delete their own account.
- CSRF protection enabled on all forms.

## Project Structure

```
app/
├── Http/
│   ├── Controllers/Admin/    # Admin CMS controllers
│   ├── Controllers/          # Public-facing controllers
│   └── Requests/Admin/       # Form validation requests
├── Models/                   # Eloquent models
├── Services/                 # Service classes (e.g., ImageOptimizer)
└── View/Components/          # Blade components
resources/views/
├── layouts/                  # Public & admin layouts
├── components/               # Reusable Blade components
├── admin/                    # Admin CMS views
└── ...                       # Public-facing page views
routes/
├── web.php                   # Public routes
└── admin.php                 # Admin routes (loaded in bootstrap/app.php)
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
