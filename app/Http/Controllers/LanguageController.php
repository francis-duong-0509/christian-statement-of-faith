<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Switch language
     */
    public function switch($locale)
    {
        // Validate locale
        if (!in_array($locale, ['vi', 'en'])) {
            abort(400, 'Invalid locale');
        }

        // Lưu locale vào session
        session(['locale' => $locale]);

        // Redirect back to previous page
        return redirect()->back();
    }
}
