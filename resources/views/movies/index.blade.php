<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movies') }}
        </h2>
    </x-slot>


    <div style="display: flex; justify-content:center">
        <div class="flex w-96">
            <form method="POST" action="/movies">
                @csrf
                <input type="text" placeholder="Just search for a movie" class="w-80" style="margin: 10px" name="movie">
                <button style="margin:10px; border:1px solid black; padding:4px"> Search </button>
            </form>
        </div>
    </div>
</x-app-layout>
