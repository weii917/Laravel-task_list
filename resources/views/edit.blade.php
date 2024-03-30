@extends('layouts.app')
@section('title', 'Edit Task')

@section('styles')
    <style>
        .error-message {
            color: red;
            font-size: 0.7rem;
        }
    </style>
@endsection

@section('content')
    {{-- $errors 變數是一個集合，它包含了所有驗證失敗的字段及其對應的錯誤消息 --}}
    {{-- {{ $errors }} --}}
    <form action="{{ route('tasks.update', ['id' => $task->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label for="title">
                Title
            </label>
            <input type="text" name="title" id="title" value="{{ $task->title }}">
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">description</label>
            <textarea name="description" id="description" rows="5">{{ $task->description }}</textarea>
            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="long_description">Long description</label>
            <textarea name="long_description" id="long_description" rows="10">{{ $task->long_description }}</textarea>
            @error('long_description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit"> Edit Task</button>
        </div>
    </form>

@endsection
