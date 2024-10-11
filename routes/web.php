<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;




Route::get('/', [\App\Http\Controllers\PageController::class, 'index'])->name('index');
//
Route::resource('post', PostController::class);
// Custom route for 'view' method
Route::get('/view/{slug}', [PostController::class, 'show'])->name('post.view');
Route::get('/create', [PostController::class, 'create'])->name('post.create');
Route::get('/post/create', [PostController::class, 'create'])->name('post.create');

// Show edit form
Route::get('/post/{slug}/edit', [PostController::class, 'edit'])->name('post.edit');

// Update post
Route::put('/post/{slug}/update', [PostController::class, 'update'])->name('post.update');

// Delete post
Route::delete('/post/{slug}', [PostController::class, 'destroy'])->name('post.destroy');



Route::get('/profile', [UserProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile', [UserProfileController::class, 'update'])->name('profile.update');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
