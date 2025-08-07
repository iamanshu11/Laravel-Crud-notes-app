@extends('notes.layout')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Edit Note</h2>

    <form action="{{ route('notes.update', $note->id) }}" method="POST" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold mb-2">Title</label>
            <input type="text" name="title" class="w-full border border-gray-300 rounded px-3 py-2" value="{{ old('title', $note->title) }}">
            @error('title')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Content</label>
            <textarea name="content" rows="5" class="w-full border border-gray-300 rounded px-3 py-2">{{ old('content', $note->content) }}</textarea>
            @error('content')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex justify-between">
            <a href="{{ route('notes.index') }}" class="text-gray-600 hover:underline">← Back</a>
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Update Note</button>
        </div>
    </form>
@endsection
