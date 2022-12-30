@extends('layouts.signin_signup')

@section('signin_signup')
    <section class="grid grid-cols-2">
        <div
            class="bg-[url('https://img.freepik.com/free-vector/mobile-login-concept-illustration_114360-135.jpg?w=740&t=st=1669837026~exp=1669837626~hmac=6886d285ea33c5e19667cccdd53180130f1728fbeebea02d173bb457792c0436')] h-screen bg-cover bg-no-repeat">
        </div>
        <div class="bg-gray-900 flex flex-column items-center justify-center">
            {{-- <div class="rotate-90 absolute top-[15%] right-[32%]">
            <div class="grid">
                <div class="h-5 w-5 rounded-full bg-[rgb(17,24,39)] opacity-25"></div>
                <div class="h-5 w-5 rounded-full bg-[rgb(17,24,39)] opacity-25"></div>
                <div class="h-5 w-5 rounded-full bg-[rgb(17,24,39)] opacity-25"></div>
            </div>
        </div> --}}
            <div class="grid bg-slate-200 px-2 py-5 rounded-2xl shadow-md shadow-white">
                <p class="text-center font-medium p-4 text-gray-900 text-3xl">Sign In</p>

                @if ($message = Session::get('message'))
                    <div>
                        {{ $message }}
                    </div>
                @endif

                <form action="/sign-in" method="POST" enctype="multipart/form-data"
                    class="bg-slate-100 flex flex-col gap-y-3 rounded-2xl p-2">
                    @csrf
                    @if ($errors->has('email'))
                        <span class="text-red-800">{{ $errors->first('email') }}</span>
                    @endif
                    <label for="email" class="px-2">Email</label>
                    <input class="p-2 m-2 rounded border-form w-[250px]" type="text" name="email" placeholder="">

                    @if ($errors->has('password'))
                        <span class="text-red-800">{{ $errors->first('password') }}</span>
                    @endif
                    <label for="email" class="px-2">Passwords</label>
                    <input type="password" class="p-2 m-2 rounded border-form w-[250px]" name="password"
                        placeholder="5-20 Characters">

                    {{-- Password Reset gatau harus gini atau gimana --}}
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Forgot password?
                        </a>
                    @endif
                    <div class="items-end">
                        <input type="checkbox" name="remember" id="remember">
                        <label for="remember_name">Remember me!</label>
                    </div>
                    <button class="border-button p-2 m-2 rounded w-[250px]" type="submit">Sign In</button>

                </form>
                <div class="block py-3">
                    <p>Don't have an account?</p>
                    <div class="flex ">
                        <p>Click Here to</p>
                        <a href="/sign-up" class="underline pl-1">Sign Up!</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
