@extends('layouts.master')

@section('container')


<section class="grid justify-center bg-slate-100 ">
    <p class="text-medium text-2xl mt-3 p-3 bg-gray-900 rounded-xl text-white">Update Password</p>
    <form enctype="multipart/form-data" action="/insertItem" method="post" class="bg-slate-100 flex flex-col gap-y-3 rounded-2xl p-10 w-[500px]">
    <label for="up_name">Username</label>
        <input class="p-2 m-2 rounded border-form" type="text" name="username-email" placeholder="5-20 letters" required>

    <label for="up_email">Email</label>
        <input type="email" class="p-2 m-2 rounded border-form" name="pass" id="" required placeholder="(min 5 letters)">

        <label for="up_phone">Phone Number</label>
        <input type="text" class="p-2 m-2 rounded border-form" name="up_phone" id="" required placeholder=">1000">

        <label for="up_address">Address</label>
        <input type="text" class="p-2 m-2 rounded border-form" name="up_address" id="" required placeholder=">1000">

        <input class="bg-green-500 border-0 hover:bg-green-700 text-white border p-2 rounded w-[100%] mt-2" type="submit" value="Save Update">

        <input class="border-button p-2 rounded border-red-500 w-[100px] hover:bg-red-500 text-red-500 hover:text-white" type="submit" value="Back">
    </form>

</section>


@endsection
