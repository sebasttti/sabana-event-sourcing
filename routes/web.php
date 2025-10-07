<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('orders/regenerate', [OrderController::class, 'regenerate'])
     ->name('orders.regenerate');

Route::get('orders/destroyViewDatabase', [OrderController::class, 'destroyViewDatabase'])
     ->name('orders.destroyViewDatabase');

Route::get('orders/lists', [OrderController::class, 'lists'])
     ->name('orders.lists');

Route::resource('orders', OrderController::class);




require __DIR__.'/auth.php';
