@extends('layouts.app')

@section('title', 'The List of Tasks')

@section('content')

    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['id' => $task->id]) }}">{{ $task->title }}</a>
        </div>
    @empty
    <p>There are no Tasks!</p>
    @endforelse

@endsection
