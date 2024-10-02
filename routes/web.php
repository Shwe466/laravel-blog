<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

// Redirect the root URL to the public blog list
Route::get('/', [PostController::class, 'index'])->name('posts.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes that require authentication
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('posts', PostController::class)->except('index', 'show'); // Exclude 'index' and 'show' from auth-protected routes
    Route::post('posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
});

// Public routes for all users to see without login
Route::get('posts', [PostController::class, 'index'])->name('posts.index'); // This line ensures GET request is handled
Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Authentication routes provided by Laravel Breeze
require __DIR__.'/auth.php';
