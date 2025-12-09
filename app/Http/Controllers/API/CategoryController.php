<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Services\API\CategoryService;

/**
 * @group Categories
 * 
 * Managing post categories
 */
class CategoryController extends Controller
{
    public function __construct(protected CategoryService $categoryService) {}

    /**
     * Get all categories
     * 
     * @responseField success boolean Operation success status
     * @responseField message string Response message
     * @responseField data array List of categories
     * @responseField data[].id integer Category ID
     * @responseField data[].slug string Category slug (unique identifier)
     * @responseField data[].name string Category name (translated)
     * @responseField data[].created_at string Category creation timestamp (ISO 8601 format)
     * @responseField data[].updated_at string Category last update timestamp (ISO 8601 format)
     */
    public function index()
    {
        $categories = $this->categoryService->getAllCategories();

        return response()->json([
            'success' => true,
            'message' => 'Categories retrieved successfully',
            'data' => CategoryResource::collection($categories)
        ]);
    }

    /**
     * Get category by ID
     * 
     * @urlParam id integer required Category ID
     * 
     * @responseField success boolean Operation success status
     * @responseField message string Response message
     * @responseField data object Category details
     * @responseField data.id integer Category ID
     * @responseField data.slug string Category slug (unique identifier)
     * @responseField data.name string Category name (translated)
     * @responseField data.created_at string Category creation timestamp (ISO 8601 format)
     * @responseField data.updated_at string Category last update timestamp (ISO 8601 format)
     * 
     * @response 404 {
     *   "success": false,
     *   "message": "Category not found"
     * }
     */
    public function show($id)
    {
        $category = $this->categoryService->getCategoryById($id);

        return response()->json([
            'success' => true,
            'message' => 'Category retrieved successfully',
            'data' => CategoryResource::make($category)
        ]);
    }
}
