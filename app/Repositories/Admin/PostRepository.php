<?php

namespace App\Repositories\Admin;

use App\Models\Category;
use App\Models\Post;

class PostRepository
{
    public function getCategoryIdBySlug(string $slug): ?int
    {
        return Category::where('slug', $slug)->value('id');
    }

    public function getPosts(array $filters = [], $limit = null)
    {
        $query = Post::with(['category', 'translations']);

        if (isset($filters['category_id'])) {
            $query->where('category_id', $filters['category_id']);
        }

        $query->orderBy('created_at', 'desc');

        if ($limit) {
            $query->limit($limit);
        }

        return $query->get();
    }
}
