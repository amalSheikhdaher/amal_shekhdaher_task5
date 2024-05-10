<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Public routes of authtication
Route::controller(LoginRegisterController::class)->group(function() {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});

// Public routes of book
Route::controller(BookController::class)->group(function() {
    Route::get('/books', 'index');
    Route::get('/books/{id}', 'show');
    Route::get('/books/search/{name}', 'search');
});

// Protected routes of book and logout
Route::middleware('auth:sanctum')->group( function () {
    Route::post('/logout', [LoginRegisterController::class, 'logout']);

    Route::controller(BookController::class)->group(function() {
        Route::post('/books', 'store');
        Route::post('/books/{id}', 'update');
        Route::delete('/books/{id}', 'destroy');
    });
});