{{-- @dd($item) --}}

@extends('layouts.navHome')

@section('container')


<p class="text-center text-3xl font-medium p-10">Find your best Clothes Here!!</p>
<section class="flex flex-wrap p-10 justify-around">
    @foreach ($item as $i)
        <div class="bg-gray-100 block leading-loose p-3 shadow-lg shadow-gray-500">
            <img src="{{Storage::url('images/'.$i->image)}}" class="h-[200px] w-auto"alt="">
            <p>{{$i->name}}</p>
            <p>{{$i->price}}</p>
            <a href="/item/{{$i->id}}" class="bg-blue-500 text-white p-2 rounded">More Detail</a>
        </div>
    @endforeach
</section>

@endsection
