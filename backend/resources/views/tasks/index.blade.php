@extends('layouts.app')

@section('title', 'tasks')

@section('content')
    @foreach ($tasks as $task)
        <vue-task-component />
    @endforeach
@endsection
