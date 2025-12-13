<?php

namespace App\Repositories\Admin;

use App\Models\Video;
use Illuminate\Database\Eloquent\Collection;

class VideoRepository
{
    /**
     * Get all videos with relations
     */
    public function getVideos(array $filters = [], ?int $limit = null): Collection
    {
        $query = Video::with(['translations']);

        // Filter by language
        if (isset($filters['lang_code'])) {
            $query->whereHas('translations', function ($q) use ($filters) {
                $q->where('lang_code', $filters['lang_code']);
            });
        }

        // Order by published date
        $query->orderBy('published_at', 'desc');

        // Apply limit if provided
        if ($limit) {
            $query->limit($limit);
        }

        return $query->get();
    }

    /**
     * Get video by ID with relations
     */
    public function getVideoById(int $id): Video
    {
        return Video::with(['translations'])->findOrFail($id);
    }

    /**
     * Create new video
     */
    public function create(array $data): Video
    {
        return Video::create($data);
    }

    /**
     * Update video
     */
    public function update(Video $video, array $data): Video
    {
        $video->update($data);
        return $video->fresh(['translations']);
    }

    /**
     * Delete video
     */
    public function delete(Video $video): bool
    {
        return $video->delete();
    }

    /**
     * Check if video URL already exists
     */
    public function urlExists(string $url, ?int $excludeId = null): bool
    {
        $query = Video::where('url', $url);

        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        return $query->exists();
    }

    /**
     * Get latest videos
     */
    public function getLatestVideos(int $limit = 6): Collection
    {
        return $this->getVideos([], $limit);
    }

    /**
     * Get videos by language
     */
    public function getVideosByLanguage(string $langCode, ?int $limit = null): Collection
    {
        return $this->getVideos(['lang_code' => $langCode], $limit);
    }
}
