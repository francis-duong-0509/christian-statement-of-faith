<?php

namespace App\Http\Controllers;

use App\Models\FaithCategory;
use App\Models\FaithStatement;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display homepage
     */
    public function index()
    {
        // All categories for statement-overview section
        $categories = FaithCategory::active()
            ->ordered()
            ->with(['statements' => function ($query) {
                $query->active()->ordered();
            }])
            ->withCount('statements')
            ->get();

        // Top 3 blog categories (order 0,1,2) for scripture-foundation section
        $foundationCategories = \App\Models\BlogCategory::active()
            ->whereIn('order', [0, 1, 2])
            ->ordered()
            ->get();

        // Latest 3 blog posts for blog-posts section
        $latestPosts = BlogPost::published()
            ->with(['category', 'author'])
            ->latest()
            ->take(6)
            ->get();

        return view('homepage.home', compact('categories', 'foundationCategories', 'latestPosts'));
    }
}
