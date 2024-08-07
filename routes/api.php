<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\ProfileController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');    
});

Route::prefix('posts')->middleware('auth:api')->group(function () {
    Route::get('/', [PostController::class, 'index'])->name('index');    
    Route::get('/{id}', [PostController::class, 'show'])->name('show');    
    Route::post('/', [PostController::class, 'store'])->name('store');    
    Route::put('/{id}', [PostController::class, 'update'])->name('update');   
    Route::delete('/{id}', [PostController::class, 'destroy'])->name('destroy');    
});

Route::prefix('profile')->middleware('auth:api')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('index');  
});