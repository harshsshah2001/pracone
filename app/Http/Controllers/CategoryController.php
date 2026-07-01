<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\CategoryRequest;
use App\Services\admin\CategoryService;
use Exception;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function store(CategoryRequest $request)
    {
        try {

            $category = $this->categoryService->store($request);

            return response()->json([
                'success' => true,
                'message' => 'Category created successfully.',
                'data' => $category
            ], 201);

        } catch (Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Something went wrong.',
                'error' => $e->getMessage()
            ], 500);

        }
    }
}
