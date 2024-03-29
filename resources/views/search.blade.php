@extends('layouts.navbar')

@section('container')
    <div class="w-full bg-slate-100">
        <p class="text-center text-3xl font-medium p-10">Search your Favourite Clothes Here!!</p>

        <form class="w-[70%] mx-auto">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
                <input type="search" id="default-search" name="search"
                    class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search Clothes" required>
                <button type="submit"
                    class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>

        <section class="flex flex-wrap p-10 justify-around">
            @foreach ($item as $i)
                <div class="max-w-[20%] bg-gray-100 rounded-xl block leading-loose p-3 m-5 shadow-lg shadow-gray-500 hover:scale-105 ease-in-out duration-300 hover:shadow-gray-900">
                    <img src="{{ Storage::url('images/' . $i->image) }}" class="h-[200px] w-auto"alt="">
                    <p class="font-bold">{{ $i->name }}</p>
                    <p class="py-2">Rp. {{ $i->price }}</p>
                    <a href="/item/{{ $i->id }}" class="bg-blue-500 text-white p-2 rounded">More Detail</a>
                </div>
            @endforeach
        </section>
        <div class="flex flex-row justify-center p-5">{{ $item->withQueryString()->links() }}</div>
    </div>
@endsection
