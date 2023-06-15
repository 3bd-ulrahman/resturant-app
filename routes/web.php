<?php

use App\Http\Controllers\Website\CategoryController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\MenuController;
use App\Http\Controllers\Website\ReservationController;
use App\Http\Controllers\Website\TableController;
use Illuminate\Support\Facades\Route;


define('STORAGE_DISK', 'public');
define('PAGINATION', 10);


Route::get('/', function () {
    return view('website.home');
});

Route::get('/', [HomeController::class, 'index']);

// Categories
Route::get('categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('categories/{category}', [CategoryController::class, 'show'])->name('categories.show');

// Menus
Route::get('menus', [MenuController::class, 'index'])->name('menus.index');

// Reservations
Route::get('reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::post('reservations', [ReservationController::class, 'store'])->name('reservations.store');

// Table
Route::get('tables', TableController::class);
