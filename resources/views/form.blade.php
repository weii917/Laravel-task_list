@extends('layouts.app')
@section('title', isset($task) ? '編輯事項' : '新增事項')



@section('content')
    {{-- $errors 變數是一個集合，它包含了所有驗證失敗的字段及其對應的錯誤消息 --}}

    <form action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}" method="post">
        @csrf
        @isset($task)
            @method('PUT')
        @endisset
        <div class="mb-4">
            <label for="title">
                標題
            </label>
            <input type="text" name="title" id="title" @class(['border-red-500' => $errors->has('title')])
                value="{{ $task->title ?? old('title') }}">
            @error('title')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="description">描述</label>
            <textarea name="description" id="description" @class(['border-red-500' => $errors->has('description')]) rows="5">{{ $task->description ?? old('description') }}</textarea>
            @error('description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="long_description">備註</label>
            <textarea name="long_description" id="long_description" @class(['border-red-500' => $errors->has('long_description')]) rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
            @error('long_description')
                <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-2 items-center">
            <button type="submit" class="add-btn">
                @isset($task)
                    Update Task
                @else
                    Add Task
                @endisset
            </button>
            <a href="{{ route('tasks.index') }}" class="cancel-link">Cancel</a>
        </div>
    </form>

@endsection
