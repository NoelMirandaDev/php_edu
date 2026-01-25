<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

Route::get('/', fn() => to_route('jobs.index'));
Route::get('login', fn() => to_route('auth.create'))
    ->name('login');

Route::resource('jobs', JobController::class)
    ->only(['index', 'show']);

Route::resource('auth', AuthController::class)
    ->only(['create', 'store']);
