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
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
        </div>
    @empty
    <p>There are no Tasks!</p>
    @endforelse

    @if ($tasks->count())
        <nav>
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
