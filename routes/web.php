<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/' , function(){
    return view('index');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

Route::get('user/profile' , [UserController::class , 'showProfile'])->name('user.showProfile');
Route::get('user/{user}' , [UserController::class , 'show'])->name('user.show');
Route::get('user/edit/{user}', [UserController::class , 'edit'])->name('user.edit');
Route::put('user/{user}', [UserController::class , 'update'])->name('user.update');

require __DIR__.'/post.php';
require __DIR__.'/auth.php';
