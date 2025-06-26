<?php

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use App\Models\Task as TaskModel;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function ()  {
    return view('index',
        [
            'tasks' => TaskModel::latest()->get(),
        ]
    );
})->name('tasks.index');

Route::view('/tasks/create', 'create')
->name('tasks.create');

Route::get('/tasks/{id}/edit', function ($id) {
    return view('edit',
        [
            'task' => TaskModel::findOrFail($id),
        ]
    );
})->name('tasks.edit');

Route::get('/tasks/{id}', function ($id) {
    return view('show',
        [
            'task' => TaskModel::findOrFail($id),
        ]
    );
})->name('tasks.show');

Route::post('/tasks', function (Request $request) {
    $data = $request->validate(
        [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'long_description' => 'required|string',
        ]
    );

    $task = new TaskModel;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();

    return redirect()->route('tasks.show',
        [
            'id' => $task->id,
        ]
    )->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::put('/tasks/{id}', function ($id, Request $request) {
    $data = $request->validate(
        [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'long_description' => 'required|string',
        ]
    );

    $task = TaskModel::findOrFail($id);
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];

    $task->save();

    return redirect()->route('tasks.show',
        [
            'id' => $task->id,
        ]
    )->with('success', 'Task updated successfully!');
})->name('tasks.update');

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
