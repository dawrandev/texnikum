<?php

namespace App\Repositories;

class PostRepository
{
    public function getLatestPosts()
    {
        return \App\Models\Post::with(['category', 'translations'])
            ->orderBy('created_at', 'desc')
            ->take(6)
            ->get();
    }

    public function getAllPosts()
    {
        return \App\Models\Post::with(['category', 'translations'])
            ->orderBy('created_at', 'desc')
            ->get();
    }
}
