@extends('layouts.app')

@section('title', isset($task) ? 'Edit Task' : 'Create Task')

@section('content')
  <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" method="POST">
    @csrf
    @if (isset($task))
      @method('PUT')
    @endif
    <div class="mb-4">
      <label for="title">Title</label>
      <input 
        @class(['border-red-500' => $errors->has('title')])
        type="text" name="title" id="title" value="{{ old('title', $task->title ?? '') }}">
        @error('title')
          <p class="error">{{ $message }}</p>
        @enderror
      </div>
    <div class="mb-4">
      <label for="description">Description</label>
      <textarea 
        @class(['border-red-500' => $errors->has('description')])
        name="description" id="description">{{ old('description', $task->description ?? '') }}</textarea>
        @error('description')
          <p class="error">{{ $message }}</p>
        @enderror
      </div>
    <div class="mb-4">
      <label 
        @class(['border-red-500' => $errors->has('long_description')])
        for="long_description">Long Description</label>
      <textarea name="long_description" id="long_description">{{ old('long_description', $task->long_description ?? '') }}</textarea>
        @error('long_description')
          <p class="error">{{ $message }}</p>
        @enderror
    </div>
    <div class="flex items-center gap-2">
      <button type="submit">{{ isset($task) ? 'Update' : 'Create' }}</button>
    </div>
    <a href="{{ route('tasks.index') }}" class="link">Cancel</a>
  </form>
@endsection