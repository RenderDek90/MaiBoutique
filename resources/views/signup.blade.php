@extends('layouts.signin_signup')

@section('signin_signup')
    <section class="grid grid-cols-2">
        <div
            class="bg-[url('https://img.freepik.com/free-vector/mobile-login-concept-illustration_114360-135.jpg?w=740&t=st=1669837026~exp=1669837626~hmac=6886d285ea33c5e19667cccdd53180130f1728fbeebea02d173bb457792c0436')] h-screen bg-cover bg-no-repeat">
        </div>
        <div class="bg-gray-900 flex flex-column items-center justify-center">

            <div class="grid bg-slate-200 px-2 py-5 rounded-2xl shadow-md shadow-white">
                <p class="text-center font-medium py-2 text-gray-900">Sign Up MaiBoutique</p>

                <form action="/sign-up" method="POST" enctype="multipart/form-data"
                    class="w-[400px] bg-slate-100 flex flex-col items-center gap-y-3 rounded-2xl">
                    @csrf
                    @if ($errors->has('email'))
                        <span class="text-red-800">{{ $errors->first('email') }}</span>
                    @endif
                    <input class="p-2 m-2 rounded border-form w-[400px]" type="text" name="email" id="email"
                        placeholder="Email">

                    @if ($errors->has('username'))
                        <span class="text-red-800">{{ $errors->first('username') }}</span>
                    @endif
                    <input class="p-2 m-2 rounded border-form w-[400px]" type="text" name="username" id="username"
                        placeholder="Username">

                    @if ($errors->has('phone_number'))
                        <span class="text-red-800">{{ $errors->first('phone_number') }}</span>
                    @endif
                    <input class="p-2 m-2 rounded border-form w-[400px]" type="text" name="phone_number"
                        id="phone_number" placeholder="Phone Number">

                    @if ($errors->has('address'))
                        <span class="text-red-800">{{ $errors->first('address') }}</span>
                    @endif
                    <input class="p-2 m-2 rounded border-form w-[400px]" type="textarea" name="address" id="address"
                        placeholder="Address">

                    @if ($errors->has('password'))
                        <span class="text-red-800">{{ $errors->first('password') }}</span>
                    @endif
                    <input class="p-2 m-2 rounded border-form w-[400px]" type="password" name="password" id="password"
                        placeholder="Password">

                    <input class="border-button p-2 m-2 rounded" type="submit" value="Sign Up">
                </form>
                <div class="flex py-3">
                    <p>Already have an account.</p>
                    <a href="/sign-in" class="underline pl-1">Sign in!</a>
                </div>
            </div>
        </div>
    </section>
@endsection
