@extends('layouts.master')

@section('container')


<section class="grid justify-center bg-slate-100 ">
    <form enctype="multipart/form-data" action="/insertItem" method="post" class="bg-slate-100 flex flex-col gap-y-3 rounded-2xl p-10 w-[500px]">

    <label for="clothes_name">Clothes Image</label>
        <input type="file" class="justify-center text-sm text-slate-500 py-2 file:px-4 file:py-2
      file:rounded-full file:border-1
      file:text-sm file:font-semibold
      file:bg-violet-50 file:text-gray-900
      hover:file:bg-gray-900 hover:file:text-white
    "/>
    <label for="clothes_name">Clothes Name</label>
        <input class="p-2 m-2 rounded border-form" type="text" name="username-email" placeholder="5-20 letters" required>

    <label for="clothes_name">Clothes Desc</label>
        <input type="password" class="p-2 m-2 rounded border-form" name="pass" id="" required placeholder="(min 5 letters)">

        <label for="clothes_name">Clothes Price</label>
        <input type="password" class="p-2 m-2 rounded border-form" name="pass" id="" required placeholder=">1000">

        <label for="clothes_name">Clothes Stock</label>
        <select name="" id="" class="mx-2 border-1">
            @for ($i = 1; $i < 100; $i++)
                <option value="" class="">{{$i}}</option>
            @endfor
        </select>
        <input class="border-button p-2 rounded w-[100px] mt-10" type="submit" value="Add">
    </form>

</section>


@endsection
