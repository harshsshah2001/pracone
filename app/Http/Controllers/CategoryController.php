<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(CategoryService $categoryService){
        $this->categoryService = $categoryService;
    }
    public function store(Request $request){
        return $this->categoryService->store($request);
    }
}
