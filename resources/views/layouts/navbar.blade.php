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
                    <div class="text-slate-300  flex items-center justify-between flex-row gap-2">
                        <a href="/home" class="hover:text-slate-400">Home</a>
                        <a href="/search" class="hover:text-slate-400">Search</a>
                        @if (Auth::user()->role == 'Member')
                            <a href="/cart" class="hover:text-slate-400">Cart</a>
                            <a href="/history" class="hover:text-slate-400">History</a>
                        @endif
                        <a href="/profile" class="hover:text-slate-400">Profile</a>
                    </div>
                </div>
                    <div class="flex flex-row gap-2">
                        @if (Auth::user()->role == 'Admin')
                        <li><a href="/add-item"
                                class="text-gray-900 bg-slate-200 hover:bg-gray-800 hover:text-white p-2 rounded">Add
                                Items</a></li>
                        @endif
                        <li><a href="/sign-out"
                                class="text-gray-900 bg-slate-200 hover:bg-gray-800 hover:text-white p-2 rounded">Sign
                                Out</a></li>
                    </div>
            @else
                <li class="text-gray-900 text-xl underline">MaiBoutique</li>
                <li><a href="/sign-in" class="text-gray-900 bg-slate-200 hover:bg-gray-800 hover:text-white p-2 rounded">Sign In</a></li>
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
