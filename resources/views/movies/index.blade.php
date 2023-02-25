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
                <input type="text" placeholder="Just search for a movie" class="w-80" style="margin: 10px"
                    name="movie">
                <button style="margin:10px; border:1px solid black; padding:4px"> Search </button>
            </form>
        </div>
    </div>

    <div style="display:flex;justify-content:center;align-items:center;height:60vh;">
        @if ($movie)
            <div style="border:2px solid black;padding:10px">
                <p>title : {{ $movie->title }} </p>
                <p>Year : {{ $movie->year }} </p>
                <p>Genre : {{ $movie->genre }} </p>
                <form method="POST" action="{{ route('add.movie.seen') }}">
                    @csrf
                    @method('post')
                    <x-primary-button onclick="event.preventDefault(); this.closest('form').submit();" class="mt-4">
                        {{ __('Vu') }}</x-primary-button>
                    <input type="hidden" name="movie" value="{{ $movie->title }}" />
                </form>
                <form method="POST" action="{{ route('add.movie.wish') }}">
                    @csrf
                    @method('post')
                    <x-primary-button onclick="event.preventDefault(); this.closest('form').submit();" class="mt-4">
                        {{ __('A Voir') }}</x-primary-button>
                    <input type="hidden" name="movie" value="{{ $movie->title }}" />
                </form>
            </div>
        @endif
    </div>
</x-app-layout>
