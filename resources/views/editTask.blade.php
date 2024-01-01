@extends('layouts.app')

@section('content')
    <h1> 🔁 Edit task {{ $task->id }}</h1>

    <form action="{{ route('tasks.update', ['task' => $task]) }}" method="post" class="bg-secondary p-5 rounded">
        @csrf
        @method('PUT')
        <div class="my-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $task->title }}">
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="my-3">
            <label for="description" class="form-label">description:</label>
            <textarea type="text" class="form-control" name="description" id="description">{{ $task->description }}</textarea>
            @error('description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-warning">Update Task</button>
        </div>
    </form>
@stop
