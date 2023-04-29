<?php

use Illuminate\Support\Facades\Route;


define('STORAGE_DISK', 'public');


Route::get('/', function () {
    return view('welcome');
});
