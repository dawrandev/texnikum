<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PostDeletionTest extends TestCase
{
    use RefreshDatabase;

    public function test_delete_route_removes_post()
    {
        $category = Category::create(['slug' => 'cat-test']);

        $post = Post::create([
            'category_id' => $category->id,
            'slug' => 'post-to-delete',
            'images' => [],
            'published_at' => now(),
            'views_count' => 0,
        ]);

        $this->withoutMiddleware();

        $response = $this->delete(route('posts.destroy', $post->id));

        $response->assertRedirect(route('posts.index'));
        $this->assertDatabaseMissing('posts', ['id' => $post->id]);
    }
}
