<?php

use App\Http\Controllers\BoxesController;
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

    Route::get('/boxes', [BoxesController::class, 'index'])->name('boxes.index');
    Route::get('/boxe/{id}', [BoxesController::class, 'show'])->name('boxes.show');

    Route::get('/boxe/edit/{id}', [BoxesController::class, 'view_edit'])->name('boxes.edit');
    Route::put('/boxe/edit/{id}', [BoxesController::class, 'edit'])->name('boxes.edit');
    Route::delete('/boxe/{id}', [BoxesController::class, 'destroy'])->name('boxes.destroy');
});

require __DIR__.'/auth.php';
