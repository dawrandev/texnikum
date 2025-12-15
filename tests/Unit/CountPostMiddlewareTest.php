<?php

namespace Tests\Unit;

use App\Http\Middleware\CountPostMiddleware;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;

class CountPostMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    public function test_increments_on_get_and_successful_response()
    {
        $category = Category::create(['slug' => 'cat-test']);

        $post = Post::create([
            'category_id' => $category->id,
            'slug' => 'post-test',
            'images' => [],
            'published_at' => now(),
            'views_count' => 0,
        ]);

        $request = Mockery::mock(\Illuminate\Http\Request::class);
        $request->shouldReceive('isMethod')->with('get')->andReturnTrue();
        $request->shouldReceive('route')->with('post')->andReturn($post);

        $middleware = new CountPostMiddleware();

        $next = function ($req) {
            return response('', 200);
        };

        $middleware->handle($request, $next);

        $this->assertDatabaseHas('posts', ['id' => $post->id, 'views_count' => 1]);
    }

    public function test_does_not_increment_on_non_get_request()
    {
        $category = Category::create(['slug' => 'cat-test']);

        $post = Post::create([
            'category_id' => $category->id,
            'slug' => 'post-test-2',
            'images' => [],
            'published_at' => now(),
            'views_count' => 0,
        ]);

        $request = Mockery::mock(\Illuminate\Http\Request::class);
        $request->shouldReceive('isMethod')->with('get')->andReturnFalse();
        $request->shouldReceive('route')->with('post')->andReturn($post);

        $middleware = new CountPostMiddleware();

        $next = function ($req) {
            return response('', 200);
        };

        $middleware->handle($request, $next);

        $this->assertDatabaseHas('posts', ['id' => $post->id, 'views_count' => 0]);
    }

    public function test_does_not_increment_on_unsuccessful_response()
    {
        $category = Category::create(['slug' => 'cat-test']);

        $post = Post::create([
            'category_id' => $category->id,
            'slug' => 'post-test-3',
            'images' => [],
            'published_at' => now(),
            'views_count' => 0,
        ]);

        $request = Mockery::mock(\Illuminate\Http\Request::class);
        $request->shouldReceive('isMethod')->with('get')->andReturnTrue();
        $request->shouldReceive('route')->with('post')->andReturn($post);

        $middleware = new CountPostMiddleware();

        $next = function ($req) {
            return response('', 500);
        };

        $middleware->handle($request, $next);

        $this->assertDatabaseHas('posts', ['id' => $post->id, 'views_count' => 0]);
    }
}
