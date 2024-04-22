<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/users', [UserController::class, 'index'])
    ->name('users.index');
Route::post('/users', [UserController::class, 'store'])
    ->name('users.store');
Route::delete('/users/{user}', [UserController::class, 'destroy'])
    ->name('users.destroy');
