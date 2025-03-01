@extends('layouts.app')

@section('title', 'Add Task')

@section('styles')
    .alert-danger {
        color: red;
    }
@endsection
@section('content')
    @include('components.form')
@endsection