<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(protected CategoryService $categoryService)
    {
        // 
    }
    public function index()
    {
        $categories = $this->categoryService->getAllCategories();

        return response()->json([
            'success' => true,
            'message' => 'Categories retrieved successfully',
            'data' => CategoryResource::collection($categories)
        ]);
    }

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
