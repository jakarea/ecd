<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\GalleryItemController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\TranslationController;

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
    Route::resource('gallery', GalleryItemController::class)->parameters([
        'gallery' => 'galleryItem'
    ]);

    // Settings Routes
    Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

    // Booking Management Routes
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
    Route::post('/bookings/{booking}/status', [BookingController::class, 'updateStatus'])->name('bookings.updateStatus');
    Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');

    // User Management Routes
    Route::resource('users', UserController::class);

    // FAQ Management Routes
    Route::resource('faqs', FaqController::class);
    Route::post('/faqs/{faq}/toggle-status', [FaqController::class, 'toggle'])->name('faqs.toggle');

    // Team Members Management Routes
    Route::resource('team-members', TeamMemberController::class);
    Route::post('/team-members/{teamMember}/toggle-status', [TeamMemberController::class, 'toggle'])->name('team-members.toggle');

    // Translations Management Routes
    Route::get('/translations', [TranslationController::class, 'index'])->name('translations.index');
    Route::put('/translations', [TranslationController::class, 'update'])->name('translations.update');
});
