@extends('layouts.navbar')

@section('container')
    <section class="grid justify-center bg-slate-100 ">
        <form enctype="multipart/form-data" action="/add-item" method="post"
            class="bg-slate-100 flex flex-col gap-y-3 rounded-2xl p-10 w-[500px]">
            @csrf

            @if ($errors->has('image'))
            <span class="text-red-800">{{ $errors->first('image') }}</span>
            @endif
            <label for="image">Clothes Image</label>
            <input type="file"
                class="justify-center text-sm text-slate-500 py-2 file:px-4 file:py-2 file:rounded-full file:border-1 file:text-sm file:font-semibold file:bg-violet-50 file:text-gray-900 hover:file:bg-gray-900 hover:file:text-white"
                name="image" id="image" />

            @if ($errors->has('name'))
            <span class="text-red-800">{{ $errors->first('name') }}</span>
            @endif
            <label for="name">Clothes Name</label>
            <input class="p-2 m-2 rounded border-form" type="text" name="name" placeholder="5-20 letters"
                id="name" >

            @if ($errors->has('description'))
            <span class="text-red-800">{{ $errors->first('description') }}</span>
            @endif
            <label for="description">Clothes Description</label>
            <input type="text" class="p-2 m-2 rounded border-form" name="description" id="description"
                placeholder="(min 5 letters)">

            @if ($errors->has('price'))
            <span class="text-red-800">{{ $errors->first('price') }}</span>
            @endif
            <label for="clothes_price">Clothes Price</label>
            <input type="text" class="p-2 m-2 rounded border-form" name="price" id="price"
                placeholder="≥1000">

            @if ($errors->has('stock'))
            <span class="text-red-800">{{ $errors->first('stock') }}</span>
            @endif
            <label for="clothes_stock">Clothes Stock</label>
            <input type="number" class="p-2 m-2 rounded border-form" name="stock" id="stock"
                placeholder="≥1">

            <input class="border-button p-2 rounded w-[100px] mt-10" type="submit" value="Add">
        </form>

    </section>
@endsection
