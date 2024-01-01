@extends('layouts.app')

@section('content')
    <h1 class='text-center'>Task {{ $task->id }} <br> ⬇️ <br> {{ $task->title }}</h1>
    <h2 class='text-center'>{{ $task->completed ? 'Task Completed ✅ !' : 'Task Uncompleted ⏳ !' }}</h2>
    <div class="p-4 bg-info w-75 mx-auto rounded">
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endisset

        <p class="p-3 border border-secondary">Description : {{ $task->description }}</p>
        <p class="p-3 border border-secondary">date Created : {{ $task->created_at }}</p>
        <p class="p-3 border border-secondary">date updated : {{ $task->updated_at }}</p>
        <div class="d-flex justify-content-around my-4">
            <form action="{{ route('tasks.toggle-completed', ['task' => $task]) }}" method="POST">
                @csrf
                @method('PUT')
                <button type="submit" class="btn {{ $task->completed ? 'btn-warning' : 'btn-success' }}">Mark as
                    {{ $task->completed ? 'Uncompleted' : 'Completed' }}</button>
            </form>
            <a class="btn btn-secondary" href="{{ route('tasks.edit', ['task' => $task]) }}">Edit Task</a>
        </div>
</div>
@stop
