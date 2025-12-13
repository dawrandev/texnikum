<?php

namespace App\Services\Admin;

use App\Models\Post;
use App\Repositories\Admin\PostRepository;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PostService
{
    protected string $eventSlug = 'events';

    public function __construct(protected PostRepository $postRepository) {}

    public function getEventCategoryId(): ?int
    {
        return $this->postRepository->getCategoryIdBySlug($this->eventSlug);
    }

    public function getLatestEventPosts()
    {
        $categoryId = $this->getEventCategoryId();
        if (!$categoryId) return collect();

        return $this->postRepository->getPosts(
            ['category_id' => $categoryId],
            6
        );
    }

    public function getAllEventPosts()
    {
        $categoryId = $this->getEventCategoryId();
        if (!$categoryId) return collect();

        return $this->postRepository->getPosts(
            ['category_id' => $categoryId]
        );
    }

    public function getPostsByCategory($id)
    {
        return $this->postRepository->getPosts(['category_id' => $id]);
    }

    public function getLatestPosts()
    {
        return $this->postRepository->getPosts([], 6);
    }

    public function getAllPosts()
    {
        return $this->postRepository->getPosts();
    }

    public function getPostById($id)
    {
        $post = Post::with(['category', 'translations'])
            ->findOrFail($id);

        $post->increment('views_count');

        return $post;
    }

    /**
     * Create a new post with translations
     */
    public function create(array $data, array $imagePaths = []): Post
    {
        return DB::transaction(function () use ($data, $imagePaths) {
            // Create post
            $post = Post::create([
                'category_id' => $data['category_id'],
                'slug' => $data['slug'],
                'images' => json_encode($imagePaths),
                'published_at' => $data['published_at'] ?? now(),
                'views_count' => 0,
            ]);

            // Create translations (only for non-empty translations)
            if (isset($data['translations']) && is_array($data['translations'])) {
                foreach ($data['translations'] as $translation) {
                    $title = $translation['title'] ?? '';
                    $content = $translation['content'] ?? '';

                    // Skip empty translations
                    if (empty(trim($title)) || empty(strip_tags(trim($content)))) {
                        continue;
                    }

                    $post->translations()->create([
                        'lang_code' => $translation['lang_code'],
                        'title' => $title,
                        'content' => $content,
                    ]);
                }
            }

            return $post->load('translations', 'category');
        });
    }

    /**
     * Upload image and return path (for AJAX upload)
     */
    public function uploadImage(UploadedFile $image): string
    {
        $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('posts', $filename, 'public');

        return $path;
    }

    /**
     * Delete image from storage
     */
    protected function deleteImage(string $imagePath): void
    {
        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
    }

    /**
     * Update existing post
     */
    public function update(int $id, array $data, array $imagePaths = []): Post
    {
        return DB::transaction(function () use ($id, $data, $imagePaths) {
            $post = Post::findOrFail($id);

            // Handle images
            $currentImages = json_decode($post->images, true) ?? [];

            // If new images provided, delete old ones and use new ones
            if (!empty($imagePaths)) {
                foreach ($currentImages as $oldImage) {
                    $this->deleteImage($oldImage);
                }
                $finalImages = $imagePaths;
            } else {
                $finalImages = $currentImages;
            }

            // Update post
            $post->update([
                'category_id' => $data['category_id'],
                'slug' => $data['slug'],
                'images' => json_encode($finalImages),
                'published_at' => $data['published_at'] ?? $post->published_at,
            ]);

            // Update translations
            if (isset($data['translations']) && is_array($data['translations'])) {
                // Delete existing translations
                $post->translations()->delete();

                // Create new translations (only non-empty ones)
                foreach ($data['translations'] as $translation) {
                    $title = $translation['title'] ?? '';
                    $content = $translation['content'] ?? '';

                    // Skip empty translations
                    if (empty(trim($title)) || empty(strip_tags(trim($content)))) {
                        continue;
                    }

                    $post->translations()->create([
                        'lang_code' => $translation['lang_code'],
                        'title' => $title,
                        'content' => $content,
                    ]);
                }
            }

            return $post->load('translations', 'category');
        });
    }

    /**
     * Delete post
     */
    public function delete(int $id): bool
    {
        return DB::transaction(function () use ($id) {
            $post = Post::findOrFail($id);

            // Delete all images
            $images = json_decode($post->images, true) ?? [];
            foreach ($images as $image) {
                $this->deleteImage($image);
            }

            $post->translations()->delete();

            return $post->delete();
        });
    }
}
