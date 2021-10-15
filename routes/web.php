<?php

use Illuminate\Support\Facades\Route;

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
    return view('pages.home', ['title' => 'Главная']);                    //view('welcome');
});

Route::prefix('categories')->group(function () {
    Route::get('/', [\App\Http\Controllers\CategoryController::class, 'index']);

    Route::match(['get', 'post'], '/create', [\App\Http\Controllers\CategoryController::class, 'form']);
    Route::match(['get', 'post'], '/update/{id}', [\App\Http\Controllers\CategoryController::class, 'form']);

    Route::get('/delete/{id}', [\App\Http\Controllers\CategoryController::class, 'delete']);
});

Route::prefix('posts')->group(function () {
    Route::get('/', [\App\Http\Controllers\PostController::class, 'index']);

    Route::match(['get', 'post'], '/create', [\App\Http\Controllers\PostController::class, 'form']);
    Route::match(['get', 'post'], '/update/{id}', [\App\Http\Controllers\PostController::class, 'form']);

    Route::get('/delete/{id}', [\App\Http\Controllers\PostController::class, 'delete']);
});

Route::prefix('tags')->group(function ($router) {
    Route::get('/', [\App\Http\Controllers\TagController::class, 'index']);

    Route::match(['get', 'post'], '/create', [\App\Http\Controllers\TagController::class, 'form']);
    Route::match(['get', 'post'], '/update/{id}', [\App\Http\Controllers\TagController::class, 'form']);

    Route::get('/delete/{id}', [\App\Http\Controllers\TagController::class, 'delete']);
});
