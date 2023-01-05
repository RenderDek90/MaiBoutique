@extends('layouts.navbar')

@section('container')
    <div class="w-full bg-slate-100">
        @auth
            @if ($cart->isEmpty())
                <div class="flex items-center justify-center font-bold text-slate-400 p-10 text-3xl h-screen w-full">
                    <div class="flex-cols text-center">
                    <img src="{{Storage::url('images/sad_icon (2).png')}}" class="h-[150px] w-auto mx-auto m-5">
                    <h1>Hi {{ Auth::user()->username }}</h1>
                    <h1 class="font-medium">Oops!</h1>
                    <h1 class="font-light">You haven't bought anything</h1>
                    </div>
                </div>
            @else
                <div class="p-10">
                    @if ($message = Session::get('message'))
                        <div class="text-white bg-green-500 rounded p-2 mb-5 text-xl">{{ $message }}</div>
                    @endif
                    <p class="text-2xl text-center font-bold">Check What You've Bought!</p>
                    @foreach ($cart as $cart)
                        <div class="bg-slate-700 text-white rounded-lg p-10 mt-5 shadow-lg shadow-gray-500">
                            <div class="font-bold text-lg">Date : {{ $cart->updated_at->format('d-m-y H:i:s') }}</div>
                            <div class="mt-5">
                                @foreach ($cart->cart_detail as $cd)
                                    <div class="grid grid-cols-2 gap-4 text-xl w-auto">
                                        <li>{{ $cd->quantity }} pc(s) {{ $cd->item->name }}</li>
                                        <li class="list-none px-5 font-medium">Rp. {{ $cd->item->price }}</li>
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-5 text-lg font-medium">Total Price</div>
                            <div class="font-light text-2xl">Rp. {{ $cart->total_price }}</div>
                        </div>
                    @endforeach
            @endif
        </div>

        </div>
    @endsection
@endauth
