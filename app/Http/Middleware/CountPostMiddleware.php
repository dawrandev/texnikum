<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Post;

class CountPostMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (! $request->isMethod('get')) {
            return $response;
        }

        if (! $response->isSuccessful()) {
            return $response;
        }

        $post = $request->route('post');

        if ($post instanceof Post) {
            $post->increment('views_count');
        } elseif (is_numeric($post)) {
            Post::where('id', $post)->increment('views_count');
        }

        return $response;
    }
}
