@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Create Task')

@section('content')
  <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" method="POST">
    @csrf
    @if (isset($task))
      @method('PUT')
    @endif
    <div>
      <label for="title">Title</label>
      <input type="text" name="title" id="title" value="{{ old('title', $task->title ?? '') }}">
    </div>
    <div>
      <label for="description">Description</label>
      <textarea name="description" id="description">{{ old('description', $task->description ?? '') }}</textarea>
    </div>
    <div>
      <label for="long_description">Long Description</label>
      <textarea name="long_description" id="long_description">{{ old('long_description', $task->long_description ?? '') }}</textarea>
    </div>
    <button type="submit">{{ isset($task) ? 'Update' : 'Create' }}</button>
  </form>
@endsection