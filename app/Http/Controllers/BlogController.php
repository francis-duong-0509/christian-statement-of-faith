<?php

namespace App\Http\Controllers;

use App\Services\BlogCategoryService;
use App\Services\BlogService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    private BlogService $blogService;
    private BlogCategoryService $categoryService;

    public function __construct(
        BlogService $blogService,
        BlogCategoryService $categoryService)
    {
        $this->blogService = $blogService;
        $this->categoryService = $categoryService;
    }

    /**
     * Display blog listing page
     * Route: GET /blog
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $categoryId = $request->get('category_id');
        $search = $request->get('search');

        $data = $this->blogService->getBlogIndexData($categoryId, $search);
        
        return view('blog.index', $data);
    }

    /**
     * Display single blog post
     * Route: GET /blog/{slug}
     *
     * @param string $slug
     * @return View
     */
    public function show(string $slug): View
    {
        $data = $this->blogService->getPostPageData($slug);

        if (empty($data)) {
            abort(404, 'Bài viết không tồn tại');
        }

        return view('blog.show', $data);
    }

    /* public function category(string $slug)
    {
        $category = $this->categoryService->getBySlugWithPosts($slug);

        if (!$category) {
            abort(404, 'Danh mục không tồn tại');
        }

        $posts = $this->blogService->getPublishedPosts(categoryId: $category->id);

        $categories = $this->categoryService->getAllWithPostsCount();

        return view('blog.category', compact('category', 'posts', 'categories'));
    } */
}
