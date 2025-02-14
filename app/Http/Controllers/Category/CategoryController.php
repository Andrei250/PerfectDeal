<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getSubcategories(Request $request, Category $category): array
    {
        return [$category->subcategories];
    }

}
