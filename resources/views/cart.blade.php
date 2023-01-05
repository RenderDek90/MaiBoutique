@extends('layouts.navbar')

@section('container')
    <div class="w-full bg-slate-100">
        @if ($cart_detail == null)
            <div class="flex items-center text-center justify-center font-bold text-slate-400 p-10 text-3xl h-screen w-full">
                <div class="flex-cols text-center">
                    <img src="{{Storage::url('images/sad_icon (2).png')}}" class="h-[150px] w-auto mx-auto m-5">
                    <h1>Hi {{ Auth::user()->username }}</h1>
                    <h1 class="font-medium">Oops!</h1>
                    <h1 class="font-light">It's empty here!</h1>
                </div>
            </div>
        @else
            <p class="text-center text-3xl font-medium p-10">{{ Auth::user()->username }}'s Cart</p>
            <section class="flex flex-wrap p-10 justify-around">
                @php
                    $total_qty = 0;
                    $total_price = 0;
                @endphp
                @foreach ($cart_detail as $cd)
                    <div class="bg-gray-100 block leading-loose p-3 shadow-lg shadow-gray-500">
                        <img src="{{ Storage::url('images/' . $cd->item->image) }}" class="h-[200px] w-auto"alt="">
                        <p class="font-bold">{{ $cd->item->name }}</p>
                        <p>Rp.{{ $cd->item->price }}</p>
                        <p>Qty: {{ $cd->quantity }}</p>

                        @php
                            $total_qty += $cd->quantity;
                            $total_price += $cd->item->price * $cd->quantity;
                        @endphp
                        <a href="/edit-cart/{{ $cd->item->id }}" class="bg-blue-700 text-white p-2 rounded">Edit Cart</a>
                        <a href="/remove-from-cart/{{ $cd->id }}" class="bg-red-700 text-white p-2 rounded">Remove
                            from Cart</a>
                    </div>
                @endforeach
            </section>
            <div class="flex row justify-end m-10">
                <p class="font-bold">Total Price : Rp.{{ $total_price }}</p>
            </div>
            <div class="m-10 flex row justify-end">
                <form action="/checkout" method="POST">
                    @csrf
                    <input type="hidden" name="total_price" value="{{ $total_price }}">
                    <button class="bg-blue-700 text-white p-2 rounded" type="submit">Check Out
                        ({{ $total_qty }})</button>
                </form>
            </div>
        @endif
    </div>
@endsection
