<?php
use App\Http\Controllers\Auth\{LoginController, RegisterController, LogoutController};
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/movies/{movie}', [HomeController::class, 'show'])->name('movies.show');

// Auth routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');
    
    // Admin routes
    Route::middleware('admin')->group(function () {
        Route::resource('movies', MovieController::class)->except(['show']);
    });
});