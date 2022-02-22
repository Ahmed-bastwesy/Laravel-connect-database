<?php

use Illuminate\Support\Facades\Route;
use  App\Http\Controllers\PostController;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/', action: [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/create', action: [PostController::class, 'create'])->name('posts.create');
    Route::get('/posts/{data}/edit', action: [PostController::class, 'edit'])->name('posts.edit');
    Route::post('/posts', action: [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}', action: [PostController::class, 'show'])->name('posts.show');
    Route::patch('/posts/{post}', action: [PostController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name("posts.delete");
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
