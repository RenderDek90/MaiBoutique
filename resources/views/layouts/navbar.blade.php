<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    {{-- Styles --}}
    <link rel="stylesheet" href="app.css">

    {{-- Tailwind --}}
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="overflow-none">
    {{-- @include('loading-screen/loadingHome') --}}
    <nav class="shadow-md">
        <ul class="flex items-center justify-between px-14 py-4">
            @auth
                <div class="flex items-center justify-between flex-row gap-3">
                    <li>
                        <div class="text-gray-900 text-xl underline">MaiBoutique</div>
                    </li>
                    <div class="opacity-50 flex items-center justify-between flex-row gap-2">
                        <a href="/home">Home</a>
                        <a href="/search">Search</a>
                        <a href="/cart">Cart</a>
                        <a href="/history">History</a>
                        <a href="/profile">Profile</a>
                    </div>
                </div>
                @if (Auth::user()->role == 'Admin')
                    <li><a href="/add-item" class="text-gray-900">Add Items</a></li>
                @endif
                <li><a href="/sign-out" class="text-gray-900">Sign Out</a></li>
            @else
                <li class="text-gray-900 text-xl underline">MaiBoutique</li>
                <li><a href="/sign-in" class="text-gray-900">Sign In</a></li>
            @endauth
        </ul>
    </nav>

    {{-- Isi Kontent --}}
    @yield('container')
    <footer class="relative text-center text-white z-2 bg-gray-900 p-2">
        <span>Copyright &copy; 2022. Darren & Arnold. All Right Reserved.</span>
    </footer>
</body>

</html>
