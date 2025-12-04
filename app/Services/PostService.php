<?php

namespace App\Services;

use App\Repositories\PostRepository;

class PostService
{
    public function __construct(protected PostRepository $postRepository)
    {
        // 
    }

    public function getLatestPosts()
    {
        return $this->postRepository->getLatestPosts();
    }

    public function getAllPosts()
    {
        return $this->postRepository->getAllPosts();
    }
}
