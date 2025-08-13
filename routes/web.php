<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $categories = \App\Models\Category::with('children')
        ->active()
        ->parents()
        ->orderBy('sort_order')
        ->get();
    
    return view('home', compact('categories'));
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Category management routes (for authenticated users/workers)
Route::middleware(['auth'])->group(function () {
    Route::resource('categories', CategoryController::class);
});

// Public category routes
Route::get('/categories/{category:slug}', [CategoryController::class, 'show'])->name('categories.show');

// API routes for AJAX dropdown loading
Route::get('/api/categories', [CategoryController::class, 'getCategories']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';