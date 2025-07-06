<?php

declare(strict_types= 1);

use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;
use App\Models\Task as TaskModel;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function ()  {
    return view('index',
        [
            'tasks' => TaskModel::latest()->paginate(10),
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

    $task = TaskModel::create($request->validated());

    return redirect()->route('tasks.show',
        [
            'task' => $task,
        ]
    )->with('success', 'Task created successfully!');
})->name('tasks.store');

Route::put('/tasks/{task}', function (TaskModel $task, TaskRequest $request) {

    $task->update($request->validated());

    return redirect()->route('tasks.show',
        [
            'task' => $task,
        ]
    )->with('success', 'Task updated successfully!');
})->name('tasks.update');

Route::delete('tasks/{task}', function (TaskModel $task) {
    $task->delete();

    return redirect()->route('tasks.index')
        ->with('success','Task deleted successfully!');
})->name('tasks.destroy');

Route::put('/tasks/{task}/toggle-completed', function (TaskModel $task) {
    $task->toggleCompleted();

    return redirect()->back()->with('success', 'Task updated successfully!');
})->name('tasks.toggle-completed');
