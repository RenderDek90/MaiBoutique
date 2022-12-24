@extends('layouts.master')

@section('container')
    <h1>Check What You've Bought!</h1>
    @foreach ($cart as $cart)
        <br>
        <div>{{ $cart->updated_at->format('d-m-Y') }}</div>
        @foreach ($cart->cart_details as $cart_details)
            <li>{{ $cart_details->quantity }} pc(s) {{ $cart_details->item->name }} Rp{{ $cart_details->item->price }}</li>
        @endforeach
        <div>Total Price {{ $cart->price->sum()}}</div>
    @endforeach
@endsection
