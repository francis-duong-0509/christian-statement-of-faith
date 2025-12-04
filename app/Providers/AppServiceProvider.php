<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Force HTTPS in production
        if($this->app->environment('production') || config('app.force_https', false)) {
            \URL::forceScheme('https');
        }

        // Rate limiter for newsletter subscription (5 attempts per hour per IP)
        RateLimiter::for('subscribe', function (Request $request) {
            return Limit::perHour(5)->by($request->ip());
        });
    }
}
