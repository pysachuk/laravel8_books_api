<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Authorization
Route::post('/register', [\App\Http\Controllers\Api\Auth\AuthController::class, 'register'])
->name('api.register');
Route::post('/login', [\App\Http\Controllers\Api\Auth\AuthController::class, 'login'])
->name('api.login');

//Not auth routes
Route::get('/authors', [\App\Http\Controllers\Api\AuthorController::class, 'authors'])
->name('api.authors');
Route::get('/books', [\App\Http\Controllers\Api\BookController::class, 'index'])
    ->name('api.books');
Route::get('/books/author/{author_id}', [\App\Http\Controllers\Api\AuthorController::class, 'authorBooks'])
    ->name('api.author_books');

//Auth routes
Route::middleware('auth:sanctum') -> group(function(){
    Route::post('/logout', [\App\Http\Controllers\Api\Auth\AuthController::class, 'logout'])
    ->name('api.logout');
    Route::get('/books/my', [\App\Http\Controllers\Api\BookController::class, 'userBooks'])
        ->name('api.my_books');
    Route::post('/books/create', [\App\Http\Controllers\Api\BookController::class, 'store'])
        ->name('api.create_book');
    Route::patch('/books/update/{book}', [\App\Http\Controllers\Api\BookController::class, 'update'])
        ->name('api.update_book');
    Route::delete('/books/delete/{book}', [\App\Http\Controllers\Api\BookController::class, 'destroy'])
        ->name('api.delete_book');
});

