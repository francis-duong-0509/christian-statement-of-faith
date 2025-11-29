<?php

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\FaithCategory;
use App\Models\FaithStatement;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            // Custom Route Model Binding for FaithCategory
            Route::bind('category', function (string $slug) {
                $locale = app()->getLocale();
                $slugField = "slug_{$locale}";

                return FaithCategory::active()
                    ->where($slugField, $slug)
                    ->firstOrFail();
            });

            // Custom Route Model Binding for FaithStatement
            Route::bind('statement', function (string $slug) {
                $locale = app()->getLocale();
                $slugField = "slug_{$locale}";

                return FaithStatement::active()
                    ->where($slugField, $slug)
                    ->with('category')
                    ->firstOrFail();
            });

            // Blog Category Model Binding
            Route::bind('blogCategory', function (string $slug) {
                return BlogCategory::active()
                    ->where('slug', $slug)
                    ->with(['category', 'author'])
                    ->firstOrFail();
            });

            // Blog Post Model Binding
            Route::bind('blogPost', function (string $slug) {
                return BlogPost::active()
                    ->where('slug', $slug)
                    ->with(['category', 'author'])
                    ->firstOrFail();
            });
        }
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->web(append: [
            \App\Http\Middleware\SetLocale::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
