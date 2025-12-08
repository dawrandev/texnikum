<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PostController extends Controller
{
    public function __construct(protected PostService $postService) {}

    public function latestPosts()
    {
        return $this->jsonResponse(
            'Latest posts retrieved successfully',
            $this->postService->getLatestPosts()
        );
    }

    public function allPosts()
    {
        return $this->jsonResponse(
            'All posts retrieved successfully',
            $this->postService->getAllPosts()
        );
    }

    public function categoryPosts($id)
    {
        return $this->jsonResponse(
            'Category posts retrieved successfully',
            $this->postService->getPostsByCategory($id)
        );
    }

    public function latestEventPosts()
    {
        return $this->jsonResponse(
            'Latest event posts retrieved successfully',
            $this->postService->getLatestEventPosts()
        );
    }

    public function allEventPosts()
    {
        return $this->jsonResponse(
            'All event posts retrieved successfully',
            $this->postService->getAllEventPosts()
        );
    }

    private function jsonResponse($message, $data)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'     => PostResource::collection($data)
        ]);
    }
}
