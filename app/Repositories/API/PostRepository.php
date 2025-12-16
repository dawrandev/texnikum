<?php

namespace App\Repositories\API;

use App\Models\Category;
use App\Models\Post;
use App\Models\PostTranslation;

class PostRepository
{
    public function getCategoryIdBySlug(string $slug): ?int
    {
        return Category::where('slug', $slug)->value('id');
    }

    public function getPosts(array $filters = [], int $perPage = 10)
    {
        $query = Post::with(['category', 'translations']);

        if (!empty($filters['category_id'])) {
            $query->where('category_id', $filters['category_id']);
        }

        return $query
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function getPostBySlug(string $slug)
    {
        $translation = PostTranslation::where('slug', $slug)->firstOrFail();

        $post = Post::with(['category', 'translations'])
            ->findOrFail($translation->post_id);

        $post->increment('views_count');

        return $post;
    }
}
