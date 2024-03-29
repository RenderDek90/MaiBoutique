@extends('layouts.navbar')

@section('container')

    <div class="w-full bg-slate-100">
        <p class="text-center text-3xl font-medium p-10">Find your best Clothes Here!!</p>
        <section class="flex flex-wrap p-10 justify-around">
            @foreach ($item as $i)
                <div class="max-w-[20%] bg-gray-100 rounded-xl block leading-loose p-3 m-5 shadow-lg shadow-gray-500 hover:scale-105 ease-in-out duration-300 hover:shadow-gray-900">
                    <img src="{{ Storage::url('images/' . $i->image) }}" class="h-[200px] w-[200px]"alt="">
                    <p class="font-bold">{{ $i->name }}</p>
                    <p class="py-2">Rp. {{ $i->price }}</p>
                    <a href="/item/{{ $i->id }}" class="bg-blue-500 text-white p-2 rounded">More Detail</a>
                </div>
            @endforeach
        </section>
        <div class="flex flex-row justify-center p-5">{{$item->withQueryString()->links()}}
            </div>
    </div>
@endsection
