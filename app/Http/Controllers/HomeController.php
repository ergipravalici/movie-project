<?php
namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('home', compact('movies'));
    }

    public function show($movieId)
    {
        $movie = Movie::find($movieId);
        return view('movies.show', compact('movie'));
    }
}