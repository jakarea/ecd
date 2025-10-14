<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\GalleryItemController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group.
|
*/

// Admin Authentication Routes (No auth required)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
});

// Protected Admin Routes (Auth required)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // SEO Management Routes
    Route::resource('seo', SeoController::class);
    Route::post('/seo/recalculate-scores', [SeoController::class, 'recalculateScores'])->name('seo.recalculate');
    Route::post('/seo/{seo}/toggle-status', [SeoController::class, 'toggleStatus'])->name('seo.toggle');

    // Testimonials Management Routes
    Route::resource('testimonials', TestimonialController::class);
    Route::post('/testimonials/{testimonial}/toggle-status', [TestimonialController::class, 'toggleStatus'])->name('testimonials.toggle');

    // Hero Sections Management Routes
    Route::resource('hero-sections', HeroSectionController::class);
    Route::post('/hero-sections/{heroSection}/toggle-status', [HeroSectionController::class, 'toggleStatus'])->name('hero-sections.toggle');

    // Gallery Management Routes
    Route::resource('gallery', GalleryItemController::class);

    // Add more admin routes here as needed
    // Route::resource('/users', UserController::class);
    // Route::resource('/posts', PostController::class);
});
