<?php

use App\Http\Requests\TaskRequest;
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

Route::get('/tasks/{task}/edit', function (TaskModel $task) {
    return view('edit',
        [
            'task' => $task,
        ]
    );
})->name('tasks.edit');

Route::get('/tasks/{task}', function (TaskModel $task) {
    return view('show',
        [
            'task' => $task,
        ]
    );
})->name('tasks.show');

Route::post('/tasks', function (TaskRequest $request) {
    // $data = $request->validated();

    // $task = new TaskModel;
    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];

    // $task->save();

    $task = TaskModel::create($request->validated());

    return redirect()->route('tasks.show',
        [
            'task' => $task->id,
        ]
    )->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::put('/tasks/{task}', function (TaskModel $task, TaskRequest $request) {
    // $data = $request->validated();

    // $task->title = $data['title'];
    // $task->description = $data['description'];
    // $task->long_description = $data['long_description'];

    // $task->save();

    $task->update($request->validated());

    return redirect()->route('tasks.show',
        [
            'task' => $task->id,
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
