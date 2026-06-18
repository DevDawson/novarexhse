<?php

/**
 * cPanel deployment index.php
 *
 * Use this file when the web root (public_html) is SEPARATE from the project folder.
 *
 * Server structure expected:
 *   /home/username/novarex/          ← full Laravel project (upload here)
 *   /home/username/public_html/      ← web root (upload public/ contents here)
 *       index.php  ← this file
 *       .htaccess  ← copy from public/.htaccess
 *       assets/    ← copy from public/assets/
 *       storage/   ← symlink: ln -s /home/username/novarex/storage/app/public storage
 *
 * HOW TO USE:
 *   1. Upload this file to public_html/ as index.php
 *   2. Update APP_PATH below to match your server path
 */

define('LARAVEL_START', microtime(true));

// ── CHANGE THIS to the absolute path of your Laravel project on the server ──
$appPath = dirname(__DIR__) . '/novarex';
// Example: '/home/cpanelusername/novarex'
// ────────────────────────────────────────────────────────────────────────────

if (file_exists($maintenance = $appPath . '/storage/framework/maintenance.php')) {
    require $maintenance;
}

require $appPath . '/vendor/autoload.php';

$app = require_once $appPath . '/bootstrap/app.php';

$app->handleRequest(Illuminate\Http\Request::capture());
