<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/blogs', [BlogController::class,'index'])->name('blog.index');
Route::get('/blogs/{id}', [BlogController::class,'singleBlog'])->name('blog.singleBlog');



Route::middleware(['auth','verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Blog Routes
    Route::get('/dashboard', [BlogController::class,'userIndex'])->name('dashboard');
    Route::match(['get', 'post'],'/dashboard/blog/create', [BlogController::class,'create'])->name('user.blog.create');
    Route::get('blog/status/{id}',[BlogController::class,'updateStatus'])->name('user.blog.updateStatus');
    Route::match(['get', 'post'],'blog/show/{id}',[BlogController::class,'show'])->name('user.blog.show');
    Route::get('blog/delete/{id}',[BlogController::class,'destroy'])->name('user.blog.destroy');
    
    // Comments Route
    Route::post('/comment/create', [CommentController::class,'create'])->name('comment.create');
});

require __DIR__.'/auth.php';
