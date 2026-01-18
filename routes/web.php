<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/asean-2026', function () {
    return view ('aseanims.index');
});
