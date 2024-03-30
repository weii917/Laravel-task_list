@extends('layouts.app')
@section('title', 'Add Task')

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
    <form action="{{ route('tasks.store') }}" method="post">
        @csrf
        <div>
            <label for="title">
                Title
            </label>
            <input type="text" name="title" id="title" value="{{ old('title') }}">
            @error('title')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="description">description</label>
            <textarea name="description" id="description" rows="5">{{ old('description') }}</textarea>
            @error('description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for="long_description">Long description</label>
            <textarea name="long_description" id="long_description" rows="10">{{ old('long_description') }}</textarea>
            @error('long_description')
                <p class="error-message">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <button type="submit"> Add Task</button>
        </div>
    </form>

@endsection
