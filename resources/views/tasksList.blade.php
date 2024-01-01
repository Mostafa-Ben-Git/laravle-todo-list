@extends('layouts.app')

@section('content')
    <span class="d-flex align-items-center justify-content-between">
        <h1>The List of Tasks</h1>
        <a class="btn btn-primary" href="{{ route('tasks.add') }}">Add Task</a>
    </span>
    @if (session()->has('success'))
        <p class="alert alert-success" role="alert">{{ session('success') }}</p>
    @endif
    <ul
        class="w-100 d-flex flex-column align-items-center justify-content-center list-unstyled list-group-item-info p-3 rounded rounded-5">

        @forelse ($tasks as $task)
            <li class="bg-warning d-flex w-75 justify-content-between align-items-center m-2 rounded rounded-4">
                <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                    class="w-75 text-decoration-none text-dark p-3 {{ $task->completed ? 'text-decoration-line-through' : '' }}">{{ $task->id . ' . ' . $task->title }}</a>
                <span class="d-flex">{{ $task->completed ? 'Done ✅' : 'Not yet ⛔' }}</span>
                {{-- <a href="{{ route('tasks.destroy', ['task' => $task->id]) }}">Delete</a> --}}
                <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}" class="mx-2"
                    onsubmit="return confirm('Do you want to delete task : {{ $task->title }}')" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger ">Delete</button>
                </form>

            </li>
        @empty
            <div>There is no Tasks!</div>
        @endforelse
    </ul>
    @if ($tasks->count())
        {{ $tasks->links() }}
    @endif
@stop
