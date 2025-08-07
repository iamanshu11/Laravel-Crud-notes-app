@extends('notes.layout')

@section('content')
    <div class="bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-bold">{{ $note->title }}</h2>
        <p class="mt-2 text-gray-700">{{ $note->content }}</p>

        <div class="mt-4 flex justify-between">
            <a href="{{ route('notes.index') }}" class="text-blue-500 hover:underline">← Back to all notes</a>
            <a href="{{ route('notes.edit', $note->id) }}" class="text-yellow-600 hover:underline">Edit</a>
        </div>
    </div>
@endsection
