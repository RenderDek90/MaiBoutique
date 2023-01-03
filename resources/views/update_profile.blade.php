@extends('layouts.navbar')

@section('container')
    <section class="grid justify-center bg-slate-100 ">
        <p class="text-medium text-2xl mt-3 p-3 bg-gray-900 rounded-xl text-white">Update Profile</p>
        <form enctype="multipart/form-data" action="/update-profile" method="post"
            class="bg-slate-100 flex flex-col gap-y-3 rounded-2xl p-10 w-[500px]">

            @csrf
            @if ($errors->has('username'))
                <span class="text-red-800">{{ $errors->first('username') }}</span>
            @endif
            <label for="username">Username</label>
            <input class="p-2 m-2 rounded border-form" type="text" name="username" placeholder="{{ $user->username }}">

            @if ($errors->has('email'))
                <span class="text-red-800">{{ $errors->first('email') }}</span>
            @endif
            <label for="email">Email</label>
            <input type="email" class="p-2 m-2 rounded border-form" name="email" id="email"
                placeholder="{{ $user->email }}">

            @if ($errors->has('phone_number'))
                <span class="text-red-800">{{ $errors->first('phone_number') }}</span>
            @endif
            <label for="phone_number">Phone Number</label>
            <input type="text" class="p-2 m-2 rounded border-form" name="phone_number" id="phone_number"
                placeholder="{{ $user->phone_number }}">

            @if ($errors->has('address'))
                <span class="text-red-800">{{ $errors->first('address') }}</span>
            @endif
            <label for="address">Address</label>
            <input type="text" class="p-2 m-2 rounded border-form" name="address" id="address"
                placeholder="{{ $user->address }}">

            <input class="bg-green-500 border-0 hover:bg-green-700 text-white border p-2 rounded w-[100%] mt-2"
                type="submit" value="Save Update">

            <a class="border-button p-2 rounded border-red-500 w-[15%] hover:bg-red-500 text-red-500 hover:text-white text-center"
                href={{ url()->previous() }}>Back</a>
        </form>

    </section>
@endsection
