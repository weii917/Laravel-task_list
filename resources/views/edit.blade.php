@extends('layouts.app')
@section('title', '編輯事項')


@section('content')
    @include('form', ['task' => $task])
@endsection
