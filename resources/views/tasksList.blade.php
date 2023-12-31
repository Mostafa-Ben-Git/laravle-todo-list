<h1>The List of Tasks</h1>
<h>
    @if (session()->has('success'))
        <p>{{ session('success') }}</p>
    @endif
</h>
@forelse ($tasks as $task)
    <li>
        <a href="{{ route('tasks.show', ['task' => $task->id]) }}">{{ $task->title }}</a>
        {{-- <a href="{{ route('tasks.destroy', ['task' => $task->id]) }}">Delete</a> --}}
        <form action="{{ route('tasks.destroy', ['task' => $task->id]) }}"
            onsubmit="return confirm('Do you want to delete task : {{ $task->title }}')" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>

    </li>
@empty
    <div>There is no Tasks!</div>
@endforelse
@if ($tasks->count())
    {{ $tasks->links() }}
@endif
