<?php

namespace App\Http\Controllers;

use App\Models\FaithCategory;
use App\Models\FaithStatement;
use Illuminate\Http\Request;

class FaithStatementController extends Controller
{
    /**
     * Display all faith categories
     */
    public function index()
    {
        $categories = FaithCategory::active()
            ->ordered()
            ->withCount('statements')
            ->get();

        return view('faith.index', compact('categories'));
    }

    /**
     * Display category with its statements
     */
    public function showCategory($slug)
    {
        $locale = app()->getLocale();
        $slugField = "slug_{$locale}";

        $category = FaithCategory::active()
            ->where($slugField, $slug)
            ->firstOrFail();

        $statements = FaithStatement::active()
            ->where('faith_category_id', $category->id)
            ->ordered()
            ->get();

        return view('faith.category', compact('category', 'statements'));
    }

    /**
     * Display single statement detail
     */
    public function show($categorySlug, $statementSlug)
    {
        $locale = app()->getLocale();
        $slugField = "slug_{$locale}";

        // Find category
        $category = FaithCategory::active()
            ->where($slugField, $categorySlug)
            ->firstOrFail();

        // Find statement
        $statement = FaithStatement::active()
            ->where('faith_category_id', $category->id)
            ->where($slugField, $statementSlug)
            ->with('category')
            ->firstOrFail();

        // Get related statements (same category)
        $relatedStatements = FaithStatement::active()
            ->where('faith_category_id', $category->id)
            ->where('id', '!=', $statement->id)
            ->ordered()
            ->limit(3)
            ->get();

        return view('faith.show', compact('statement', 'category', 'relatedStatements'));
    }
}
