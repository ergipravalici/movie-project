@extends('layouts.admin')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Movie Management</h1>
        <a href="#" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
            Add New Movie
        </a>
    </div>

    <div class="bg-gray-800 rounded-lg shadow overflow-x-auto">
        <table class="min-w-full">
            <thead class="bg-gray-700">
                <tr>
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Title</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Year</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Genre</th>
                    <th class="px-6 py-3 text-left text-sm font-medium text-white">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-700">
                @foreach($movies as $movie)
                <tr>
                    <td class="px-6 py-4 text-white">{{ $movie->title }}</td>
                    <td class="px-6 py-4 text-white">{{ $movie->release_year }}</td>
                    <td class="px-6 py-4 text-white">{{ $movie->genre }}</td>
                    <td class="px-6 py-4 text-white space-x-4">
                        <a href="#" class="text-blue-400 hover:text-blue-300">Edit</a>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-400 hover:text-red-300" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection