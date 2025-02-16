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

Route::view('/tasks/create', 'create')->name('tasks.create');

Route::get('/tasks/{task}', function (Task $task) {
    return view('show',['task' => $task]);
})->name('tasks.show');

Route::post('/tasks', function (Request $request) {
    // dd('We have store route');
    // dd($request->all());
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',
    ]);
    $task = new Task();
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();
    return redirect()->route('tasks.show',['id' => $task->id])
        ->with('success','Task created successfully');
})->name('tasks.store');

Route::get('/tasks/{task}/edit', function (Task $task) {
    return view('edit', [
        'task' => $task
    ]);
})->name('tasks.edit');

Route::put('/tasks/{id}', function ($id, Request $request) {
    // dd('We have store route');
    // dd($request->all());
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',
    ]);
    $task = Task::findOrFail($request->id);
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();
    return redirect()->route('tasks.show',['id' => $task->id])
        ->with('success','Task created successfully');
})->name('tasks.update');

Route::fallback(function () {
    return 'Still got somewhere!';
});