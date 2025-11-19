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
        // Lấy 4 faith statements mới nhất
        $statements = FaithStatement::active()
            ->ordered()
            ->with('category')
            ->limit(4)
            ->get();

        // Lấy tất cả categories
        $categories = FaithCategory::active()
            ->ordered()
            ->withCount('statements')
            ->get();

        return view('home', compact('statements', 'categories'));
    }
}
