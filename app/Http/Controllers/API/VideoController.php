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
     * Retrieve a list of published videos with translated titles, paginated by 6.
     *
     * @responseField success boolean Operation success status
     * @responseField message string Response message
     * @responseField data array List of videos
     * @responseField data[].id integer Video ID
     * @responseField data[].url string Video URL
     * @responseField data[].title string Video title (translated)
     * @responseField data[].published_at string Video publication timestamp (ISO 8601)
     * @responseField data[].created_at string Video creation timestamp (ISO 8601)
     * @responseField data[].updated_at string Video update timestamp (ISO 8601)
     */
    public function getVideos()
    {
        $videos = Video::paginate(6);

        return $this->jsonResponse(
            'Videos retrieved successfully',
            $videos
        );
    }


    /**
     * Get latest videos
     * 
     * Retrieve the latest 5 published videos ordered by publish date.
     *
     * @responseField success boolean Operation success status
     * @responseField message string Response message
     * @responseField data array List of latest videos
     * @responseField data[].id integer Video ID
     * @responseField data[].url string Video URL
     * @responseField data[].title string Video title (translated)
     * @responseField data[].published_at string Video publication timestamp (ISO 8601)
     * @responseField data[].created_at string Video creation timestamp (ISO 8601)
     * @responseField data[].updated_at string Video update timestamp (ISO 8601)
     */
    public function getLatestVideos()
    {
        $videos = Video::orderBy('published_at', 'desc')
            ->take(5)
            ->get();

        return $this->jsonResponse(
            'Latest videos retrieved successfully',
            $videos
        );
    }


    /**
     * Get single video
     *
     * Retrieve a single video by its ID with translated title.
     *
     * @urlParam id integer required The ID of the video. Example: 1
     *
     * @responseField success boolean Operation success status
     * @responseField message string Response message
     * @responseField data object Video object
     * @responseField data.id integer Video ID
     * @responseField data.url string Video URL
     * @responseField data.title string Video title (translated from video_translations)
     * @responseField data.published_at string Video publication timestamp (ISO 8601)
     * @responseField data.created_at string Video creation timestamp (ISO 8601)
     * @responseField data.updated_at string Video update timestamp (ISO 8601)
     *
     * @response 404 {
     *   "message": "No query results for model [Video]"
     * }
     */
    public function show($id)
    {
        $video = Video::findOrFail($id);

        return response()->json([
            'success' => true,
            'message' => 'Video retrieved successfully',
            'data'    => new VideoResource($video),
        ]);
    }

    public function jsonResponse($message, $data)
    {
        return response()->json([
            'success' => true,
            'message' => $message,
            'data'     => VideoResource::collection($data)
        ]);
    }
}
