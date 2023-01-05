@extends('layouts.navbar')

@section('container')
    <div class="w-full bg-slate-100">
        @auth
            @if ($cart->isEmpty())
                <div class="flex items-center text-center justify-center font-bold text-slate-400 p-10 text-3xl h-screen w-full">
                    <div>
                        <h1>Hi {{ Auth::user()->username }}</h1>
                        <h1>You Haven't Bought Anything :')</h1>
                    </div>
                </div>
            @else
                @if ($message = Session::get('message'))
                    <div class="text-white bg-green-500 rounded p-2 mb-2">{{ $message }}</div>
                @endif

                <h1>Check What You've Bought!</h1>
                @foreach ($cart as $cart)
                    <br>
                    <div>{{ $cart->updated_at->format('d-m-Y') }}</div>
                    @foreach ($cart->cart_details as $cart_details)
                        <li>{{ $cart_details->quantity }} pc(s) {{ $cart_details->item->name }}
                            Rp{{ $cart_details->item->price }}</li>
                    @endforeach
                    <div>Total Price {{ $cart->price->sum() }}</div>
                @endforeach
            @endif

        </div>
    @endsection
@endauth
