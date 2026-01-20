<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StgeprEidController;

/*
|--------------------------------------------------------------------------
| Public / Static Pages
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/asean-2026', function () {
    return view('aseanims.index');
});

Route::get('/asean-2026/dashboard', function () {
    return view('aseanims.dashboard');
});

/*
|--------------------------------------------------------------------------
| STGEPR E-ID (Controller-driven)
|--------------------------------------------------------------------------
*/

// LIST / DATABASE VIEW (generatedid.blade.php)
Route::get(
    '/asean-2026/dashboard/enrolled-stgepr-e-ids',
    [StgeprEidController::class, 'index']
)->name('stgepr.index');

// ENROLLMENT FORM (create.blade.php)
Route::get(
    '/asean-2026/dashboard/enrolled-stgepr-e-ids/e-id-enrollment-form',
    [StgeprEidController::class, 'create']
);

// STORE DATA
Route::post(
    '/stgepr/e-id/store',
    [StgeprEidController::class, 'store']
)->name('stgepr.store');

Route::get(
    '/stgepr/e-id/view/{id}',
    [StgeprEidController::class, 'show']
)->name('stgepr.show');
