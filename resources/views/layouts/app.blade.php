<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOVIE HUB @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-gray-100">
    <!-- Navigation -->
    <nav class="bg-gray-800 shadow-xl">
        <div class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-2xl font-bold text-red-600">MOVIE HUB</a>
            <div class="flex items-center space-x-6">
                @auth
                    <p class='italic text-orange-200'>Welcome {{auth()->user()->name}}</p>
                    <span>|</span>
                    @if(auth()->user()->isAdmin())
                        <a href="{{ route('movies.index') }}" class="hover:text-red-500 transition">Dashboard</a>
                        <span>|</span>
                    @endif
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="hover:text-red-500 transition">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:text-red-500 transition">Login</a>
                    <a href="{{ route('register') }}" class="hover:text-red-500 transition">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 mt-12 py-8">
        <div class="container mx-auto px-6 text-center">
            <div class="flex justify-center space-x-6 mb-4">
                <a href="#" class="hover:text-red-500">About</a>
                <a href="#" class="hover:text-red-500">Privacy Policy</a>
                <a href="#" class="hover:text-red-500">Terms of Service</a>
            </div>
            <p class="text-gray-400">&copy; 2024 MOVIE HUB. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>