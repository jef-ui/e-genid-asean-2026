<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/asean-2026', function () {
    return view ('aseanims.index');
});

Route::get('/asean-2026/dashboard', function () {
    return view ('aseanims.dashboard');
});

Route::get('/asean-2026/dashboard/e-id-generated', function () {
    return view ('aseanims.generatedid');
});
