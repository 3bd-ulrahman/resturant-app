<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $specials = Menu::query()->whereHas('categories', function ($query) {
            $query->where('name', 'specials');
        })->take(4)->get();

        return view('website.home', compact('specials'));
    }
}
