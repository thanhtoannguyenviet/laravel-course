@extends('layouts.app')

@section('title', 'Add Task')
@section('content')
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Title</label>
            <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="description">Task Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="long_description">Long description</label>
            <textarea class="form-control" id="long_description" name="long_description" rows="10" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Add Task</button>
    </form>
@endsection