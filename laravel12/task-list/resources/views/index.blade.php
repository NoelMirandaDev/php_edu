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

    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}" class="link">Add task!</a>
    </nav>

    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['task' => $task]) }}"
                @class(['line-through' => $task->completed])>{{ $task->title }}</a>
        </div>
    @empty
    <p>There are no Tasks!</p>
    @endforelse

    @if ($tasks->count())
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
