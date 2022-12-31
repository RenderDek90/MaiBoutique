@extends('layouts.navbar')

@section('container')
@auth
    @if ($cart->isEmpty())
    <div class="text-center font-bold text-slate-400 p-10 text-3xl">
            <h1>Hi {{Auth::user()->username}}</h1>
            <h1>You Haven't Bought Anything :')</h1>
    </div>
    @else
        <h1>Check What You've Bought!</h1>
        @foreach ($cart as $cart)
            <br>
            <div>{{ $cart->updated_at->format('d-m-Y') }}</div>
            @foreach ($cart->cart_details as $cart_details)
                <li>{{ $cart_details->quantity }} pc(s) {{ $cart_details->item->name }} Rp{{ $cart_details->item->price }}</li>
            @endforeach
            <div>Total Price {{ $cart->price->sum() }}</div>
        @endforeach
    @endif


@endsection
@endauth
