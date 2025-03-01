<?php

use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Route;

use App\Models\Task;
use Illuminate\Http\Request;

Route::get('/', function () {
    return redirect()->route('tasks.index');
});

Route::get('/', function () {
    $tasks = Task::latest()->paginate();
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
    $task->update($request->validated());
    return redirect()->route('tasks.show',['task' => $task->id])
        ->with('success','Task created successfully');
})->name('tasks.update');

Route::fallback(function () {
    return 'Still got somewhere!';
});

Route::delete('/tasks/{task}', function (Task $task) {
    $task->delete();
    return redirect()->route('tasks.index')
        ->with('success','Task deleted successfully');
})->name('tasks.destroy');

Route::put('/tasks/{task}/toggle', function (Task $task) {
    // $task->toggleComplete(); -> Sau khi đóng gói ở model, có thể dùng dể thay thế code phía dưới
    $task->completed = !$task->completed;
    $task->save();
    return redirect()->back()
        ->with('success','Task updated successfully');
})->name('tasks.toggle-complete');