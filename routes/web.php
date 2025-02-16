<?php

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

Route::get('/task/{id}', function ($id) {
    $task = Task::findOrFail($id);
    return view('show',['task' => $task]);
})->name('tasks.show');
Route::post('/tasks', function (Request $request) {
    // dd('We have store route');
    dd($request->all());
    $task = new Task();
    $task->title = request('title');
    $task->save();
    return redirect()->route('tasks.index');
})->name('tasks.store');

Route::fallback(function () {
    return 'Still got somewhere!';
});