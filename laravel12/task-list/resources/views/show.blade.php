@extends('layouts.app')

@section('styles')
    <style>
        .success-message {
            color: green;
        }
    </style>
@endsection

@section('title', $task->title)

@section('content')

    <p>{{ $task->description }}</p>

    @if ($task->long_description)
        <p> {{ $task->long_description }}
    @endif

    <p>{{ $task->created_at }}</p>
    <p>{{ $task->updated_at }}</p>

    <div>
        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </div>
@endsection
