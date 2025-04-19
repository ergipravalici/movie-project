<?php
namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('admin.movies.index', compact('movies'));
    }

    public function create()
    {
        return view('admin.movies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'release_year' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        Movie::create($request->all());

        return redirect()->route('movies.index')->with('success', 'Movie created successfully');
    }

    public function edit(Movie $movie)
    {
        return view('admin.movies.edit', compact('movie'));
    }

    public function update(Request $request, Movie $movie)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'release_year' => 'required|integer|min:1900|max:' . date('Y'),
        ]);

        $movie->update($request->all());

        return redirect()->route('movies.index')->with('success', 'Movie updated successfully');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
        return redirect()->route('movies.index')->with('success', 'Movie deleted successfully');
    }
}