<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\VideoResource;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function getVideos()
    {
        $videos = Video::with('translations')->get();

        return response()->json([
            'success' => true,
            'message' => 'Videos retrieved successfully',
            'data'    => VideoResource::collection($videos),
        ]);
    }

    public function getLatestVideos()
    {
        $videos = Video::with('translations')
            ->orderBy('published_at', 'desc')
            ->take(5)
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Latest videos retrieved successfully',
            'data'    => VideoResource::collection($videos),
        ]);
    }
}
