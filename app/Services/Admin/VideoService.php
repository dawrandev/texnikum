<?php

namespace App\Services\Admin;

use App\Models\Video;
use App\Repositories\Admin\VideoRepository;
use Illuminate\Support\Facades\DB;

class VideoService
{
    public function __construct(
        protected VideoRepository $videoRepository
    ) {}

    /**
     * Get all videos with optional filters
     */
    public function getVideos(array $filters = [], ?int $limit = null)
    {
        return $this->videoRepository->getVideos($filters, $limit);
    }

    /**
     * Get video by ID
     */
    public function getVideoById(int $id): Video
    {
        return $this->videoRepository->getVideoById($id);
    }

    /**
     * Get latest videos
     */
    public function getLatestVideos(int $limit = 6)
    {
        return $this->videoRepository->getLatestVideos($limit);
    }

    /**
     * Create a new video with translations
     */
    public function create(array $data): Video
    {
        return DB::transaction(function () use ($data) {
            // Create video
            $video = $this->videoRepository->create([
                'url' => $data['url'],
                'published_at' => $data['published_at'] ?? now(),
            ]);

            // Create translations (only for non-empty translations)
            if (isset($data['translations']) && is_array($data['translations'])) {
                foreach ($data['translations'] as $translation) {
                    $title = $translation['title'] ?? '';

                    // Skip empty translations
                    if (empty(trim($title))) {
                        continue;
                    }

                    $video->translations()->create([
                        'lang_code' => $translation['lang_code'],
                        'title' => $title,
                    ]);
                }
            }

            return $video->load('translations');
        });
    }

    /**
     * Update existing video
     */
    public function update(int $id, array $data): Video
    {
        return DB::transaction(function () use ($id, $data) {
            $video = $this->videoRepository->getVideoById($id);

            // Update video
            $video = $this->videoRepository->update($video, [
                'url' => $data['url'],
                'published_at' => $data['published_at'] ?? $video->published_at,
            ]);

            // Update translations
            if (isset($data['translations']) && is_array($data['translations'])) {
                // Delete existing translations
                $video->translations()->delete();

                // Create new translations (only non-empty ones)
                foreach ($data['translations'] as $translation) {
                    $title = $translation['title'] ?? '';

                    // Skip empty translations
                    if (empty(trim($title))) {
                        continue;
                    }

                    $video->translations()->create([
                        'lang_code' => $translation['lang_code'],
                        'title' => $title,
                    ]);
                }
            }

            return $video->load('translations');
        });
    }

    /**
     * Delete video
     */
    public function delete(int $id): bool
    {
        return DB::transaction(function () use ($id) {
            $video = $this->videoRepository->getVideoById($id);
            $video->translations()->delete();
            return $this->videoRepository->delete($video);
        });
    }

    /**
     * Check if URL exists
     */
    public function urlExists(string $url, ?int $excludeId = null): bool
    {
        return $this->videoRepository->urlExists($url, $excludeId);
    }
}
