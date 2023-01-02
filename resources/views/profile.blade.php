@extends('layouts.navbar')

@section('container')
    <div class="flex flex-col justify-center items-center h-screen w-full bg-gradient-to-r from-slate-100 to-gray-300 ">
        <div>
            <div class="bg-slate-100 px-20 py-5 block shadow-lg shadow-gray-400 text-center rounded-lg">
                <p class="font-medium text-xl">My Profile</p>
                <p class="font-bold text-6xl">{{ Auth::user()->role }}</p>
                <div class="text-m opacity-50 ">
                    <p>{{ Auth::user()->username }}</p>
                    <p>{{ Auth::user()->email }}</p>
                    <p>{{ Auth::user()->address }}</p>
                    <p>{{ Auth::user()->phone_number }}</p>
                </div>
            </div>
            <div class="flex w-100  py-5 flex-col items-baseline">
                @if (Auth::user()->role == 'Member')
                    <a href="/update_profile/{{ Auth::user()->id }}"
                        class="shadow shadow-gray-400 hover:bg-gray-900 p-2 rounded hover:text-white border-2 m-1 ">Edit
                        Profile</a>
                @endif
                <a href="/update_password/{{ Auth::user()->id }}"
                    class="shadow shadow-gray-400 hover:bg-gray-900 p-2 m-1 rounded hover:text-white border-2">Edit
                    Password</a>
            </div>
        </div>
    </div>
@endsection
