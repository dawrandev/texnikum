<?php

namespace App\Services;

use App\Models\Post;
use App\Repositories\PostRepository;

class PostService
{
    protected string $eventSlug = 'events';

    public function __construct(protected PostRepository $postRepository) {}

    public function getEventCategoryId(): ?int
    {
        return $this->postRepository->getCategoryIdBySlug($this->eventSlug);
    }

    public function getLatestEventPosts()
    {
        $categoryId = $this->getEventCategoryId();

        if (!$categoryId) return collect();

        return $this->postRepository->getPosts(
            ['category_id' => $categoryId],
            6
        );
    }

    public function getAllEventPosts()
    {
        $categoryId = $this->getEventCategoryId();

        if (!$categoryId) return collect();

        return $this->postRepository->getPosts(
            ['category_id' => $categoryId]
        );
    }

    public function getPostsByCategory($id)
    {
        return $this->postRepository->getPosts(['category_id' => $id]);
    }

    public function getLatestPosts()
    {
        return $this->postRepository->getPosts([], 6);
    }

    public function getAllPosts()
    {
        return $this->postRepository->getPosts();
    }

    public function getPostById($id)
    {
        $post = Post::with(['category', 'translations'])
            ->findOrFail($id);

        $post->increment('views_count');

        return $post;
    }
}
