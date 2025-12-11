<?php

namespace App\Services\API;

use App\Models\Post;
use App\Repositories\API\PostRepository;

class PostService
{
    protected string $eventSlug = 'events';
    protected string $newsSlug = 'news';

    public function __construct(protected PostRepository $postRepository) {}

    public function getEventCategoryId(): ?int
    {
        return $this->postRepository->getCategoryIdBySlug($this->eventSlug);
    }

    public function getNewsCategoryId(): ?int
    {
        return $this->postRepository->getCategoryIdBySlug($this->newsSlug);
    }

    public function getLatestPosts($categoryId = null)
    {
        if ($categoryId === null) {
            $categoryId = $this->getNewsCategoryId();

            if (!$categoryId) {
                return collect();
            }
        }

        return $this->postRepository->getPosts(
            ['category_id' => $categoryId],
            6
        );
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
