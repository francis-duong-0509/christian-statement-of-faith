<?php

namespace App\Services;

use App\Models\BlogCategory;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class BlogCategoryService
{
    /**
     * Get all active blog categories
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, BlogCategory>
     */
    public function getAllActive(): Collection
    {
        return BlogCategory::active()
            ->ordered()
            ->get();
    }

    /**
     * Get all active blog categories with posts count
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, BlogCategory>
     */
    public function getAllWithPostsCount(): Collection
    {
        return BlogCategory::active()
            ->withCount(['posts as published_posts_count' => function ($query) {
                $query->published();
            }])
            ->ordered()
            ->get();
    }

    /**
     * Get blog category by slug with posts
     *
     * @param string $slug
     * @return void
     */
    public function getBySlugWithPosts(string $slug): ?BlogCategory
    {
        return BlogCategory::active()
            ->where('slug', $slug)
            ->with(['publishedPosts' => function ($query) {
                $query->latest();
            }])
            ->first();
    }

    /**
     * Create a new blog category
     *
     * @param array $data
     * @return BlogCategory
     */
    public function create(array $data): BlogCategory
    {
        // Auto-generate slug if not provider
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        return BlogCategory::create($data);
    }

    /**
     * Summary of update
     * @param BlogCategory $category
     * @param array $data
     * @return BlogCategory|null
     */
    public function update(BlogCategory $category, array $data): BlogCategory
    {
        // Update slug if name changed and slug not manually set
        if (isset($data['name']) && !isset($data['slug'])) {
            $data['slug'] = Str::slug($data['name']);
        }

        $category->update($data);   

        return $category->fresh();
    }

    /**
     * Delete a blog category
     
     * @param BlogCategory $category
     * @throws \Exception
     * @return bool|null
     */
    public function delete(BlogCategory $category): bool
    {
        // Check if category has posts
        if ($category->posts()->exists()) {
            throw new \Exception('Cannot delete category with existing posts.');
        }

        return $category->delete();
    }

    /**
     * Get category stats
     * @param BlogCategory $category
     * @return array{draft_posts: mixed, published_posts: int, total_posts: mixed, total_views: mixed}
     */
    public function getCategoryStats(BlogCategory $category): array
    {
        return [
            'total_posts' => $category->posts->count(),
            'published_posts' => $category->publishedPosts()->count(),
            'draft_posts' => $category->posts()->draft()->count(),
            'total_views' => $category->posts()->sum('views_count'),
        ];
    }
}
