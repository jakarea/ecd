<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GalleryController;

Route::get('/', fn() => view('home'))->name('home');

Route::get('/about', fn() => view('about'))->name('about');

Route::get('/services-subscriptions', fn() => view('services-subscriptions'))->name('services-subscriptions');

Route::get('/contact', fn() => view('contact'))->name('contact');

Route::get('/blog', fn() => view('blog'))->name('blog');

Route::get('/blog/{id}', fn($id) => view('blog-single', ['id' => $id]))->name('blog-single');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery');
