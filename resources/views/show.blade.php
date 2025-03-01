@extends('layouts.app')

@section('title', $task->title)

@section('content')
<p>{{$task->description}}</p>

@if ($task->long_description)
  <p>{{$task->long_description}}</p>
@endif
<div>
  <form action="{{ route('tasks.destroy', ['task'=> $task->id]) }}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
  </form>
</div>
@endsection