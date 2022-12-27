@extends('layouts.navbar')
@section('container')
    <section class="bg-cover bg-[url('/storage/images/clothingStore.jpg')]">
        <div class="bg-gray-900 bg-opacity-70 h-screen">
            <div class="h-screen grid content-center opacity-100 leading-10 text-white text-center">
                <p class="text-4xl">Welcome to <u>MaiBoutique</u></p>
                <p>Online Boutique that Provides You with Various Clothes to Suit Your Various Activities</p>
                <div class="content-center"><a href="/sign-up"
                        class="py-2 px-4 bg-blue-500 hover:bg-blue-700 rounded w-36">SIGN UP NOW</a></div>
            </div>
        </div>
    </section>
@endsection
