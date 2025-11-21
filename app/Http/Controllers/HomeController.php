<?php

namespace App\Http\Controllers;

use App\Models\FaithCategory;
use App\Models\FaithStatement;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display homepage
     */
    public function index()
    {
        $categories = FaithCategory::active()
            ->ordered()
            ->with(['statements' => function ($query) {
                $query->active()->ordered();
            }])
            ->withCount('statements')
            ->get();

        return view('home', compact('categories'));
    }
}
