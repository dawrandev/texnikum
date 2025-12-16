<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Models\Category;
use App\Models\Post;
use App\Services\Admin\CategoryService;
use App\Services\Admin\PostService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function __construct(
        protected PostService $postService,
        protected CategoryService $categoryService
    ) {}

    public function index(Request $request): View
    {
        $lang = $request->get('lang', app()->getLocale());

        $query = Post::with([
            'category.translations',
            'translations'
        ])
            ->orderBy('published_at', 'desc');

        if ($request->filled('lang')) {
            $query->whereHas('translations', function ($q) use ($lang) {
                $q->where('lang_code', $lang);
            });
        }

        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }

        $posts = $query->get();

        return view('pages.posts.index', compact('posts', 'lang'));
    }


    public function create()
    {
        $categories = Category::with(['translations' => function ($query) {
            $query->where('lang_code', 'ru');
        }])->get();
        $languages = \App\Models\Language::all();

        return view('pages.posts.create', compact('categories', 'languages'));
    }

    public function store(PostStoreRequest $request): RedirectResponse
    {
        try {
            $data = $request->validated();

            $imagePaths = $request->input('images', []);

            $this->postService->create($data, $imagePaths);

            alert_success('Пост успешно создан!');

            return redirect()->route('posts.index');
        } catch (\Exception $e) {
            Log::error('Post creation error: ' . $e->getMessage());

            alert_error('Ошибка при создании поста: ' . $e->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function uploadImage(Request $request)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048'
            ]);

            $image = $request->file('image');
            $path = $this->postService->uploadImage($image);

            return response()->json([
                'success' => true,
                'path' => $path,
                'url' => Storage::url($path)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 422);
        }
    }

    public function show(int $id): View
    {
        $post = $this->postService->getPostById($id);
        return view('pages.posts.show', compact('post'));
    }

    public function edit(int $id): View
    {
        $post = $this->postService->getPostById($id);
        $categories = Category::with(['translations' => function ($query) {
            $query->where('lang_code', 'ru');
        }])->get();

        $languages = \App\Models\Language::all();
        return view('pages.posts.edit', compact('post', 'categories', 'languages'));
    }

    public function update(PostStoreRequest $request, int $id): RedirectResponse
    {
        try {
            $request->merge(['post_id' => $id]);

            $data = $request->validated();

            $newImages = $request->input('new_images', []);
            $keptImages = $request->input('kept_images', []);
            $deletedImages = $request->input('deleted_images', []);

            $this->postService->update($id, $data, $newImages, $keptImages, $deletedImages);

            alert_success('Пост успешно обновлен!');

            return redirect()->route('posts.index');
        } catch (\Exception $e) {
            Log::error('Post update error: ' . $e->getMessage());

            alert_error('Ошибка при обновлении поста: ' . $e->getMessage());

            return redirect()->back()->withInput();
        }
    }

    public function destroy(int $id): RedirectResponse
    {
        try {
            $this->postService->delete($id);

            alert_success('Пост успешно удален!');

            return redirect()->route('posts.index');
        } catch (\Exception $e) {
            Log::error('Post deletion error: ' . $e->getMessage());

            alert_error('Ошибка при удалении поста: ' . $e->getMessage());

            return redirect()->back();
        }
    }
}
