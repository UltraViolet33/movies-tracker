<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Seen Movies') }}
        </h2>
    </x-slot>
    <div style="display:flex; flex-direction:column ;justify-content:space-between;align-items:center;gap:15px;">
        @foreach ($movies as $movie)
            <x-movie-item :$movie />
        @endforeach
    </div>
</x-app-layout>
