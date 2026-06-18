<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LinksController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Blog
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog.show');

// Contact form submission
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Profile links page (Linktree-style)
Route::get('/links', [LinksController::class, 'index'])->name('links');

// Link redirect with click tracking
Route::get('/go/{id}', [GoController::class, 'redirect'])->where('id', '[0-9]+')->name('go');

// Static legal/policy pages
Route::get('/{slug}', [PageController::class, 'show'])
    ->where('slug', 'terms|privacy|cookie-policy|workplace-policy')
    ->name('page');

// XML Sitemap
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
