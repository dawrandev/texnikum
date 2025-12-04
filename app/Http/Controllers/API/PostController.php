<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PostController extends Controller
{
    public function __construct(protected PostService $postService)
    {
        //
    }

    public function latestPosts(Request $request)
    {
        $locale = $request->input('lang', 'uz');

        App::setLocale($locale);

        $posts = $this->postService->getLatestPosts();

        return response()->json([
            'success' => true,
            'message' => 'Latest posts retrieved successfully (' . $locale . ')',
            'data' => PostResource::collection($posts)
        ]);
    }

    public function allPosts(Request $request)
    {
        $locale = $request->input('lang', 'uz');

        App::setLocale($locale);

        $posts = $this->postService->getAllPosts();

        return response()->json([
            'success' => true,
            'message' => 'All posts retrieved successfully (' . $locale . ')',
            'data' => PostResource::collection($posts)
        ]);
    }
}
