@extends('layouts.app')

@section('title', 'tasks')

@section('content')
    @foreach ($tasks as $task)
        <p>
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}">
                {{ $task->name }}
            </a>
        </p>
    @endforeach
@endsection
