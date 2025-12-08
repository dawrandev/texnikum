<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Services\PostService;

/**
 * @group Posts
 * 
 * Managing blog posts and news articles
 */
class PostController extends Controller
{
    public function __construct(protected PostService $postService) {}

    /**
     * Get latest posts
     * 
     * Retrieve the most recent blog posts (limited to latest 6).
     * 
     * @responseField success boolean Operation success status
     * @responseField message string Response message
     * @responseField data array List of latest posts
     * @responseField data[].id integer Post ID
     * @responseField data[].category_id integer Category ID
     * @responseField data[].slug string Post slug (unique identifier)
     * @responseField data[].title string Post title (translated)
     * @responseField data[].content string Post content (translated)
     * @responseField data[].image string|null Post image path
     * @responseField data[].published_at string|null Post publication timestamp (ISO 8601 format)
     * @responseField data[].views_count integer Number of post views
     * @responseField data[].created_at string Post creation timestamp (ISO 8601 format)
     * @responseField data[].updated_at string Post last update timestamp (ISO 8601 format)
     */
    public function latestPosts()
    {
        return $this->jsonResponse(
            'Latest posts retrieved successfully',
            $this->postService->getLatestPosts()
        );
    }

    /**
     * Get all posts
     * 
     * Retrieve all blog posts with pagination.
     * 
     * @responseField success boolean Operation success status
     * @responseField message string Response message
     * @responseField data array List of all posts
     * @responseField data[].id integer Post ID
     * @responseField data[].category_id integer Category ID
     * @responseField data[].slug string Post slug (unique identifier)
     * @responseField data[].title string Post title (translated)
     * @responseField data[].content string Post content (translated)
     * @responseField data[].image string|null Post image path
     * @responseField data[].published_at string|null Post publication timestamp (ISO 8601 format)
     * @responseField data[].views_count integer Number of post views
     * @responseField data[].created_at string Post creation timestamp (ISO 8601 format)
     * @responseField data[].updated_at string Post last update timestamp (ISO 8601 format)
     */
    public function allPosts()
    {
        return $this->jsonResponse(
            'All posts retrieved successfully',
            $this->postService->getAllPosts()
        );
    }

    /**
     * Get posts by category
     * 
     * Retrieve all posts belonging to a specific category.
     * 
     * @urlParam id integer required Category ID
     * 
     * @responseField success boolean Operation success status
     * @responseField message string Response message
     * @responseField data array List of posts in the category
     * @responseField data[].id integer Post ID
     * @responseField data[].category_id integer Category ID
     * @responseField data[].slug string Post slug (unique identifier)
     * @responseField data[].title string Post title (translated)
     * @responseField data[].content string Post content (translated)
     * @responseField data[].image string|null Post image path
     * @responseField data[].published_at string|null Post publication timestamp (ISO 8601 format)
     * @responseField data[].views_count integer Number of post views
     * @responseField data[].created_at string Post creation timestamp (ISO 8601 format)
     * @responseField data[].updated_at string Post last update timestamp (ISO 8601 format)
     * 
     * @response 404 {
     *   "success": false,
     *   "message": "Category not found"
     * }
     */
    public function categoryPosts($id)
    {
        return $this->jsonResponse(
            'Category posts retrieved successfully',
            $this->postService->getPostsByCategory($id)
        );
    }

    /**
     * Get latest event posts
     * 
     * Retrieve the most recent event announcements (limited to latest 6).
     * 
     * @responseField success boolean Operation success status
     * @responseField message string Response message
     * @responseField data array List of latest event posts
     * @responseField data[].id integer Post ID
     * @responseField data[].category_id integer Category ID
     * @responseField data[].slug string Post slug (unique identifier)
     * @responseField data[].title string Post title (translated)
     * @responseField data[].content string Post content (translated)
     * @responseField data[].image string|null Post image path
     * @responseField data[].published_at string|null Post publication timestamp (ISO 8601 format)
     * @responseField data[].views_count integer Number of post views
     * @responseField data[].created_at string Post creation timestamp (ISO 8601 format)
     * @responseField data[].updated_at string Post last update timestamp (ISO 8601 format)
     */
    public function latestEventPosts()
    {
        return $this->jsonResponse(
            'Latest event posts retrieved successfully',
            $this->postService->getLatestEventPosts()
        );
    }

    /**
     * Get all event posts
     * 
     * Retrieve all event announcements with pagination.
     * 
     * @responseField success boolean Operation success status
     * @responseField message string Response message
     * @responseField data array List of all event posts
     * @responseField data[].id integer Post ID
     * @responseField data[].category_id integer Category ID
     * @responseField data[].slug string Post slug (unique identifier)
     * @responseField data[].title string Post title (translated)
     * @responseField data[].content string Post content (translated)
     * @responseField data[].image string|null Post image path
     * @responseField data[].published_at string|null Post publication timestamp (ISO 8601 format)
     * @responseField data[].views_count integer Number of post views
     * @responseField data[].created_at string Post creation timestamp (ISO 8601 format)
     * @responseField data[].updated_at string Post last update timestamp (ISO 8601 format)
     */
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
