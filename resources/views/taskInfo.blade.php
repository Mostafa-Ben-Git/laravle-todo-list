@extends('layouts.app')
<div>
    @section('content')
        <h1>Task {{ $task->id }} => {{ $task->title }}</h1>
        @if (session()->has('success'))
            <span>{{ session('success') }}</span>
        @endisset
        <p>Description : {{ $task->description }}</p>
        <p>date Created : {{ $task->created_at }}</p>
        <p>date updated : {{ $task->updated_at }}</p>
        <div>
            <button>Mark as Done</button>
            <button>Edit Task</button>
        </div>
    @stop
</div>
