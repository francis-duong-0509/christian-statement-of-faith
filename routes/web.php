<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\FaithStatementController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

// HOMEPAGE
Route::get('/', [HomeController::class, 'index'])->name('home');

// LANGUAGE SWITCHER
Route::get('/language/{locale}', [LanguageController::class, 'switch'])
    ->name('language.switch')
    ->where('locale', 'vi|en');

// STATEMENT OF FAITH
Route::prefix('statement-of-faith')->name('faith.')->group(function () {
    Route::get('/', [FaithStatementController::class, 'index'])->name('index');

    // CUSTOM ROUTE MODEL BINDING (DEFINED IN bootstrap/app.php)
    Route::get('/{category}', [FaithStatementController::class, 'showCategory'])->name('category');
    Route::get('/{category}/{statement}', [FaithStatementController::class, 'show'])->name('show');
});

// BLOG
Route::prefix('blog')->name('blog.')->group(function () {
    Route::get('/', [BlogController::class, 'index'])->name('index');
    Route::get('/{slug}', [BlogController::class, 'show'])->name('show');
});
