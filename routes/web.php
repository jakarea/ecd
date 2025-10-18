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
