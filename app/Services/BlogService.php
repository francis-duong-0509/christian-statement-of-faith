<?php

namespace App\Services;

use App\Models\BlogPost;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class BlogService
{
    /**
     * Summary of getPublishedPosts
     * @param mixed $categoryId
     * @param mixed $search
     * @param int $perPage
     * @return LengthAwarePaginator
     */
    public function getPublishedPosts(?int $categoryId = null, ?string $search = null, int $perPage = 12): LengthAwarePaginator
    {
        $query = BlogPost::published()
            ->with(['category', 'author'])
            ->latest();

        // Filter by category
        if ($categoryId) {
            $query->byCategory($categoryId);
        }

        // Search in title and excerpt
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('excerpt', 'like', "%{$search}%");
            });
        }

        return $query->paginate($perPage);
    }

    /**
     * Get blog post by slug with optional view increment     
     * @param string $slug
     * @param bool $incrementViews
     * @return BlogPost|null
     */
    public function getPostBySlug(string $slug, bool $incrementViews = true): ?BlogPost
    {
        $post = BlogPost::published()
            ->where('slug', $slug)
            ->with(['category', 'author'])
            ->first();

        if ($post && $incrementViews) {
            $post->incrementViews();
        }

        return $post;
    }

    /**
     * Get featured posts
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection<int, BlogPost>
     */
    public function getFeaturedPosts(int $limit = 3): Collection
    {
        return BlogPost::published()
            ->outstanding()
            ->latest()
            ->with(['category', 'author'])
            ->take($limit)
            ->get();
    }

    /**
     * Get popular posts    
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection<int, BlogPost>
     */
    public function getPopularPosts(int $limit = 5): Collection
    {
        return BlogPost::published()
            ->popular()
            ->with(['category', 'author'])
            ->take($limit)
            ->get();
    }

    /**
     * Get related posts for a given post
     * @param BlogPost $post
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection<int, BlogPost>
     */
    public function getRelatedPosts(BlogPost $post, int $limit = 3)
    {
        return BlogPost::published()
            ->byCategory($post->blog_category_id)
            ->where('id', '!=', $post->id)
            ->latest()
            ->take($limit)
            ->get();
    }

    /**
     * Get latest posts
     * @param int $limit
     * @return \Illuminate\Database\Eloquent\Collection<int, BlogPost>
     */
    public function getLatestPosts(int $limit = 5): Collection
    {
        return BlogPost::published()
            ->with(['category', 'author'])
            ->latest()
            ->take($limit)
            ->get();
    }

    /**
     * Create a new blog post
     * @param array $data
     * @return BlogPost
     */
    public function create(array $data): BlogPost
    {
        // Auto-generate slug if not provider
        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        // Auto-generate excerpt from content if not provided
        if (empty($data['excerpt'])) {
            $data['excerpt'] = $this->generateExcerpt($data['content']);
        }

        // Set published_at to now if publishing and not set
        if (isset($data['is_draft']) && !$data['is_draft'] && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        return BlogPost::create($data);
    }

    /**
     * Update an existing blog post
     * @param BlogPost $post
     * @param array $data
     * @return BlogPost|null
     */
    public function update(BlogPost $post, array $data): BlogPost
    {
        // Update slug if title changed and slug not manually set
        if (isset($data['title']) && !isset($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        // Update excerpt if content changed and excerpt not set
        if (isset($data['content']) && !isset($data['excerpt'])) {
            $data['excerpt'] = $this->generateExcerpt($data['content']);
        }

        // Set published_at to now if publishing and not set
        if (isset($data['is_draft']) && !$data['is_draft'] && $post->is_draft && empty($post->published_at)) {
            $data['published_at'] = now();
        }

        $post->update($data);

        return $post->fresh();
    }

    /**
     * Delete a blog post
     * @param BlogPost $post
     * @return bool|null
     */
    public function delete(BlogPost $post): bool
    {
        return $post->delete();
    }

    /**
     * Publish a blog post
     * @param BlogPost $post
     * @return BlogPost|null
     */
    public function publish(BlogPost $post): BlogPost
    {
        $post->update([
            'is_draft' => false,
            'published_at' => $post->published_at ?? now(),
        ]);

        return $post->fresh();
    }

    /**
     * Unpublish a blog post
     * @param BlogPost $post
     * @return BlogPost|null
     */
    public function unpublish(BlogPost $post): BlogPost
    {
        $post->update([
            'is_draft' => true,
        ]);

        return $post->fresh();
    }

    /**
     * Toggle outstanding status of a blog post
     * @param BlogPost $post
     * @return BlogPost|null
     */
    public function toggleOutstanding(BlogPost $post): BlogPost
    {
        $post->update([
            'is_outstanding' => !$post->is_outstanding,
        ]);

        return $post->fresh();
    }

    /**
     * Generate an excerpt from a blog post content
     * @param string $content
     * @param int $length
     * @return string
     */
    private function generateExcerpt(string $content, int $length = 200): string
    {
        // Strip HTML tags
        $text = strip_tags($content);

        // Limit to specified length
        if (strlen($text) > $length) {
            $text = substr($text, 0, $length);
            $text = substr($text, 0, strrpos($text, ' ')) . '...';
        }

        return $text;
    }

    /**
     * Get blog index data
     * @param ?int $categoryId
     * @param ?string $search
     * @return array{categories: \Illuminate\Database\Eloquent\Collection<int, \App\Models\BlogCategory>, featured_posts: \Illuminate\Database\Eloquent\Collection<int, BlogPost>, popular_posts: \Illuminate\Database\Eloquent\Collection<int, BlogPost>, posts: LengthAwarePaginator}
     */
    public function getBlogIndexData(?int $categoryId = null, ?string $search = null): array
    {
        return [
            'posts' => $this->getPublishedPosts($categoryId, $search),
            'categories' => app(BlogCategoryService::class)->getAllWithPostsCount(),
            'featured_posts' => $this->getFeaturedPosts(3),
            'popular_posts' => $this->getPopularPosts(5),
        ];
    }

    public function getPostPageData(string $slug): array
    {
        $post = $this->getPostBySlug($slug);

        if (!$post) {
            return [];
        }

        return [
            'post' => $post,
            'related_posts' => $this->getRelatedPosts($post, 3),
            'popular_posts' => $this->getPopularPosts(5),
        ];
    }
}
