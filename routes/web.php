<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StgeprEidController;
use App\Http\Controllers\ImtEidController;


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

/*
|--------------------------------------------------------------------------
| Dashboard (Controller-driven)
|--------------------------------------------------------------------------
*/

Route::get(
    '/asean-2026/dashboard',
    [DashboardController::class, 'index']
);

/*
|--------------------------------------------------------------------------
| STGEPR E-ID (Controller-driven)
|--------------------------------------------------------------------------
*/

// LIST / DATABASE VIEW
Route::get(
    '/asean-2026/dashboard/enrolled-stgepr-e-ids',
    [StgeprEidController::class, 'index']
)->name('stgepr.index');

// ENROLLMENT FORM
Route::get(
    '/asean-2026/dashboard/enrolled-stgepr-e-ids/e-id-enrollment-form',
    [StgeprEidController::class, 'create']
);

// STORE DATA
Route::post(
    '/stgepr/e-id/store',
    [StgeprEidController::class, 'store']
)->name('stgepr.store');

// VIEW ID
Route::get(
    '/stgepr/e-id/view/{id}',
    [StgeprEidController::class, 'show']
)->name('stgepr.show');

//DELETE
Route::delete(
    '/stgepr/e-id/delete/{id}',
    [StgeprEidController::class, 'destroy']
)->name('stgepr.delete');


/*
|--------------------------------------------------------------------------
| IMT E-ID
|--------------------------------------------------------------------------
*/

Route::get(
    '/asean-2026/dashboard/enrolled-imt-e-ids',
    [ImtEidController::class, 'index']
)->name('imt.index');

Route::get(
    '/asean-2026/dashboard/enrolled-imt-e-ids/e-id-enrollment-form',
    [ImtEidController::class, 'create'] 
);

Route::post(
    '/imt/e-id/store',
    [ImtEidController::class, 'store']
)->name('imt.store');

Route::get(
    '/imt/e-id/view/{id}',
    [ImtEidController::class, 'show']
)->name('imt.show');

Route::delete(
    '/imt/e-id/delete/{id}',
    [ImtEidController::class, 'destroy']
)->name('imt.delete');