@extends('layouts.app')

@section('title', 'Add Task')

@section('styles')
    .alert-danger {
        color: red;
    }
@endsection
@section('content')
    <form method="POST" action="{{ route('tasks.store') }}">
        @csrf
        <div class="form-group">
            <label for="name">Title</label>
            <input type="text" class="form-control" id="title" name="title" >
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description">Task Description</label>
            <textarea class="form-control" id="description" name="description" rows="3" ></textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="long_description">Long description</label>
            <textarea class="form-control" id="long_description" name="long_description" rows="10" ></textarea>
            @error('long_description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add Task</button>
    </form>
@endsection