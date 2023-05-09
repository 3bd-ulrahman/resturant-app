<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::query()->paginate(PAGINATION);

        return view('dashboard.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('dashboard.categories.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'image' => ['required', 'image', 'max:2048']
        ]);

        $image = Storage::disk(STORAGE_DISK)->put('images/categories', $request->file('image'));

        Category::create(['image' => $image] + $validated);

        return to_route('dashboard.categories.index')->with('success', 'Category created successfully');
    }

    public function show(Category $category)
    {
        //
    }

    public function edit(Category $category)
    {
        return view('dashboard.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'image' => ['nullable', 'image', 'max:2048']
        ]);

        if ($request->hasFile('image')) {
            Storage::disk(STORAGE_DISK)->delete($category->image);
            $image = Storage::disk(STORAGE_DISK)->put('images/categories', $request->file('image'));
        }

        $category->update(['image' => $image] + $validated);

        return to_route('dashboard.categories.index')->with('success', 'Category updated successfully');
    }

    public function destroy(Category $category)
    {
        Storage::disk(STORAGE_DISK)->delete($category->image);
        $category->menus()->detach();
        $category->delete();

        return to_route('dashboard.categories.index')->with('danger', 'Category deleted successfully');
    }
}
