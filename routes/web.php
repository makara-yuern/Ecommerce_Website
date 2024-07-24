<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductVariantController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
    // Display all categories
    Route::get('users', [UserController::class, 'index'])->name('user-management');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.user.delete');

    Route::get('categories', [CategoryController::class, 'index'])->name('category-management');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.delete');

    Route::get('products', [ProductController::class, 'index'])->name('products.index');
    Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('products', [ProductController::class, 'store'])->name('products.store');
    Route::get('products/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('product_variants', [ProductVariantController::class, 'index'])->name('product_variants.index');
    Route::get('product_variants/create', [ProductVariantController::class, 'create'])->name('product_variants.create');
    Route::post('product_variants', [ProductVariantController::class, 'store'])->name('product_variants.store');
    Route::get('product_variants/{id}', [ProductVariantController::class, 'show'])->name('product_variants.show');
    Route::get('product_variants/{id}/edit', [ProductVariantController::class, 'edit'])->name('product_variants.edit');
    Route::put('product_variants/{id}', [ProductVariantController::class, 'update'])->name('product_variants.update');
    Route::delete('product_variants/{id}', [ProductVariantController::class, 'destroy'])->name('product_variants.destroy');
});

require __DIR__ . '/auth.php';