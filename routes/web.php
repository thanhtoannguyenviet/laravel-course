<?php

use Illuminate\Support\Facades\Route;

use App\Models\Task;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/', function () {
    $tasks = Task::latest()->get();
    return view('index',['tasks' => $tasks]);
})->name('tasks.index');

Route::get('/task/{id}', function ($id) {
    $task = Task::findOrFail($id);
    return view('show',['task' => $task]);
})->name('tasks.show');

Route::fallback(function () {
    return 'Still got somewhere!';
});