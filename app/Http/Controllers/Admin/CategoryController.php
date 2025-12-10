<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CategoryStoreRequest;
use App\Services\Admin\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller
{
    public function __construct(
        protected CategoryService $categoryService
    ) {}

    /**
     * Display a listing of categories
     */
    public function index(): View
    {
        $categories = $this->categoryService->getAllWithTranslations();

        return view('pages.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category
     */
    public function create(): View
    {
        return view('pages.categories.create');
    }

    /**
     * Store a newly created category
     */
    public function store(CategoryStoreRequest $request): RedirectResponse
    {
        try {
            $this->categoryService->create($request->validated());

            alert_success('Категория успешно создана!');

            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            alert_error('Ошибка при создании категории: ' . $e->getMessage());

            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified category (JSON for modal)
     */
    public function show(int $id): JsonResponse
    {
        try {
            $category = $this->categoryService->getById($id);

            return response()->json([
                'success' => true,
                'data' => $category
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Категория не найдена'
            ], 404);
        }
    }

    public function showModal(int $id): View
    {
        $category = $this->categoryService->findByIdWithRelations($id);

        return view('pages.categories.show', compact('category'));
    }

    /**
     * Show modal for editing category
     */
    public function editModal(int $id): View
    {
        $category = $this->categoryService->findByIdWithRelations($id);

        return view('pages.categories.edit', compact('category'));
    }

    /**
     * Update the specified category
     */
    public function update(CategoryStoreRequest $request, int $id): RedirectResponse
    {
        try {
            $this->categoryService->update($id, $request->validated());

            alert_success('Категория успешно обновлена!');

            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            alert_error('Ошибка при обновлении категории: ' . $e->getMessage());

            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified category
     */
    public function destroy(int $id): RedirectResponse
    {
        try {
            $this->categoryService->delete($id);

            alert_success('Категория успешно удалена!');

            return redirect()->route('categories.index');
        } catch (\Exception $e) {
            alert_error('Ошибка при удалении категории: ' . $e->getMessage());

            return redirect()->back();
        }
    }
}
