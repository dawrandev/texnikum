<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\VideoResource;
use App\Models\Video;

/**
 * @group Videos
 * 
 * Managing video content and media
 */
class VideoController extends Controller
{
    /**
     * Get all videos
     * 
     * Retrieve a list of all published videos with translated titles.
     * 
     * @responseField success boolean Operation success status
     * @responseField message string Response message
     * @responseField data array List of videos
     * @responseField data[].id integer Video ID
     * @responseField data[].url string Video URL
     * @responseField data[].title string Video title (translated)
     * @responseField data[].published_at string Video publication timestamp (ISO 8601 format)
     * @responseField data[].created_at string Video creation timestamp (ISO 8601 format)
     * @responseField data[].updated_at string Video last update timestamp (ISO 8601 format)
     */
    public function getVideos()
    {
        $videos = Video::all();

        return response()->json([
            'success' => true,
            'message' => 'Videos retrieved successfully',
            'data'    => VideoResource::collection($videos),
        ]);
    }

    /**
     * Get latest videos
     * 
     * Retrieve the most recent published videos (limited to latest 5).
     * 
     * @responseField success boolean Operation success status
     * @responseField message string Response message
     * @responseField data array List of latest videos
     * @responseField data[].id integer Video ID
     * @responseField data[].url string Video URL
     * @responseField data[].title string Video title (translated)
     * @responseField data[].published_at string Video publication timestamp (ISO 8601 format)
     * @responseField data[].created_at string Video creation timestamp (ISO 8601 format)
     * @responseField data[].updated_at string Video last update timestamp (ISO 8601 format)
     */
    public function getLatestVideos()
    {
        $videos = Video::orderBy('published_at', 'desc')
            ->take(5)
            ->get();

        return response()->json([
            'success' => true,
            'message' => 'Latest videos retrieved successfully',
            'data'    => VideoResource::collection($videos),
        ]);
    }
}
