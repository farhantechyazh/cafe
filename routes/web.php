<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/{id}', [CategoryController::class, 'show'])->name('category.show');
    
  

});

Route::prefix('posts')->group(function () {
    Route::get('/create', [PostController::class, 'create'])->name('post.create');
    Route::post('/', [PostController::class, 'store'])->name('post.store');
    Route::get('/', [PostController::class, 'show'])->name('post.show');
    Route::get('/posts/{id}', [PostController::class, 'show'])->name('post.show');
    Route::get('/updated-post', [PostController::class, 'updatedPost'])->name('post.updated');
// Route for editing the post
Route::get('/post/{id}/edit', [PostController::class, 'edit'])->name('post.edit');

// Route for updating the post
Route::put('/post/{id}', [PostController::class, 'update'])->name('post.update');

    
    // Delete Route
    Route::delete('/post/{id}', [PostController::class, 'destroy'])->name('post.destroy');
    

    


});





