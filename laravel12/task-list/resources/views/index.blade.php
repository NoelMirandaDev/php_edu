@extends('layouts.app')

@section('styles')
    <style>
        .success-message {
            color: green;
        }
    </style>
@endsection

@section('title', 'The List of Tasks')

@section('content')

    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['task' => $task]) }}">{{ $task->title }}</a>
        </div>
    @empty
    <p>There are no Tasks!</p>
    @endforelse

    <div>
        <a href="{{ route('tasks.create') }}">Create a new task</a>
    </div>

    @if($tasks->count())
        <nav>
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
