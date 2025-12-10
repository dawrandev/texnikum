<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostStoreRequest;
use App\Services\Admin\CategoryService;
use App\Services\Admin\PostService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function __construct(
        protected PostService $postService,
        protected CategoryService $categoryService
    ) {}

    /**
     * Display a listing of posts
     */
    public function index(): View
    {
        $posts = $this->postService->getAllPosts();
        return view('pages.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new post
     */
    public function create(): View
    {
        $categories = $this->categoryService->getForSelect();
        $languages = \App\Models\Language::all();
        return view('pages.posts.create', compact('categories', 'languages'));
    }

    /**
     * Store a newly created post
     */
    public function store(PostStoreRequest $request): RedirectResponse
    {
        try {
            $this->postService->create($request->validated(), $request->file('image'));

            alert_success('Пост успешно создан!');

            return redirect()->route('posts.index');
        } catch (\Exception $e) {
            \Log::error('Post creation error: ' . $e->getMessage());

            alert_error('Ошибка при создании поста: ' . $e->getMessage());

            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified post
     */
    public function show(int $id): View
    {
        $post = $this->postService->getPostById($id);
        return view('pages.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified post
     */
    public function edit(int $id): View
    {
        $post = $this->postService->getPostById($id);
        $categories = $this->categoryService->getForSelect();
        $languages = \App\Models\Language::all();
        return view('pages.posts.edit', compact('post', 'categories', 'languages'));
    }

    /**
     * Update the specified post
     */
    public function update(PostStoreRequest $request, int $id): RedirectResponse
    {
        try {
            $this->postService->update($id, $request->validated(), $request->file('image'));

            alert_success('Пост успешно обновлен!');

            return redirect()->route('posts.index');
        } catch (\Exception $e) {
            \Log::error('Post update error: ' . $e->getMessage());

            alert_error('Ошибка при обновлении поста: ' . $e->getMessage());

            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified post
     */
    public function destroy(int $id): RedirectResponse
    {
        try {
            $this->postService->delete($id);

            alert_success('Пост успешно удален!');

            return redirect()->route('posts.index');
        } catch (\Exception $e) {
            \Log::error('Post deletion error: ' . $e->getMessage());

            alert_error('Ошибка при удалении поста: ' . $e->getMessage());

            return redirect()->back();
        }
    }
}
