<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


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

require __DIR__.'/auth.php';

// posts - protected
Route::middleware(['auth', 'verified'])->resource('posts', PostController::class);

// Not protected
Route::get('posts', [PostController::class, 'index'])->name('posts.index');

// protected - only auth
Route::middleware('auth')->get('posts/{post}', [PostController::class, 'show'])->name('posts.show');