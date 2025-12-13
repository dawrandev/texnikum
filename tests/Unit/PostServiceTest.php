<?php

namespace Tests\Unit;

use App\Models\Category;
use App\Models\Post;
use App\Repositories\Admin\PostRepository;
use App\Services\Admin\PostService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostServiceTest extends TestCase
{
    use RefreshDatabase;

    public function test_update_handles_images_array_without_json_decode_error()
    {
        $category = Category::create(['slug' => 'cat-test']);

        $post = Post::create([
            'category_id' => $category->id,
            'slug' => 'post-1',
            'images' => ['a.jpg', 'b.jpg'],
            'published_at' => now(),
            'views_count' => 0,
        ]);

        $service = new PostService(new PostRepository());

        $data = [
            'category_id' => $category->id,
            'slug' => 'post-1-updated',
            'translations' => [],
        ];

        $updated = $service->update($post->id, $data, []);

        $this->assertEquals(['a.jpg', 'b.jpg'], $updated->images);
        $this->assertEquals('post-1-updated', $updated->slug);
    }
}
