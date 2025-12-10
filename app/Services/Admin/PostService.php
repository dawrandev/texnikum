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
    public function create(array $data, ?UploadedFile $image = null): Post
    {
        return DB::transaction(function () use ($data, $image) {
            // Handle image upload
            if ($image) {
                $data['image'] = $this->uploadImage($image);
            }

            // Create post
            $post = Post::create([
                'category_id' => $data['category_id'],
                'slug' => $data['slug'],
                'image' => $data['image'] ?? null,
                'published_at' => $data['published_at'] ?? now(),
                'views_count' => 0,
            ]);

            // Create translations
            if (isset($data['translations']) && is_array($data['translations'])) {
                foreach ($data['translations'] as $translation) {
                    $post->translations()->create([
                        'lang_code' => $translation['lang_code'],
                        'title' => $translation['title'],
                        'content' => $translation['content'],
                    ]);
                }
            }

            return $post->load('translations', 'category');
        });
    }

    /**
     * Upload image and return path
     */
    protected function uploadImage(UploadedFile $image): string
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
    public function update(int $id, array $data, ?UploadedFile $image = null): Post
    {
        return DB::transaction(function () use ($id, $data, $image) {
            $post = Post::findOrFail($id);

            // Handle image upload
            if ($image) {
                // Delete old image if exists
                if ($post->image) {
                    $this->deleteImage($post->image);
                }
                $data['image'] = $this->uploadImage($image);
            }

            // Update post
            $post->update([
                'category_id' => $data['category_id'],
                'slug' => $data['slug'],
                'image' => $data['image'] ?? $post->image,
                'published_at' => $data['published_at'] ?? $post->published_at,
            ]);

            // Update translations
            if (isset($data['translations']) && is_array($data['translations'])) {
                // Delete existing translations
                $post->translations()->delete();

                // Create new translations
                foreach ($data['translations'] as $translation) {
                    $post->translations()->create([
                        'lang_code' => $translation['lang_code'],
                        'title' => $translation['title'],
                        'content' => $translation['content'],
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

            if ($post->image) {
                $this->deleteImage($post->image);
            }

            $post->translations()->delete();

            return $post->delete();
        });
    }
}
