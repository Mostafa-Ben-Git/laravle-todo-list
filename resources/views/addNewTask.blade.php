@extends('layouts.app')

@section('content')

    <form action="{{ route('tasks.store') }}" method="post">
        @csrf
        <div>
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}">
            @error('title')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <label for="description">description:</label>
            <input type="text" name="description" value="{{ old('description') }}" id="description">
            @error('description')
                <p>{{ $message }}</p>
            @enderror
        </div>
        <div>
            <button type="submit">Add Task</button>
        </div>
    </form>
@stop
