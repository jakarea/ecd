<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\Admin\GalleryItemController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\TranslationController;

// Redirect root "/" to default locale
Route::get('/', function () {
    return redirect('/' . config('app.locale', 'nl'));
});

// Catch non-localized routes (like /about, /contact)
Route::get('{any}', function ($any) {
    $defaultLocale = config('app.locale', 'nl');
    return redirect("/{$defaultLocale}/{$any}");
})->where('any', '^(?!en|nl)(.*)$'); // only if not already localized

// Localized routes
Route::group([
    'prefix' => '{locale}',
    'where' => ['locale' => 'en|nl'],
    'middleware' => \App\Http\Middleware\SetLocale::class,
], function () {
    Route::get('/', function() {
        $galleryItems = \App\Models\GalleryItem::active()->ofType('before&after')->ordered()->get();
        return view('home', compact('galleryItems'));
    })->name('home');

    Route::get('/about', function() {
        $faqs = \App\Models\Faq::active()->ordered()->get();
        $teamMembers = \App\Models\TeamMember::active()->ordered()->get();
        return view('about', compact('faqs', 'teamMembers'));
    })->name('about');

    Route::get('/services-subscriptions', fn() => view('services-subscriptions'))->name('services-subscriptions');
    Route::get('/contact', fn() => view('contact'))->name('contact');
    Route::get('/blog', fn() => view('blog'))->name('blog');
    Route::get('/blog/{id}', fn($id) => view('blog-single', ['id' => $id]))->name('blog-single');
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
    Route::post('/book-service', [BookingController::class, 'store'])->name('booking.store');
});



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

