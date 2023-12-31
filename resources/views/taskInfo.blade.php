@extends('layouts.app')

@section('content')
    <h1>Task {{ $task->id }} => {{ $task->title }}</h1>
    <h2>{{ $task->completed ? 'Task Completed ✅ !' : 'Task Uncompleted ⏳ !' }}</h2>
    @if (session()->has('success'))
        <span>{{ session('success') }}</span>
    @endisset
    <p>Description : {{ $task->description }}</p>
    <p>date Created : {{ $task->created_at }}</p>
    <p>date updated : {{ $task->updated_at }}</p>
    <div>
        <form action="{{ route('tasks.toggle-completed', ['task' => $task]) }}" method="POST">
            @csrf
            @method('PUT')
            <button type="submit">Mark as {{ $task->completed ? 'Uncompleted' : 'Completed' }}</button>
        </form>
        <button>Edit Task</button>
    </div>
@stop
