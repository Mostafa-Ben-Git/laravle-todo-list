@extends('layouts.app')

@section('content')
    <h1>➕ Add New Task</h1>

    <form action="{{ route('tasks.store') }}" method="post" class="bg-secondary p-5 rounded">
        @csrf
        <div class="m-3">
            <label for="title" class="form-label">Title:</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="m-3">
            <label for="description" class="form-label">description:</label>
            <textarea type="text" class="form-control" rows="4" name="description" id="description">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit" class="btn btn-primary mx-3">Add Task</button>
        </div>
    </form>

@stop
