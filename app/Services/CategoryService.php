<?php

namespace App\Services;

use App\Repositories\CategoryRepository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class CategoryService
{
    public function __construct(
        protected CategoryRepository $categoryRepository
    ) {}

    /**
     * Get all categories with translations (paginated)
     */
    public function getAllWithTranslations()
    {
        return $this->categoryRepository->getAllWithTranslations();
    }

    /**
     * Get category by ID with translations (JSON format for API)
     */
    public function getById(int $id): array
    {
        $category = $this->categoryRepository->findById($id);

        if (!$category) {
            throw new \Exception('Категория не найдена');
        }

        return [
            'id' => $category->id,
            'slug' => $category->slug,
            'translations' => $category->translations->map(function ($translation) {
                return [
                    'lang_code' => $translation->lang_code,
                    'name' => $translation->name,
                ];
            })->toArray()
        ];
    }

    /**
     * Find category by ID with all relations (for blade views/modals)
     */
    public function findByIdWithRelations(int $id): mixed
    {
        $category = $this->categoryRepository->findById($id);

        if (!$category) {
            throw new \Exception('Категория не найдена');
        }

        return $category;
    }

    /**
     * Create a new category with translations
     */
    public function create(array $data): mixed
    {
        return DB::transaction(function () use ($data) {
            // Create category
            $category = $this->categoryRepository->create([
                'slug' => $data['slug'],
            ]);

            // Create translations
            if (isset($data['translations'])) {
                foreach ($data['translations'] as $translation) {
                    $this->categoryRepository->createTranslation($category->id, [
                        'lang_code' => $translation['lang_code'],
                        'name' => $translation['name'],
                    ]);
                }
            }

            return $category;
        });
    }

    /**
     * Update category with translations
     */
    public function update(int $id, array $data): mixed
    {
        return DB::transaction(function () use ($id, $data) {
            $category = $this->categoryRepository->findById($id);

            if (!$category) {
                throw new \Exception('Категория не найдена');
            }

            // Update category
            $this->categoryRepository->update($id, [
                'slug' => $data['slug'],
            ]);

            // Update translations
            if (isset($data['translations'])) {
                // Delete old translations
                $this->categoryRepository->deleteTranslations($id);

                // Create new translations
                foreach ($data['translations'] as $translation) {
                    $this->categoryRepository->createTranslation($id, [
                        'lang_code' => $translation['lang_code'],
                        'name' => $translation['name'],
                    ]);
                }
            }

            return $category->fresh();
        });
    }

    /**
     * Delete category
     */
    public function delete(int $id): bool
    {
        return DB::transaction(function () use ($id) {
            $category = $this->categoryRepository->findById($id);

            if (!$category) {
                throw new \Exception('Категория не найдена');
            }

            // Check if category has posts
            if ($category->posts()->count() > 0) {
                throw new \Exception('Невозможно удалить категорию, в ней есть посты');
            }

            // Delete translations first
            $this->categoryRepository->deleteTranslations($id);

            // Delete category
            return $this->categoryRepository->delete($id);
        });
    }
}
