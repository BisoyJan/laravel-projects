@extends('layouts.app')

@section('title', $task->title)

@section('content')

    <div class="mb-4">
        <a href="{{ route('tasks.index') }}"
            class="link">&larr; Go Back to the task list</a>
    </div>

    <p class="mb-4 text-slate-700">{{ $task->description }}</p>

    @if ($task->long_description)
        <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
    @endif

    <p class="mb-4 text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }} &#x2022; Updated {{ $task->updated_at->diffForHumans() }}</p>

    <p class="mb-4">
        @if ($task->completed)
            <span class="font-medium text-green-500">Completed</span>
        @else
            <span class="font-medium text-red-500">Incomplete</span>
        @endif
    </p>

    <div class="flex gap-2">
        {{-- you can also do this way that specifies the id but laravel is smart enough the it only needs the ID
        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">Edit</a> --}}
        <a href="{{ route('tasks.edit', ['task' => $task]) }}"
            class="btn">Edit</a>

        <form method="POST" action=" {{ route('tasks.toggle-complete', ['task' => $task]) }}">
            @csrf
            @method('PUT')
            <button type="submit" class="btn">
                Mark as {{ $task->completed ? 'incomplete' : 'complete' }}
            </button>
        </form>

        <form action="{{ route('tasks.destroy', ['task' => $task]) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn">Delete</button>
        </form>
    </div>
@endsection
