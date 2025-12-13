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

    public function create(array $data, array $imagePaths = []): Post
    {
        return DB::transaction(function () use ($data, $imagePaths) {
            $post = Post::create([
                'category_id' => $data['category_id'],
                'slug' => $data['slug'],
                'images' => $imagePaths,
                'published_at' => $data['published_at'] ?? now(),
                'views_count' => 0,
            ]);

            if (isset($data['translations']) && is_array($data['translations'])) {
                foreach ($data['translations'] as $translation) {
                    $title = $translation['title'] ?? '';
                    $content = $translation['content'] ?? '';

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

    public function uploadImage(UploadedFile $image): string
    {
        $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
        $path = $image->storeAs('posts', $filename, 'public');

        return $path;
    }

    protected function deleteImage(string $imagePath): void
    {
        if (Storage::disk('public')->exists($imagePath)) {
            Storage::disk('public')->delete($imagePath);
        }
    }

    public function update(
        int $id,
        array $data,
        array $newImages = [],
        array $keptImages = [],
        array $deletedImages = []
    ): Post {
        return DB::transaction(function () use ($id, $data, $newImages, $keptImages, $deletedImages) {
            $post = Post::findOrFail($id);

            // Delete removed images from storage
            foreach ($deletedImages as $deletedImage) {
                $this->deleteImage($deletedImage);
            }

            // Combine kept images and new images
            $finalImages = array_merge($keptImages, $newImages);

            $post->update([
                'category_id' => $data['category_id'],
                'slug' => $data['slug'],
                'images' => !empty($finalImages) ? $finalImages : [],
                'published_at' => $data['published_at'] ?? $post->published_at,
            ]);

            if (isset($data['translations']) && is_array($data['translations'])) {
                $post->translations()->delete();

                foreach ($data['translations'] as $translation) {
                    $title = $translation['title'] ?? '';
                    $content = $translation['content'] ?? '';

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

    public function delete(int $id): bool
    {
        return DB::transaction(function () use ($id) {
            $post = Post::findOrFail($id);

            $images = is_array($post->images)
                ? $post->images
                : (json_decode($post->images, true) ?? []);

            foreach ($images as $image) {
                $this->deleteImage($image);
            }

            $post->translations()->delete();

            return $post->delete();
        });
    }
}
