<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;

use App\Models\Task;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/', function () {
    $tasks = Task::latest()->get();
    return view('index',['tasks' => $tasks]);
})->name('tasks.index');

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show',['task' => $task]);
})->name('tasks.show');

Route::post('/tasks', function (TaskRequest $request) {
    // dd('We have store route');
    // dd($request->all());
    $task = Task::create($request->validated());
    return redirect()->route('tasks.show',['task' => $task->id])
        ->with('success','Task created successfully');
})->name('tasks.store');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

Route::put('/tasks/{task}', function (Task $task, TaskRequest $request) {
    // dd('We have store route');
    // dd($request->all());
    $task->updated($request->validated());
    return redirect()->route('tasks.show',['task' => $task->id])
        ->with('success','Task created successfully');
})->name('tasks.update');

Route::fallback(function () {
    return 'Still got somewhere!';
});