<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\SubscriberController;
use Illuminate\Support\Facades\Route;

Route::domain('{user:username}.' . config('app.url'))->group(function () {
   Route::get('/', [BlogController::class, 'index'])->name('blog.index');
   Route::get('/post/{post}', [BlogController::class, 'show'])->name('blog.show');
   Route::post('/subscriber', [SubscriberController::class, 'store'])->name('subscriber.store');
});

Route::get('/', [SiteController::class, 'index'])->name('home');