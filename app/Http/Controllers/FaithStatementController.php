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

    /**
     * Display category with its statements
     * Laravel automatically injects FaithCategory model via Route Model Binding
     */
    public function showCategory(FaithCategory $category): View
    {
        $statements = FaithStatement::active()
            ->where('faith_category_id', $category->id)
            ->ordered()
            ->get();

        return view('faith.category', compact('category', 'statements'));
    }

    /**
     * Display single statement detail
     * Laravel automatically injects both FaithCategory and FaithStatement models
     */
    public function show(FaithCategory $category, FaithStatement $statement): View
    {
        // Verify statement belongs to category (security check)
        abort_if($statement->faith_category_id !== $category->id, 404);

        $relatedStatements = FaithStatement::active()
            ->where('faith_category_id', $category->id)
            ->where('id', '!=', $statement->id)
            ->ordered()
            ->limit(3)
            ->get();

        return view('faith.show', compact('category', 'statement', 'relatedStatements'));
    }
}
