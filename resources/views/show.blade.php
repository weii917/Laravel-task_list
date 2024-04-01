@extends('layouts.app')
{{-- 只有一行可以這樣寫就好不用endsection --}}
@section('title', $task->title)

@section('content')
    <div class="mb-4">
        <a href="{{ route('tasks.index') }}" class="link">
            <i class="fa-solid fa-right-to-bracket"></i> Go back Home
        </a>
    </div>
    <p class="mb-4 text-slate-700">{{ $task->description }}</p>

    @if ($task->long_description)
        <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
    @endif

    <p class="mb-4 text-sm text-slate-500">
        建立 {{ $task->created_at->diffForHumans() }} ．
        更新 {{ $task->updated_at->diffForHumans() }}
    </p>


    <p class="mb-4">
        @if ($task->completed)
            <span class="font-medium text-green-500"> Completed</span>
        @else
            <span class="font-medium text-red-500">Not Completed</span>
        @endif
    </p>

    <div class="flex gap-2">
        <a href="{{ route('tasks.edit', ['task' => $task]) }}" class="btn">
            Edit
        </a>

        <form action="{{ route('tasks.toggle-complete', ['task' => $task]) }}" method="post">
            @csrf
            @method('PUT')
            <button type="submit" class="btn">
                Mark as {{ $task->completed ? 'not completed' : 'completed' }}
            </button>
        </form>

        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Delete</button>
        </form>
    </div>
@endsection
