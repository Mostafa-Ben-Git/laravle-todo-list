@extends('layouts.app')

@section('content')
    <h1>Edit task {{ $task->id }}</h1>

    <form action="{{ route('tasks.update', ['task' => $task->id]) }}" method="post">
        @csrf
        @method('PUT')
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ $task->title ?? old('title') }}">
            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description">description:</label>
            <input type="text" name="description" value="{{ $task->description ?? old('description') }}" id="description">
            @error('description')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit">Update Task</button>
        </div>
    </form>
@stop
