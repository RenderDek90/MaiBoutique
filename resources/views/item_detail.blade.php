@extends('layouts.master')

@section('container')
    <div class="flex flex-col justify-center items-center h-screen w-full bg-gradient-to-r from-slate-100 to-gray-300 ">
        <div>
            <div class="bg-slate-100 px-10 py-5 block shadow-lg shadow-gray-400 rounded-lg">
                <div class="flex flex-row gap-5">
                    <img src="{{url('storage/images/durian.png')}}" class="h-[200px]" alt="">
                    <div class="">
                        <p class="font-bold text-2xl">{{$item->name}}</p>
                        <p>Rp.{{$item->price}}</p>
                        <hr>
                        <p>Product Detail</p>
                        <p>{{$item->description}}</p>
                        <form action="" class="">
                            <label for="quantity_product">Quantity:</label>
                            <div class="flex flex-row justify-center">

                                <input type="text" name="quantity_product" id="" required class="mr-3 h-[2.5em]">
                                <input class="bg-green-500 border-0 hover:bg-green-700 text-white border p-2 rounded w-[100%] h-[2.5em] hover:cursor-pointer" type="submit" value="Add to Cart">
                        </div>
                        <a href="{{url()->previous()}}" class="border-button p-2 rounded border-red-500 w-[100px] hover:bg-red-500 text-red-500 hover:text-white mt-2">Back

                        </a>
                        {{-- <input class="border-button p-2 rounded border-red-500 w-[100px] hover:bg-red-500 text-red-500 hover:text-white mt-2" type="submit" value="Back"> --}}
                        </form>

                    </div>
                </div>
            </div>
            {{-- <div class="flex w-100  py-5 flex-col items-baseline">
                    <a href="" class="shadow shadow-gray-400 hover:bg-gray-900 p-2 rounded hover:text-white border-2
                    m-1 ">Edit Profile</a>
                    <a href="" class="shadow shadow-gray-400 hover:bg-gray-900 p-2 m-1 rounded hover:text-white border-2">Edit Password</a>
            </div> --}}
        </div>
    </div>
@endsection
