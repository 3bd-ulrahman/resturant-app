<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('index', function () {
    return view('welcome');
})->name('index');

Route::get('home', function () {
    return view('admin.index');
})->name('home');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::resources([
    'categories' => CategoryController::class,
    'menus' => MenuController::class,
    'tables' => TableController::class,
    'reservations' => ReservationController::class
]);
