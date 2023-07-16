<?php

use App\Http\Controllers\Dashboard\CategoryController;
use App\Http\Controllers\Dashboard\MenuController;
use App\Http\Controllers\Dashboard\ReservationController;
use App\Http\Controllers\Dashboard\TableController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('index', function () {
    return view('welcome');
})->name('index');

Route::get('home', function () {
    return view('dashboard.home');
})->name('home');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::resources([
    'categories' => CategoryController::class,
    'menus' => MenuController::class,
    'tables' => TableController::class,
]);

Route::resource('reservations', ReservationController::class)->only(['index', 'destroy']);
