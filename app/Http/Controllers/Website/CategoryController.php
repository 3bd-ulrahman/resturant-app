<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('website.categories.index', compact('categories'));
    }

    public function show(Category $category)
    {
        return view('website.categories.show', compact('category'));
    }
}
