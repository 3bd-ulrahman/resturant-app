<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Website\ReservationController;
use Illuminate\Support\Facades\Route;


Route::get('/home', function () {
    return view('dashboard');
})->name('home');

Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Reservations
Route::get('reservations', [ReservationController::class, 'index'])->name('reservations.index');
Route::post('reservations', [ReservationController::class, 'store'])->name('reservations.store');
