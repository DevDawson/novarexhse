# NOVAREX CMS — Claude Code Instructions

## Project Overview

**NOVAREX HSE & Sustainability Ltd** public website and admin CMS, rebuilt from a vanilla PHP site into Laravel 12.x + Filament v3.

- **Stack**: Laravel 12.x (PHP 8.2), Filament v3.3, MySQL (`novare_cms`), Bootstrap 5.3.3 (CDN), Font Awesome 6.5.2 (CDN)
- **Dev server**: `php artisan serve --port=8001` from `e:\2026\novarex`
- **Admin panel**: `/admin` — auth guard `admin`, model `App\Models\Admin`
- **Database**: MySQL on `127.0.0.1:3306`, DB `novare_cms`, user `root`, no password

## Core Rule

**Preserve all business logic.** Never simplify, skip, or stub existing features. Every field, relationship, and edge case must be maintained exactly.

## Theme System

Two themes: `saas` (modern light) and `classic` (original dark).

### How it works

| Layer | Detail |
|---|---|
| DB setting | `site_settings.active_theme` (cache key `site_settings`, 300s TTL) |
| Env fallback | `ACTIVE_THEME=saas` in `.env` |
| Config fallback | `config/theme.php` → `config('theme.active')` |
| Helper | `theme_view(string $view, array $data)` in `app/Helpers/theme.php` |

`theme_view()` resolves `themes.{active_theme}.{view}` and falls back to the bare view name if the themed version doesn't exist.

### Theme files

```
resources/views/themes/
  saas/           ← modern light theme (active)
    home.blade.php
    links.blade.php
    page.blade.php
    blog/show.blade.php
    partials/head.blade.php
    partials/nav.blade.php
    partials/footer.blade.php
  classic/        ← original dark theme (backup)

public/assets/
  saas/style.css     ← ~700 line design system
  saas/main.js       ← all frontend JS
  classic/           ← backup of original assets
```

Switch theme from admin: `/admin/appearance` (Filament page → writes `active_theme` to DB, clears cache).

### SaaS CSS conventions

- CSS variables on `html`: `--bg`, `--bg-alt`, `--bg-card`, `--text`, `--text-muted`, `--border`, `--brand` (`#1a56db`), `--green` (`#0e9f6e`)
- Dark mode: `[data-theme="dark"]` block overrides all variables
- Component prefix: `.s-` (e.g. `.s-navbar`, `.s-hero`, `.s-service-card`)
- Brand logo: always use `<div class="s-brand-logo">` wrapper with `<img>` (logo) or `<i class="fa-solid fa-leaf">` fallback — never a bare `<img>` without the wrapper
- Dark mode toggle: `id="theme-toggle"`, `id="theme-icon"`, class `theme-toggle-btn`, localStorage key `nvx_theme`
- Flash prevention: inline `<script>` on `<html>` tag (before `<head>`) reads localStorage and sets `data-theme`

## Key Services

### SettingsService (`app/Services/SettingsService.php`)

```php
SettingsService::all()           // returns merged defaults + DB (cached 300s)
SettingsService::get('key', '')  // single value with default
SettingsService::set('key', $v)  // writes DB + Cache::forget('site_settings')
SettingsService::setMany($array) // batch write + cache clear
```

Cache key: `site_settings`. Always call `Cache::forget('site_settings')` after direct DB writes to `site_settings`.

### ContentSection (`app/Models/ContentSection.php`)

```php
ContentSection::getSection('hero') // merges row columns + extra_json into flat array
```

### SeoService (`app/Services/SeoService.php`)

Generates meta tags from `$settings` and controller-provided overrides.

## Models (16 total)

| Model | Table | Notes |
|---|---|---|
| `SiteSetting` | `site_settings` | `setting_key` / `setting_value` columns |
| `ContentSection` | `content_sections` | key + column1-5 + extra_json |
| `Service` | `services` | icon, title, description, sort_order, is_active |
| `Course` | `courses` | HSE training courses |
| `Feature` | `features` | "Why NOVAREX" bullet points |
| `Testimonial` | `testimonials` | client testimonials |
| `Gallery` | `galleries` | `image` field (not image_path), `title` (not caption) |
| `Post` | `posts` | blog posts, slug-routed |
| `Inquiry` | `inquiries` | contact form submissions |
| `ProfileLink` | `profile_links` | Linktree-style links, click tracking |
| `Sector` | `sectors` | industry sectors served |
| `Faq` | `faqs` | FAQ accordion items |
| `CorporateEmail` | `corporate_emails` | displayed email addresses |
| `WorkingDay` | `working_days` | open/close times per day |
| `AnalyticsEvent` | `analytics_events` | simple internal event log |
| `Admin` | `admins` | Filament admin users |

