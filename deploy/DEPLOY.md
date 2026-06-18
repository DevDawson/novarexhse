# NOVAREX — cPanel Deployment Guide

## Option A — Recommended (Modern cPanel with document root control)

### 1. Upload project files
Upload the **entire project** to `/home/<user>/novarex.co.tz/`  
via FTP/SFTP or cPanel File Manager.

**Do NOT upload:**
- `node_modules/`
- `.env` (upload `.env.production` renamed to `.env`)
- `deploy/` folder

### 2. Set document root
In cPanel → **Domains** → find novarex.co.tz → **Document Root**  
Change to: `/home/<user>/novarex.co.tz/public`

### 3. Configure .env
Rename `.env.production` → `.env` and fill in:
```
DB_DATABASE=cpanel_dbname
DB_USERNAME=cpanel_dbuser
DB_PASSWORD=your_password
APP_URL=https://novarex.co.tz
```

### 4. Run via cPanel Terminal (or SSH)
```bash
cd ~/novarex.co.tz

# Install production dependencies (no dev packages)
composer install --no-dev --optimize-autoloader

# Create storage symlink
php artisan storage:link

# Run migrations + seed
php artisan migrate --force
php artisan db:seed --force

# Cache everything for production
php artisan optimize
php artisan view:cache
```

### 5. Set permissions
```bash
chmod -R 755 storage bootstrap/cache
chmod -R 644 storage/logs
```

---

## Option B — Project outside public_html (Classic shared hosting)

Use this if you cannot change the document root.

### Server structure:
```
/home/<user>/
├── novarex/              ← upload project here (NOT in public_html)
│   ├── app/
│   ├── bootstrap/
│   ├── config/
│   ├── database/
│   ├── resources/
│   ├── routes/
│   ├── storage/
│   ├── vendor/
│   └── .env
└── public_html/          ← web root
    ├── index.php         ← use deploy/public_html_index.php (renamed)
    ├── .htaccess         ← copy from public/.htaccess
    ├── assets/           ← copy from public/assets/
    ├── css/              ← copy from public/css/
    ├── js/               ← copy from public/js/
    ├── robots.txt        ← copy from public/robots.txt
    └── storage/          ← symlink (see below)
```

### Create storage symlink via SSH:
```bash
ln -s /home/<user>/novarex/storage/app/public /home/<user>/public_html/storage
```

Or if no SSH: copy `storage/app/public/` contents into `public_html/storage/` manually.

---

## Option C — Everything in public_html (Simple, less secure)

### Upload everything to public_html/
The root `.htaccess` already redirects all requests to `public/`.

### .env + database + migrate same as Option A steps 3 & 4.

---

## Post-deploy checklist
- [ ] `APP_DEBUG=false` in `.env`
- [ ] `APP_ENV=production` in `.env`
- [ ] HTTPS working (SSL certificate installed in cPanel)
- [ ] `/admin` login works with `admin@novarex.co.tz`
- [ ] Homepage loads with all sections
- [ ] Contact form submits (check mail settings)
- [ ] `/sitemap.xml` returns XML
- [ ] `/robots.txt` accessible
- [ ] Gallery images display (storage symlink working)

## cPanel MySQL — create database
1. cPanel → **MySQL Databases**
2. Create database: e.g. `novauser_novarex`
3. Create user: e.g. `novauser_dbuser` with strong password
4. Add user to database — grant **ALL PRIVILEGES**
5. Use those values in `.env`
