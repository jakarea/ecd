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

// Redirect non-localized admin routes to default locale
Route::get('/admin/{any}', function ($any) {
    $defaultLocale = config('app.locale', 'nl');
    return redirect("/{$defaultLocale}/admin/{$any}");
})->where('any', '^(?!en|nl)(.*)$'); // only if not already localized

// Redirect /admin to default locale admin login
Route::get('/admin', function () {
    $defaultLocale = config('app.locale', 'nl');
    return redirect("/{$defaultLocale}/admin/login");
});

// Redirect localized /admin to dashboard if authenticated, or login if not
Route::get('/{locale}/admin', function ($locale) {
    if (\Illuminate\Support\Facades\Auth::check()) {
        return redirect()->route('admin.dashboard', ['locale' => $locale]);
    }
    return redirect()->route('admin.login', ['locale' => $locale]);
})->where('locale', 'en|nl')->middleware(\App\Http\Middleware\SetLocale::class);

// Localized Admin Routes
Route::group([
    'prefix' => '{locale}/admin',
    'where' => ['locale' => 'en|nl'],
    'middleware' => \App\Http\Middleware\SetLocale::class,
    'as' => 'admin.', // <<<--- ADDED THE NAME PREFIX HERE
], function () {
    
    // Admin Authentication Routes (No auth required)
    Route::middleware('guest')->group(function () {
        // Routes like 'admin.login' and 'admin.login.post'
        Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    });

    // Protected Admin Routes (Auth required)
    Route::middleware('auth')->group(function () {
        // Routes like 'admin.dashboard' and 'admin.logout'
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        // SEO Management Routes (e.g., 'admin.seo.index')
        Route::resource('seo', SeoController::class);
        Route::post('/seo/recalculate-scores', [SeoController::class, 'recalculateScores'])->name('seo.recalculate');
        Route::post('/seo/{seo}/toggle-status', [SeoController::class, 'toggleStatus'])->name('seo.toggle');

        // Testimonials Management Routes (e.g., 'admin.testimonials.index')
        Route::resource('testimonials', TestimonialController::class);
        Route::post('/testimonials/{testimonial}/toggle-status', [TestimonialController::class, 'toggleStatus'])->name('testimonials.toggle');

        // Hero Sections Management Routes (e.g., 'admin.hero-sections.index')
        Route::resource('hero-sections', HeroSectionController::class);
        Route::post('/hero-sections/{heroSection}/toggle-status', [HeroSectionController::class, 'toggleStatus'])->name('hero-sections.toggle');

        // Gallery Management Routes (e.g., 'admin.gallery.index')
        Route::resource('gallery', GalleryItemController::class)->parameters([
            'gallery' => 'galleryItem'
        ]);

        // Settings Routes (e.g., 'admin.settings.index')
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');

        // Booking Management Routes (e.g., 'admin.bookings.create')
        Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');
        Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');
        Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
        Route::get('/bookings/{booking}', [BookingController::class, 'show'])->name('bookings.show');
        Route::post('/bookings/{booking}/status', [BookingController::class, 'updateStatus'])->name('bookings.updateStatus');
        Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy');

        // User Management Routes (e.g., 'admin.users.index')
        Route::resource('users', UserController::class);

        // FAQ Management Routes (e.g., 'admin.faqs.index')
        Route::resource('faqs', FaqController::class)->parameters([
            'faqs' => 'faq'
        ]);
        Route::post('/faqs/{faq}/toggle-status', [FaqController::class, 'toggle'])->name('faqs.toggle');

        // Team Members Management Routes (e.g., 'admin.team-members.index')
        Route::resource('team-members', TeamMemberController::class);
        Route::post('/team-members/{teamMember}/toggle-status', [TeamMemberController::class, 'toggle'])->name('team-members.toggle');

        // Translations Management Routes (e.g., 'admin.translations.index')
        Route::get('/translations', [TranslationController::class, 'index'])->name('translations.index');
        Route::put('/translations', [TranslationController::class, 'update'])->name('translations.update');
    });
});
