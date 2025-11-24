<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Lấy locale từ session (user đã chọn trước đó)
        $locale = session('locale', config('app.locale'));

        // Validate locale (chỉ cho phép 'vi' hoặc 'en')
        if (!in_array($locale, ['vi', 'en'])) {
            $locale = config('app.locale');
        }

        // Set locale cho app
        app()->setLocale($locale);

        return $next($request);
    }
}
