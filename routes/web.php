<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// permission routes
Route::middleware(['auth'])->group(function () {

    Route::get('/permissions', [App\Http\Controllers\PermissionController::class, 'index'])->name('permissions.index');
    Route::get('/permissions/create', [App\Http\Controllers\PermissionController::class, 'create'])->name('permissions.create');
    Route::post('/permissions', [App\Http\Controllers\PermissionController::class,'store'])->name('permissions.store');
    Route::get('/permissions/{permission}/edit', [App\Http\Controllers\PermissionController::class, 'edit'])->name('permissions.edit');
    Route::post('/permissions/{permission}', [App\Http\Controllers\PermissionController::class, 'update'])->name('permissions.update');
    Route::get('/permissions/{permission}', [App\Http\Controllers\PermissionController::class, 'destroy'])->name('permissions.destroy');





     // article route
     Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('articles.index');
     Route::get('/articles/create', [App\Http\Controllers\ArticleController::class, 'create'])->name('articles.create');
     Route::post('/articles', [App\Http\Controllers\ArticleController::class,'store'])->name('articles.store');
     Route::get('/articles/{article}/edit', [App\Http\Controllers\ArticleController::class, 'edit'])->name('articles.edit');
     Route::post('/articles/{article}', [App\Http\Controllers\ArticleController::class, 'update'])->name('articles.update');
     Route::get('/articles/{article}', [App\Http\Controllers\ArticleController::class, 'destroy'])->name('articles.destroy');



    //  user routes for
     Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
     Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
     Route::post('/users/update/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');


});
