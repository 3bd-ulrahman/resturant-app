<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\MenuRequest;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::query()->paginate(PAGINATION);

        return view('dashboard.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('dashboard.menus.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request)
    {
        $image = Storage::disk(STORAGE_DISK)->put('images/menus', $request->file('image'));

        DB::transaction(function () use($request, $image) {
            $menu = Menu::create(['image' => $image] + $request->validated());
            $menu->categories()->attach($request->categories_id);
        });

        return to_route('dashboard.menus.index')->with('success', 'Menu created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Menu $menu)
    {
        $menu = $menu->load('categories');
        $categories = Category::all();

        return view('dashboard.menus.edit', compact('menu', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuRequest $request, Menu $menu)
    {
        if ($request->image) {
            Storage::disk(STORAGE_DISK)->delete($menu->image);
            $image = Storage::disk(STORAGE_DISK)->put('images/menus', $request->file('image'));
        }

        DB::beginTransaction();
            $menu->update(['image' => $image], $request->validated());
            $menu->categories()->sync($request->categories_id);
        DB::commit();

        return to_route('dashboard.menus.index')->with('success', 'Menu updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        Storage::disk(STORAGE_DISK)->delete($menu->image);

        $menu->categories()->detach();
        $menu->delete();

        return to_route('dashboard.menus.index')->with('danger', 'Menu deleted successfully');
    }
}