**Gallery gotcha**: field is `$img->image` (not `->image_path`) and `$img->title` (not `->caption`). Always guard with `@if(!empty($img->image))`.

## Controllers & Routes

```
GET  /                          HomeController@index
GET  /blog/{slug}               BlogController@show
POST /contact                   ContactController@submit
GET  /links                     LinksController@index
GET  /go/{id}                   GoController@redirect      (click tracking)
GET  /{terms|privacy|...}       PageController@show
GET  /sitemap.xml               SitemapController@index
```

All controllers use `theme_view()` instead of `view()`.

## Filament Admin Panel

**Panel provider**: `app/Providers/Filament/AdminPanelProvider.php`
Pages are manually registered in `->pages([])` — not auto-discovered. Add every new Page class there.

### Pages (manually registered)

| Page | URL | Group |
|---|---|---|
| `Dashboard` | `/admin` | — |
| `WebsiteSettings` | `/admin/website-settings` | Site |
| `AppearancePage` | `/admin/appearance` | Site |
| `ExpertisePage` | `/admin/expertise` | Content |
| `LegalPage` | `/admin/legal` | Content |
| `WorkingDaysPage` | `/admin/working-days` | Content |
| `AnalyticsPage` | `/admin/analytics` | — |

### Resources (auto-discovered)

Services, Courses, Features, Testimonials, Gallery, Posts, Inquiries, ProfileLinks, Sectors, FAQs, CorporateEmails, AdminUsers

## Blade Patterns

### Favicon (in head.blade.php)

```blade
@if(!empty($settings['favicon']))
  <link rel="icon" type="image/x-icon" href="{{ asset('storage/' . $settings['favicon']) }}">
@elseif(!empty($settings['logo']))
  <link rel="icon" type="image/png" href="{{ asset('storage/' . $settings['logo']) }}">
@endif
```

### Brand logo (nav, footer, standalone pages)

```blade
<div class="s-brand-logo">
  @if(!empty($settings['logo']))
    <img src="{{ asset('storage/' . $settings['logo']) }}" alt="{{ $settings['website_short_name'] ?? 'NOVAREX' }}" width="38" height="38">
  @else
    <i class="fa-solid fa-leaf" style="color:#fff;font-size:1rem"></i>
  @endif
</div>
```

### Blade @json() with complex expressions

Blade's parenthesis parser breaks on `(bool)` casts inside `@json()`. Always pre-compute in `@php`:

```blade
@php
$_wdJson = $workingDays->map(function ($d) {
    return ['day_name' => $d->day_name, 'is_open' => (bool) $d->is_open, ...];
});
@endphp
<script type="application/json" id="working-days-json">@json($_wdJson)</script>
```

### Hero background

`$heroStyle` from `HomeController` is a complete HTML attribute string: `style="background-image:..."`. Render with `{!! $heroStyle !!}` (raw), not `style="{{ $heroStyle }}"`.

## Static Analysis False Positives (Intelephense)

These errors appear on every Filament/Laravel file and are **not runtime errors** — do not fix them:

- `P1009 Undefined type` — `Filament\Pages\Page`, `Filament\Notifications\Notification`, etc.
- `P1010 Undefined function` — `config()`, `view()`, `env()`, `route()`, `asset()` in helper files

## Common Commands

```bash
# Dev
php artisan serve --port=8001

# Cache
php artisan view:clear
php artisan config:clear
php artisan cache:clear

# DB
php artisan migrate
php artisan db:seed

# Write a single setting + clear cache
php artisan tinker --execute="App\Models\SiteSetting::set('key', 'value'); Illuminate\Support\Facades\Cache::forget('site_settings');"
```

## Google Analytics

Tag: `G-T95KDT2PPG` — hardcoded in `resources/views/themes/saas/partials/head.blade.php`.
