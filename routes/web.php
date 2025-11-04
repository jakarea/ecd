<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\BookingController;

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
    Route::get('/', function($locale) {
        $seoMeta = \App\Models\SeoMeta::active()->byUrl('/' . $locale)->first();
        $galleryItems = \App\Models\GalleryItem::active()->ofType('before&after')->ordered()->get();
        return view('home', compact('galleryItems', 'seoMeta'));
    })->name('home');

    Route::get('/about', function($locale) {
        $seoMeta = \App\Models\SeoMeta::active()->byUrl('/' . $locale . '/about')->first();
        $faqs = \App\Models\Faq::active()->ordered()->get();
        $teamMembers = \App\Models\TeamMember::active()->ordered()->get();
        return view('about', compact('faqs', 'teamMembers', 'seoMeta'));
    })->name('about');

    Route::get('/services-subscriptions', function($locale) {
        $seoMeta = \App\Models\SeoMeta::active()->byUrl('/' . $locale . '/services-subscriptions')->first();
        return view('services-subscriptions', compact('seoMeta'));
    })->name('services-subscriptions');

    Route::get('/contact', function($locale) {
        $seoMeta = \App\Models\SeoMeta::active()->byUrl('/' . $locale . '/contact')->first();
        return view('contact', compact('seoMeta'));
    })->name('contact');

    Route::get('/blog', function($locale) {
        $seoMeta = \App\Models\SeoMeta::active()->byUrl('/' . $locale . '/blog')->first();
        return view('blog', compact('seoMeta'));
    })->name('blog');

    Route::get('/blog/{id}', fn($locale, $id) => view('blog-single', ['id' => $id]))->name('blog-single');
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
    Route::post('/book-service', [BookingController::class, 'store'])->name('booking.store');
});

