@extends('layouts.login-register')

@section('login-register')

<section class="grid grid-cols-2">
    <div class="bg-[url('https://img.freepik.com/free-vector/mobile-login-concept-illustration_114360-135.jpg?w=740&t=st=1669837026~exp=1669837626~hmac=6886d285ea33c5e19667cccdd53180130f1728fbeebea02d173bb457792c0436')] h-screen bg-cover bg-no-repeat">
    </div>
    <div class="bg-gray-900 flex flex-column items-center justify-center">
        <div class="rotate-90 absolute top-[15%] right-[32%]">
            <div class="grid">
                <div class="h-5 w-5 rounded-full bg-[rgb(17,24,39)] opacity-25"></div>
                <div class="h-5 w-5 rounded-full bg-[rgb(17,24,39)] opacity-25"></div>
                <div class="h-5 w-5 rounded-full bg-[rgb(17,24,39)] opacity-25"></div>
            </div>
        </div>
        <div class="grid bg-slate-200 px-2 py-5 rounded-2xl shadow-md shadow-white">
            <p class="text-center font-medium p-4 text-gray-900 text-3xl">Sign In</p>
            <form action="" method="post" class="bg-slate-100 flex flex-col items-center gap-y-3 rounded-2xl p-2">
                <div class="form-">
                    <label for="email" class="">Email</label>
                    <input class="p-2 m-2 rounded border-form w-[250px]" type="text" name="username-email" placeholder="Email or Username" required>
                    <label for="email" class="error-msg">Must be filled and email validation</label>

                <label for="email" class="">Passwords</label>
                <input type="password" class="p-2 m-2 rounded border-form w-[250px]" name="pass" id="" required placeholder="Password">
                <label for="password" class="error-msg">Must be filled with 5-20 characters</label>
                <div class="items-end">
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember_name">Remember me</label>
                </div>
                </div>
                <button class="border-button p-2 m-2 rounded w-[250px]" type="submit">Sign In</button>
            </form>
            <div class="block py-3">
                <p >Don't have an account?</p>
                <div class="flex ">
                    <p>Click Here for</p>
                    <a href="/register" class="underline pl-1">Register!</a>
                </div>
            </div>
        </div>
    </div>
        </section>

@endsection
