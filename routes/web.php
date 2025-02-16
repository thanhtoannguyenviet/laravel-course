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

Route::get('/tasks/{id}', function ($id) {
    $task = Task::findOrFail($id);
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
    return redirect()->route('tasks.show',['id' => $task->id]);
})->name('tasks.store');

Route::fallback(function () {
    return 'Still got somewhere!';
});