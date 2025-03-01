@extends('layouts.app')

@section('title', 'Edit Task')

@section('styles')
    .alert-danger {
        color: red;
    }
@endsection
@section('content')
    @include('components.form', ['task' => $task])
@endsection