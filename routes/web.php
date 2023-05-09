<?php

use Illuminate\Support\Facades\Route;


define('STORAGE_DISK', 'public');
define('PAGINATION', 10);


Route::get('/', function () {
    return view('welcome');
});
