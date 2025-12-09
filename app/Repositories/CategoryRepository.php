<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\CategoryTranslation;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryRepository
{
    /**
     * Get all categories with translations (paginated)
     */
    public function getAllWithTranslations(int $perPage = 15): LengthAwarePaginator
    {
        return Category::with(['translations'])
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    /**
     * Create a new category
     */
    public function create(array $data): Category
    {
        return Category::create($data);
    }

    /**
     * Update category
     */
    public function update(int $id, array $data): bool
    {
        return Category::where('id', $id)->update($data);
    }

    /**
     * Delete category
     */
    public function delete(int $id): bool
    {
        return Category::destroy($id) > 0;
    }

    /**
     * Create a category translation
     */
    public function createTranslation(int $categoryId, array $data): CategoryTranslation
    {
        return CategoryTranslation::create([
            'category_id' => $categoryId,
            'lang_code' => $data['lang_code'],
            'name' => $data['name'],
        ]);
    }

    /**
     * Delete all translations for a category
     */
    public function deleteTranslations(int $categoryId): bool
    {
        return CategoryTranslation::where('category_id', $categoryId)->delete() > 0;
    }

    /**
     * Find category by ID with translations
     */
    public function findById(int $id): ?Category
    {
        return Category::withCount('posts')
            ->with(['translations', 'posts'])
            ->find($id);
    }

    /**
     * Find category by slug
     */
    public function findBySlug(string $slug): ?Category
    {
        return Category::with(['translations'])->where('slug', $slug)->first();
    }

    /**
     * Check if slug exists
     */
    public function slugExists(string $slug, ?int $excludeId = null): bool
    {
        $query = Category::where('slug', $slug);

        if ($excludeId) {
            $query->where('id', '!=', $excludeId);
        }

        return $query->exists();
    }

    /**
     * Get categories for select dropdown
     */
    public function getForSelect(): array
    {
        return Category::with('translations')
            ->get()
            ->mapWithKeys(function ($category) {
                $name = $category->translations->first()?->name ?? $category->slug;
                return [$category->id => $name];
            })
            ->toArray();
    }
}
