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
@endsection
