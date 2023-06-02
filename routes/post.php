<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/post/blog', [PostController::class,'index'])->name('post.index');

Route::get('/post/show/{post}', [PostController::class,'show'])->name('post.show');

Route::get('/post/edit/{post}', [PostController::class,'edit'])->name('post.edit');

Route::put('/post/{post}', [PostController::class,'update'])->name('post.update');

Route::get('/post/create', [PostController::class,'create'])->name('post.create');

Route::post('/post/store', [PostController::class,'store'])->name('post.store');

Route::delete('/post/{post}', [PostController::class,'destroy'])->name('post.destroy');
