@extends('layouts.app')

@section('title', 'The list of tasks:')

@section('content')
<div>
  <a href="{{ route('tasks.create') }}">Create a new task</a>
</div>
<br/>
@if (count($tasks))
  @forelse ($tasks as $task)
    <div>
      <a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
    </div>
  @empty
    <div>There are no tasks!</div>
  @endforelse
  @if ($tasks->count())
    <nav>
      {{ $tasks->links() }}
    </nav>
  @endif
@endif
@endsection