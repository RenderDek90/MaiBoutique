@extends('layouts.master')

@section('container')


<section class="grid justify-center bg-slate-100 ">
    <form enctype="multipart/form-data" action="/addItems" method="post" class="bg-slate-100 flex flex-col gap-y-3 rounded-2xl p-10 w-[500px]">

    <label for="clothes_images">Clothes Image</label>
        <input type="file" class="justify-center text-sm text-slate-500 py-2 file:px-4 file:py-2
      file:rounded-full file:border-1
      file:text-sm file:font-semibold
      file:bg-violet-50 file:text-gray-900
      hover:file:bg-gray-900 hover:file:text-white
    " name="file_clothes" id="image" />
    <label for="clothes_name">Clothes Name</label>
        <input class="p-2 m-2 rounded border-form" type="text" name="clothes_name" placeholder="5-20 letters" id="name" required>

    <label for="clothes_name">Clothes Desc</label>
        <input type="text" class="p-2 m-2 rounded border-form" name="clothes_desc" id="description" required placeholder="(min 5 letters)">

        <label for="clothes_price">Clothes Price</label>
        <input type="numeric" class="p-2 m-2 rounded border-form" name="price" id="price" required placeholder=">1000">

        <label for="clothes_stock">Clothes Stock</label>
        <select name="stock" id="stock" class="mx-2 border-1">
            @for ($i = 1; $i < 100; $i++)
                <option value="" class="">{{$i}}</option>
            @endfor
        </select>
        <input class="border-button p-2 rounded w-[100px] mt-10" type="submit" value="Add">
    </form>

</section>


@endsection
