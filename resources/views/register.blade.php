@extends('layouts.login-register')

@section('login-register')

<section class="grid grid-cols-2">
    <div class="bg-[url('https://img.freepik.com/free-vector/mobile-login-concept-illustration_114360-135.jpg?w=740&t=st=1669837026~exp=1669837626~hmac=6886d285ea33c5e19667cccdd53180130f1728fbeebea02d173bb457792c0436')] h-screen bg-cover bg-no-repeat">
    </div>
    <div class="bg-gray-900 flex flex-column items-center justify-center">
        <div class="rotate-90 absolute top-[15%] mr-[10em]">
            <div class="h-5 w-5 rounded-full bg-white"></div>
            <div class="h-5 w-5 rounded-full bg-white"></div><div class="h-5 w-5 rounded-full bg-white"></div>
        </div>
        <div class="grid bg-slate-200 px-2 py-5 rounded-2xl shadow-md shadow-white">
            <p class="text-center font-medium py-2 text-gray-900">Login MaiBoutique</p>
            <form action="" method="post" class="bg-slate-100 flex flex-col items-center gap-y-3 rounded-2xl">
                <input class="p-2 m-2 rounded border-form" type="text" name="username-email" placeholder="Email or Username" required>
                <input type="password" class="p-2 m-2 rounded border-form" name="pass" id="" required placeholder="Password">
                <input class="border-button p-2 m-2 rounded" type="submit" value="Login">
            </form>
            <div class="flex py-3">
                <p >Already have an account.</p>

                <a href="/register" class="underline pl-1">Login!</a>

            </div>
        </div>
    </div>
        </section>

@endsection
