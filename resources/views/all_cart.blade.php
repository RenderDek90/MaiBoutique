@extends('layouts.navbar')

@section('container')

@auth

<p class="text-center text-3xl font-medium p-10">{{$cart->user->name}} Cart</p>
<div class="flex row justify-end m-10">
    <p class="font-bold">Total Price : {{$cart->price}}</p>
    {{-- <p class="font-bold">Total Price : Rp.200000</p> --}}
</div>
<section class="flex flex-wrap p-10 justify-around">
    @foreach ($carts->item as $i)
        <div class="bg-gray-100 block leading-loose p-3 shadow-lg shadow-gray-500">
            <img src="{{Storage::url('images/'.$i->image)}}" class="h-[200px] w-auto"alt="">
            <p class="font-bold">{{$i->name}}</p>
            <p>Rp.{{$i->price}}</p>
            <p>Qty: {{$i->quantity}}</p>
            <a href="/item/{{$i->id}}" class="bg-blue-700 text-white p-2 rounded">Edit Card</a>
            <a href="/item/{{$i->id}}" class="bg-red-700 text-white p-2 rounded">Remove from Card</a>
        </div>
    @endforeach
</section>
<div class="m-10 flex row justify-end">
    <a href="" class="bg-blue-700 text-white p-2 rounded">Check Out {{$item->quantity}}</a>
    {{-- <a href="/checkout" class="bg-blue-700 text-white p-2 rounded">Check Out (4)</a> --}}
</div>

@endauth

@endsection