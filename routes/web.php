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

Route::get('/asean-2026/dashboard/enrolled-stgepr-e-ids', function () {
    return view ('aseanims.generatedid');
});

Route::get('/asean-2026/dashboard/enrolled-stgepr-e-ids/e-id-enrollment-form', function () {
    return view ('aseanims.create');
});


