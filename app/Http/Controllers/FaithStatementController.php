<?php

namespace App\Http\Controllers;

use App\Models\FaithCategory;
use App\Models\FaithStatement;
use Illuminate\View\View;

class FaithStatementController extends Controller
{
    /**
     * Display all faith categories with their statements
     */
    public function index(): View
    {
        $categories = FaithCategory::active()
            ->ordered()
            ->with(['statements' => function ($query) {
                $query->active()->ordered();
            }])
            ->withCount('statements')
            ->get();

        return view('faith.index', compact('categories'));
    }
}
