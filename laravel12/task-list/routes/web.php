<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', [
        'name' => 'Noel',
    ]);
})->name('home');

Route::get('/xxx', function () {
    return 'Hello World';
}) -> name('hello');

Route::get('/hallo', function () {
    return redirect()->route('hello');
});

Route::get('/greet/{name}', fn($name) =>
    "Hello {$name}!"
)->name('greeting');

Route::get('/not-found', function () {
    return 'Sorry, this page does not exist';
})->name('404');

Route::fallback(fn() => redirect()->route('404'));
