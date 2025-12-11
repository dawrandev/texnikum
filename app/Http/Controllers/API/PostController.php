<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Services\API\PostService;
use Illuminate\Http\Request;

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
     * Retrieve the most recent blog posts (latest 6).  
     * Optionally filter by category.
     * 
     * @queryParam category_id integer optional Filter posts by category. Example: 3
     * 
     * @responseField success boolean Operation success status
     * @responseField message string Response message
     * @responseField data array List of latest posts
     * @responseField data[].id integer Post ID
     * @responseField data[].category_id integer Category ID
     * @responseField data[].slug string Post slug (unique identifier)
     * @responseField data[].title string Post title (translated)
     * @responseField data[].content string Post content (translated)
     * @responseField data[].images array Array of post image paths
     * @responseField data[].published_at string Post publication timestamp (ISO 8601 format)
     * @responseField data[].views_count integer Number of post views
     * @responseField data[].created_at string Post creation timestamp
     * @responseField data[].updated_at string Post last update timestamp
     */
    public function latestPosts(Request $request)
    {
        $categoryId = $request->query('category_id');

        return $this->jsonResponse(
            'Latest posts retrieved successfully',
            $this->postService->getLatestPosts($categoryId)
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
     * @responseField data[].images array Array of post image paths
     * @responseField data[].published_at string Post publication timestamp (ISO 8601 format)
     * @responseField data[].views_count integer Number of post views
     * @responseField data[].created_at string Post creation timestamp (ISO 8601 format)
     * @responseField data[].updated_at string Post last update timestamp (ISO 8601 format)
     * 
    
     */
    public function allPosts()
    {
        return $this->jsonResponse(
            'All posts retrieved successfully',
            $this->postService->getAllPosts()
        );
    }

    /**
     * Get single post
     * 
     * Retrieve a specific post by ID and increment view count.
     * 
     * @urlParam id integer required Post ID
     * 
     * @responseField success boolean Operation success status
     * @responseField message string Response message
     * @responseField data object Post details
     * @responseField data.id integer Post ID
     * @responseField data.category_id integer Category ID
     * @responseField data.slug string Post slug (unique identifier)
     * @responseField data.title string Post title (translated)
     * @responseField data.content string Post content (translated)
     * @responseField data.images array Array of post image paths
     * @responseField data.published_at string Post publication timestamp (ISO 8601 format)
     * @responseField data.views_count integer Number of post views
     * @responseField data.created_at string Post creation timestamp (ISO 8601 format)
     * @responseField data.updated_at string Post last update timestamp (ISO 8601 format)
     * 
    
     */
    public function show($id)
    {
        $post = $this->postService->getPostById($id);

        return response()->json([
            'success' => true,
            'message' => 'Post retrieved successfully',
            'data'    => new PostResource($post)
        ]);
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
     * @responseField data[].images array Array of post image paths
     * @responseField data[].published_at string Post publication timestamp (ISO 8601 format)
     * @responseField data[].views_count integer Number of post views
     * @responseField data[].created_at string Post creation timestamp (ISO 8601 format)
     * @responseField data[].updated_at string Post last update timestamp (ISO 8601 format)
     * 
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
     * @responseField data[].images array Array of post image paths
     * @responseField data[].published_at string Post publication timestamp (ISO 8601 format)
     * @responseField data[].views_count integer Number of post views
     * @responseField data[].created_at string Post creation timestamp (ISO 8601 format)
     * @responseField data[].updated_at string Post last update timestamp (ISO 8601 format)
     * 
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
     * @responseField data[].images array Array of post image paths
     * @responseField data[].published_at string Post publication timestamp (ISO 8601 format)
     * @responseField data[].views_count integer Number of post views
     * @responseField data[].created_at string Post creation timestamp (ISO 8601 format)
     * @responseField data[].updated_at string Post last update timestamp (ISO 8601 format)
     * 
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
