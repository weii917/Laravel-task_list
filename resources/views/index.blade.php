@extends('layouts.app')
@section('title', 'The List of my tasks')

@section('content')
    <div>
        <a href="{{ route('tasks.create') }}">Add Task</a>
    </div>
    {{-- @if (count($tasks)) --}}
    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
        </div>
    @empty
        <div>There are no tasks!</div>
    @endforelse

    {{-- @endif --}}
    @if ($tasks->count())
        <nav>
            {{ $tasks->links() }}
        </nav>
    @endif
@endsection
