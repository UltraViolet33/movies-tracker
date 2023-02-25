<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Movies') }}
        </h2>
    </x-slot>
    <div style="display:flex;justify-content:center;align-items:center;height:60vh;">
        @foreach ($movies as $movie)
            <div style="border:2px solid black;padding:10px">
                <p>title : {{ $movie->title }} </p>
                <p>Year : {{ $movie->year }} </p>
                <p>Genre : {{ $movie->genre }} </p>
            </div>
        @endforeach
    </div>
</x-app-layout>
