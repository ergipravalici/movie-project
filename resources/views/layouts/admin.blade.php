<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <nav class="bg-gray-800 text-white shadow-lg">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center">
            <a href="{{ route('movies.index') }}" class="text-xl font-bold">MovieHub Admin</a>
            <div class="flex items-center space-x-4">
                <a href="{{ route('home') }}" class="hover:text-gray-300">View Site</a>
    
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="hover:text-gray-300">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-gray-700 text-white min-h-screen">
            <div class="p-4">
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('movies.index') }}" class="block px-4 py-2 hover:bg-gray-600 rounded">Movies</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-600 rounded">Reviews</a>
                    </li>
                    <li>
                        <a href="#" class="block px-4 py-2 hover:bg-gray-600 rounded">Users</a>
                    </li>
                </ul>
            </div>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-8">
            @yield('content')
        </main>
    </div>
</body>
</html>