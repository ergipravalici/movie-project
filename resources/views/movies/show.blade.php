@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-8">
    <!-- Movie Hero -->
    <div class="bg-gray-800 rounded-lg p-8 mb-8">
        <div class="flex flex-col md:flex-row gap-8">
            <img src="https://m.media-amazon.com/images/M/MV5BMmU5NGJlMzAtMGNmOC00YjJjLTgyMzUtNjAyYmE4Njg5YWMyXkEyXkFqcGc@._V1_.jpg00x450" alt="{{ $movie->title }}" class="w-64 h-96 object-cover rounded-lg">
            <div class="flex-1">
                <h1 class="text-4xl font-bold mb-4">{{ $movie->title }}</h1>
                <div class="flex items-center space-x-4 mb-4">
                    <span class="text-red-500">{{ $movie->release_year }}</span>
                    <span class="text-gray-400">{{ $movie->genre }}</span>
                    <div class="flex items-center">
                        <span class="text-yellow-400">★</span>
                        <span class="ml-1">{{ $movie->averageRating() }}/5</span>
                    </div>
                </div>
                <p class="text-gray-300 leading-relaxed">{{ $movie->description }}</p>
            </div>
        </div>
    </div>

    <!-- Rating Form -->
    <div class="bg-gray-800 rounded-lg p-6 mb-8">
        <h2 class="text-xl font-bold mb-4">Rate this movie</h2>
        <form action="" method="POST">
            @csrf
            <div class="flex items-center space-x-2">
                @for($i = 1; $i <= 5; $i++)
                <input type="radio" name="rating" id="star{{ $i }}" value="{{ $i }}" class="hidden">
                <label for="star{{ $i }}" class="text-2xl cursor-pointer text-gray-400 hover:text-yellow-400">★</label>
                @endfor
            </div>
            <button type="submit" class="mt-4 bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                Submit Rating
            </button>
        </form>
    </div>

    <!-- Reviews Section -->
    <div class="bg-gray-800 rounded-lg p-6">
        <h2 class="text-xl font-bold mb-4">Reviews</h2>
        
        <form action="" method="POST" class="mb-8">
            @csrf
            <textarea name="comment" rows="3" class="w-full bg-gray-700 rounded p-3 text-white mb-3" placeholder="Write your review..."></textarea>
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                Post Review
            </button>
        </form>

        @foreach($movie->reviews->where('status', 'approved') as $review)
        <div class="bg-gray-700 rounded p-4 mb-4">
            <div class="flex items-center justify-between mb-2">
                <span class="font-semibold">{{ $review->user->name }}</span>
                <span class="text-gray-400 text-sm">{{ $review->created_at->diffForHumans() }}</span>
            </div>
            <p class="text-gray-300">{{ $review->comment }}</p>
        </div>
        @endforeach
    </div>
</div>
@endsection