<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\ProfileController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::prefix('auth')->group(function () {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');    
});

Route::prefix('users')->middleware('auth:api')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');   
    Route::get('/{id}', [UserController::class, 'show'])->name('show');    
    Route::post('/', [UserController::class, 'store'])->name('store');    
    Route::put('/{id}', [UserController::class, 'update'])->name('update');   
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
});

Route::prefix('profile')->middleware('auth:api')->group(function () {
    Route::get('/', [ProfileController::class, 'index'])->name('index');  
});