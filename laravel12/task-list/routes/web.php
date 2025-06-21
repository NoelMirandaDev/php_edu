<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Models\Task as TaskModel;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function ()  {
    return view('index', [
        'tasks' => TaskModel::latest()->where('completed', true)->get(),
    ]);
})->name('tasks.index');

Route::get('/tasks/{id}', function ($id) {
    return view('show',[
            'task' => TaskModel::findOrFail($id),
          ]
);
})->name('tasks.show');

// Route::get('/xxx', function () {
//     return 'Hello World';
// }) -> name('hello');

// Route::get('/hallo', function () {
//     return redirect()->route('hello');
// });

// Route::get('/greet/{name}', fn($name) =>
//     "Hello {$name}!"
// )->name('greeting');

// Route::get('/not-found', function () {
//     return 'Sorry, this page does not exist';
// })->name('404');

// Route::fallback(fn() => redirect()->route('404'));
