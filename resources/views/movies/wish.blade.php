<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Wish List') }}
        </h2>
    </x-slot>
    <div style="display:flex; flex-direction:column ;justify-content:space-around;align-items:center;height:60vh;">
        @foreach ($movies as $movie)
            <x-movie :$movie />
        @endforeach
    </div>
</x-app-layout>
