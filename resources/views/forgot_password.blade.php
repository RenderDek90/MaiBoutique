@extends('layouts.navbar')

@section('container')
    <section class="grid justify-center bg-slate-100 ">

        <p class="text-medium text-xl mt-3 p-3 text-slate-400">Hii {{$user->username}}</p>
        <p class="text-medium text-2xl mt-3 p-3 bg-gray-900 rounded-xl text-white">Update Password</p>
        <form enctype="multipart/form-data" action="/update_password/{{$user->id}}" method="post"
            class="bg-slate-100 flex flex-col gap-y-3 rounded-2xl p-10 w-[500px]">


            {{-- Untuk Update Profile sepertinya blm kelar, gw masih bingung di bagian controller yang bakal di pake untuk update profile --}}
            @csrf
            @if ($errors->has('password'))
            <span class="text-red-800">{{ $errors->first('password') }}</span>
            @endif
            <label for="username">Old Password</label>
            <input class="p-2 m-2 rounded border-form" type="password" name="password" placeholder="Old Password">

            @if ($errors->has('password'))
            <span class="text-red-800">{{ $errors->first('password') }}</span>
            @endif
            <label for="username">Password</label>
            <input class="p-2 m-2 rounded border-form" type="password" name="password" placeholder="New Password">

            <input class="bg-green-500 border-0 hover:bg-green-700 text-white border p-2 rounded w-[100%] mt-2"
                type="submit" value="Save Update">

            <a class="border-button p-2 rounded border-red-500 w-[10%] hover:bg-red-500 text-red-500 hover:text-white"
                 href={{url()->previous()}}>Back</a>
        </form>

    </section>
@endsection
