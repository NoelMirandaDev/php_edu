<?php

use App\Http\Controllers\Api\AttendeeController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Event;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth:sanctum');

// Public routes for events
Route::apiResource('events', EventController::class)
    ->only(['index', 'show']);

// Protected routes for events
Route::apiResource('events', EventController::class)
    ->middleware('auth:sanctum')
    ->only(['store', 'update', 'destroy']);

// Public routes for attendees
Route::apiResource('events.attendees', AttendeeController::class)
    ->scoped()
    ->only(['index', 'show']);

// Protected routes for attendees
Route::apiResource('events.attendees', AttendeeController::class)
    ->scoped()
    ->middleware('auth:sanctum')
    ->only(['store', 'destroy']);
