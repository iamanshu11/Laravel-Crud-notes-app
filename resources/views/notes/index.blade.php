@extends('notes.layout')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Your Notes</h1>
        <a href="{{ route('notes.create') }}"
           class="bg-gradient-to-r from-blue-500 to-indigo-600 text-white px-5 py-2 rounded shadow hover:shadow-lg transition">
            ➕ Add Note
        </a>
    </div>

    @if($notes->count())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($notes as $note)
                <div class="bg-white rounded-lg shadow p-5 hover:shadow-xl transition">
                    <h2 class="text-2xl font-semibold text-indigo-700 mb-2">{{ $note->title }}</h2>
                    <p class="text-gray-700 line-clamp-3">{{ $note->content }}</p>

                    <div class="flex justify-between items-center mt-4">
                        <a href="{{ route('notes.show', $note->id) }}"
                           class="text-sm text-blue-600 hover:underline">View</a>

                        <div class="flex space-x-3">
                            <a href="{{ route('notes.edit', $note->id) }}"
                               class="text-sm text-yellow-500 hover:underline">Edit</a>

                            <form action="{{ route('notes.destroy', $note->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-sm text-red-500 hover:underline">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="bg-yellow-100 text-yellow-800 px-4 py-3 rounded shadow text-center">
            You don't have any notes yet. Click <strong>"Add Note"</strong> to get started!
        </div>
    @endif
@endsection
