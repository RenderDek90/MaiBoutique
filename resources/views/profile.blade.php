@extends('layouts.master')

@section('container')
    <div class="flex flex-col justify-center items-center h-screen w-full bg-gradient-to-r from-slate-100 to-gray-300 ">
        <div>
            <div class="bg-slate-100 px-20 py-5 block shadow-lg shadow-gray-400 text-center rounded-lg">
                <p class="font-medium text-xl">My Profile</p>
                <p class="font-bold text-6xl">{{$user->role}}</p>
                <div class="text-m opacity-50 ">
                    <p>{{ $user->username }}</p>
                    <p>{{ $user->email }}</p>
                    <p>{{ $user->address }}</p>
                    <p>{{ $user->phone_number }}</p>
                </div>
            </div>
            <div class="flex w-100  py-5 flex-col items-baseline">
                    <a href="" class="shadow shadow-gray-400 hover:bg-gray-900 p-2 rounded hover:text-white border-2
                    m-1 ">Edit Profile</a>
                    <a href="" class="shadow shadow-gray-400 hover:bg-gray-900 p-2 m-1 rounded hover:text-white border-2">Edit Password</a>
            </div>
        </div>
    </div>
@endsection
