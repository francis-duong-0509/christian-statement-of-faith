<?php

use App\Http\Controllers\FaithStatementController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Language Switcher
Route::get('/language/{locale}', [LanguageController::class, 'switch'])
    ->name('language.switch')
    ->where('locale', 'vi|en');

// Statement of Faith
Route::prefix('statement-of-faith')->name('faith.')->group(function () {
    Route::get('/', [FaithStatementController::class, 'index'])->name('index');
    Route::get('/{category}', [FaithStatementController::class, 'showCategory'])->name('category');
    Route::get('/{category}/{statement}', [FaithStatementController::class, 'show'])->name('show');
});
