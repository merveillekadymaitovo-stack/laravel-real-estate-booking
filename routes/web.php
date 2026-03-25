<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ACCUEIL 
Route::get('/', function () {
    return redirect()->route('properties.index');
})->name('home');
// DASHBOARD
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// =====================
// PROPERTIES
// =====================
Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/properties/create', [PropertyController::class, 'create'])->name('properties.create');
Route::post('/properties', [PropertyController::class, 'store'])->name('properties.store');
Route::get('/properties/{id}', [PropertyController::class, 'show'])->name('properties.show');
// =====================
// BOOKINGS
// =====================
Route::get('/my-bookings', [BookingController::class, 'index'])->name('bookings.index');
Route::post('/bookings/{id}/confirm', [BookingController::class, 'confirm'])->name('bookings.confirm');
Route::post('/bookings/{id}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

require __DIR__.'/auth.php';