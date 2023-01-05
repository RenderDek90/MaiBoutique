@extends('layouts.navbar')

@section('container')
    <div class="flex flex-col justify-center items-center h-screen w-full bg-gradient-to-r from-slate-100 to-gray-300 ">
        <div class="bg-slate-100 px-10 py-5 block shadow-lg shadow-gray-400 rounded-lg max-w-2xl">
            <div class="flex flex-row gap-5">
                <img src="{{ Storage::url('images/' . $item->image) }}" class="max-h-[150px]" alt="">
                <div class="">
                    <p class="font-bold text-2xl">{{ $item->name }}</p>
                    <p class="font-light text-2xl text-gray-500">Rp.{{ $item->price }}</p>
                    <hr>
                    <p class="font-bold mt-5">Product Detail</p>
                    <p>{{ $item->description }}</p>
                    @if (Auth::user()->role == 'Member')
                        <form action="/edit-cart" method="POST" class="flex flex-col">
                            @csrf
                            <input type="hidden" name="item_id" value="{{ $item->id }}">
                            <label for="quantity" class="font-bold mt-3">Quantity:</label>
                            <div class="flex flex-row justify-between">
                                <select name="quantity" id="quantity" class="mx-2 border-1 w-[100px]">
                                    @for ($i = 1; $i <= $item->stock; $i++)
                                        <option value="{{ $i }}" class="">{{ $i }}
                                        </option>
                                    @endfor
                                </select>
                                <input
                                    class="bg-green-500 border-0 hover:bg-green-700 text-white border p-2 rounded w-[50%] h-[2.5em] hover:cursor-pointer"
                                    type="submit" value="Add to Cart">

                                {{-- @if ($item->stock - $qty_in_cart > 0)
                                @else
                                    <select name="quantity" id="quantity"
                                        class="opacity-50 border-0 mx-2 border-1 w-[100px] select-none pointer-event-none"
                                        disabled>
                                        <option>0</option>
                                    </select>
                                    <input
                                        class="bg-slate-400 opacity-50 border-0 text-white border p-2 rounded w-[50%] h-[2.5em]"
                                        type="reset" value="Add to Cart">
                                @endif --}}
                            </div>
                        @elseif (Auth::user()->role == 'Admin')
                            <div
                                class="bg-red-500 border-0 hover:bg-red-700 text-white border p-2 rounded w-[100%] h-[2.5em] hover:cursor-pointer m-2">
                                <a href="/delete/{{ $item->id }}">Delete Item</a>
                            </div>
                    @endif
                    <a class="border p-2 rounded border-red-500 w-[15%] hover:bg-red-500 text-red-500 hover:text-white mt-2 mx-2 text-center"
                        href={{ url()->previous() }}>Back</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
