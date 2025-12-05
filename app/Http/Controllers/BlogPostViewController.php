<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Services\BlogService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BlogPostViewController extends Controller
{
    public function __construct(
        private BlogService $blogService
    )
    {}

    public function store(Request $request, BlogPost $post): JsonResponse
    {
        $counted = $this->blogService->recordView($post, $request->ip());

        return response()->json([
            'counted' => $counted,
            'views_count' => $post->fresh()->views_count
        ]);
    }
}
