@extends('layouts.navbar')

@section('container')
    <section class="grid justify-center bg-slate-100 ">

        <p class="text-medium text-xl mt-3 p-3 text-slate-400">Hi {{ $user->username }}</p>
        <p class="text-medium text-2xl mt-3 p-3 bg-gray-900 rounded-xl text-white">Update Password</p>
        <form enctype="multipart/form-data" action="/edit-password" method="post"
            class="bg-slate-100 flex flex-col gap-y-3 rounded-2xl p-10 w-[500px]">

            @csrf

            @if ($message = Session::get('message'))
                <div class="text-center bg-red-900 text-white">
                    {{ $message }}
                </div>
            @endif

            @if ($errors->has('old_password'))
                <span class="text-red-800">{{ $errors->first('old_password') }}</span>
            @endif
            <label for="old_password">Old Password</label>
            <input class="p-2 m-2 rounded border-form" type="password" name="old_password" placeholder="Old Password">

            @if ($errors->has('new_password'))
                <span class="text-red-800">{{ $errors->first('new_password') }}</span>
            @endif
            <label for="new_password">New Password</label>
            <input class="p-2 m-2 rounded border-form" type="password" name="new_password" placeholder="New Password">

            <input class="bg-green-500 border-0 hover:bg-green-700 text-white border p-2 rounded w-[100%] mt-2"
                type="submit" value="Save Update">

            <a class="border p-2 rounded border-red-500 w-[15%] hover:bg-red-500 text-red-500 hover:text-white text-center"
                href={{ url()->previous() }}>Back</a>
        </form>

    </section>
@endsection
