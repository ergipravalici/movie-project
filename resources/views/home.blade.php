@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <!-- Hero Section -->
    <div class="bg-gray-800 rounded-lg p-8 mb-12">
        <div class="max-w-3xl mx-auto text-center">
            <h1 class="text-4xl font-bold mb-4">Watch Latest Movies</h1>
            <p class="text-gray-400 mb-6">Stream thousands of movies and TV shows.</p>
        </div>
    </div>

    <!-- Movies Grid -->
    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
        @foreach($movies as $movie)
        <div class="group relative">
            <a href="{{ route('movies.show', $movie->id) }}" class="block">
                <img src="https://m.media-amazon.com/images/M/MV5BMmU5NGJlMzAtMGNmOC00YjJjLTgyMzUtNjAyYmE4Njg5YWMyXkEyXkFqcGc@._V1_.jpg" alt="{{ $movie->title }}" class="w-full h-64 object-cover rounded-lg transform group-hover:scale-105 transition">
                <div class="mt-2">
                    <h3 class="font-semibold truncate">{{ $movie->title }}</h3>
                    <div class="flex justify-between text-sm text-gray-400">
                        <span>{{ $movie->release_year }}</span>
                        <span>{{ $movie->genre }}</span>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>
@endsection